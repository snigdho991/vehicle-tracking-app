<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bus;

use Image;
use Auth;
use Session;

class BusController extends Controller
{
    
	public function __construct()
    {
        $this->middleware(['role:Administrator']);
    }

	public function index()
    {
        $buses = Bus::orderBy('created_at', 'desc')->get();
        return view('backend.administrator.bus.index', compact('buses'));
    }

    public function create()
    {
        return view('backend.administrator.bus.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bus_name' => 'required|unique:buses'
        ]);

        $bus = new Bus();

        $bus->bus_name = $request->bus_name;

        if($request->hasFile('photo')){
        	$image_tmp = $request->file('photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/bus-photo/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $bus->photo = $image_new_name;
            }
        }

       	$bus->save();

        Session::flash('success', 'Bus Added Successfully !');
        return redirect()->route('bus.index');
    }

    public function edit($id)
    {
        $auth = Auth::user();
        $bus = Bus::find($id);

        return view('backend.administrator.bus.edit', compact('bus'));
    }

    public function update(Request $request, $id)
    {
    	$bus = Bus::findOrFail($id);

        $this->validate($request, [
            'bus_name' => 'required|unique:buses,bus_name,'.$bus->id
        ]);

        $bus->bus_name = $request->bus_name;

        if($request->hasFile('photo')){
        	$image_tmp = $request->file('photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/bus-photo/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $bus->photo = $image_new_name;
            }
        }

       	$bus->save();
		
		Session::flash('info', 'Bus stuffs updated successfully.');
        return redirect()->route('bus.index');
        
    }

    public function destroy($id)
    {
        
        $bus = Bus::findOrFail($id);
        $bus->delete();

        Session::flash('error', 'Bus Deleted Successfully !');
        return redirect()->route('bus.index');

    }

}
