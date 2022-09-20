<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\SocialLink;

use Session;
use Auth;
use Image;

class SocialLinkController extends Controller
{
	public function __construct()
    {
        $this->middleware(['role:Administrator']);
    }

	public function index()
    {
        $social_links = SocialLink::orderBy('created_at', 'desc')->get();
        return view('backend.social.index', compact('social_links'));
    }

    public function create()
    {
        return view('backend.social.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
        ]);

        $social = new SocialLink();

        $social->name = $request->name;

        if($request->hasFile('logo')){
        	$image_tmp = $request->file('logo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $request->name.'.png';

                $original_image_path = 'assets/uploads/social-logo/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $social->logo = $image_new_name;
            }
        }

       	$social->save();

        Session::flash('success', 'Social Link Added Successfully !');
        return redirect()->route('social.index');
    }

    public function edit($id)
    {
        $auth = Auth::user();
        $social = SocialLink::find($id);

        return view('backend.social.edit', compact('social'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'logo' => 'required',
        ]);

        $social = SocialLink::find($id);

        $social->name = $request->name;

        if($request->hasFile('logo')){
        	$image_tmp = $request->file('logo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $request->name.'.png';

                $original_image_path = 'assets/uploads/social-logo/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $social->logo = $image_new_name;
            }
        }

       	$social->save();
		
		Session::flash('info', 'Social Link stuffs updated successfully.');
        return redirect()->route('social.index');
        
    }

    public function destroy($id)
    {
        
        $social = SocialLink::findOrFail($id);
        $social->delete();

        Session::flash('error', 'Social Link Deleted Successfully !');
        return redirect()->route('social.index');

    }

    /*public function all_users()
    {
        $users = User::where('role', 'User')->get();
        return view('user.index', compact('users'));
    }*/
}
