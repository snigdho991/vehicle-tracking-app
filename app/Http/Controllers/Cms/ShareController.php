<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Share;
use App\Models\Bus;
use App\Models\Location;
use App\Models\User;

use Session;
use Auth;

class ShareController extends Controller
{
    public function __construct(User $user)
    {
        /*$this->middleware(['role:Administrator'])->except(['manage_qrcode']);*/
        $this->user = $user;
    }

    public function share_location()
    {
        $buses = Bus::where('status', 1)->get();

        $already_share = Share::where('user_id', Auth::id())->where('status', 1)->first();

        if ($already_share) {
            Session::flash('error', 'You are already sharing a bus location !');
            return redirect()->back();
        } else {
            return view('backend.location.share-now', compact('buses'));
        }
        
    }

    public function start_location(Request $request)
    {
        $this->validate($request, [
            'bus_id' => 'required',
            'type'   => 'required'
        ]);

        $bus = Bus::where('id', $request->bus_id)->first();

        $bus_slug = \Illuminate\Support\Str::slug($bus->bus_name);

        $share = new Share();
        $share->user_id = Auth::id();
        $share->bus_id  = $request->bus_id;
        $share->type    = $request->type;

        $share->save();

        /*$ip = $request->ip();
        $user_info = \Stevebauman\Location\Facades\Location::get('103.230.106.27');*/

        $location = new Location();
        $location->user_id = Auth::id();
        $location->start_latitude = $request->start_latitude;
        $location->start_longitude = $request->start_longitude;
        $location->share_id = $share->id;

        $location->save();

        Session::flash('success', 'Location is being shared successfully !');
        return redirect()->route('track.location', ['bus' => $bus_slug, 'id' => $share->id]);
    }

    public function track_location($bus, $id)
    {
    	$sharer = Share::where('id', $id)->where('status', 1)->first();

        if ($sharer) {
            $location = Location::where('share_id', $sharer->id)->first();
            $user     = User::where('id', $sharer->user_id)->first();
            $avatar   = $this->user->avatarLetter($user->name);
            $bus      = Bus::find($sharer->bus_id);
    	    return view('backend.location.share', compact('sharer', 'location', 'user', 'bus', 'avatar'));
        } else {
            abort(403);
        }
    }

    public function update_location($user, $share, Request $request)
    {
    	$location = Location::where('user_id', $user)->where('share_id', $share)->first();

    	$location->latitude  = $request->latitude;
    	$location->longitude = $request->longitude;
    	$location->accuracy  = $request->accuracy;

    	$location->save();

    	return response()->json($location);
    }

    public function get_location($user_id, $share)
    {
    	$location = Location::where('user_id', $user_id)->where('share_id', $share)->first();
    	return response()->json($location);
    }

    public function stop_location(Request $request, $sharer, $share)
    {
        $share_loc = Share::where('user_id', $sharer)->where('status', 1)->first();
        $location  = Location::where('share_id', $share)->first();

        $share_loc->status = 0;
        $share_loc->stopped_at = now();

        $location->final_latitude = $request->latit;
        $location->final_longitude = $request->longit;

        $share_loc->save();
        $location->save();

        return true;
    }

    public function thank_you()
    {
        return view('backend.location.thanks');
    }
}
