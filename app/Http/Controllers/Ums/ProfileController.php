<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Models\Profile;
use App\Models\SocialLink;

use Session;
use Image;

class ProfileController extends Controller
{
    public function edit_profile()
    {
    	$user = Auth::user();
    	return view('profile.edit', compact('user'));
    }

    public function update_profile(Request $request)
    {
    	$user_id = $request->user_id;

    	$find_user = User::find($user_id);

        $find_user->hometown      = $request->hometown;
        $find_user->skills        = $request->skills;
    	
        if($request->hasFile('profile_photo')){
            $image_tmp = $request->file('profile_photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/users/profile/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $find_user->profile_photo_path = $image_new_name;
            }
        }

        if($request->hasFile('cover_photo')){
            $image_tmp = $request->file('cover_photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name_two = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/users/cover/'.$image_new_name_two;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $find_user->cover_photo = $image_new_name_two;
            }
        }

        $find_user->save();
        
        Session::flash('info', 'Profile Updated Successfully!');
        // return redirect()->route('frontend.profile', $find_link->link);
        return redirect()->back();
    }

    public function social_media()
    {
        $all_socials = SocialLink::orderBy('created_at', 'desc')->get();

        $profile = Auth::user();

        return view('profile.add-social', compact('all_socials', 'profile'));
    }

    public function save_social_media(Request $request)
    {
        $this->validate($request, [
            'social_name'   => 'required',
            'social_link'   => 'required',
        ]);

        $profile = Auth::user();

        if($profile->social_links != null)
        {
            $saved_links = $profile->social_links;

            $str = $saved_links;

            $mstr = explode(",",$str);
            $a = array();

            foreach($mstr as $nstr)
            {
                $narr = explode("=>",$nstr);
                $narr[0] = str_replace("\x98","",trim($narr[0]));
                $ytr[1] = $narr[1];
                $a[$narr[0]] = $ytr[1];
            }

            if(strstr($saved_links, $request->social_name) !== false) {
                unset($a[$request->social_name]);
                $a[$request->social_name] = $request->social_link;

                $output = implode(', ', array_map(
                    function ($v, $k) { return sprintf("%s=>%s", $k, $v); },
                    $a,
                    array_keys($a)
                ));

                $profile->social_links = $output;
                $profile->save();

                Session::flash('info', 'Social Link Updated Successfully !');
                return redirect()->back(); 
            } else {

                $add_link = $saved_links . ", " . $request->social_name . '=>' . $request->social_link;

                $profile->social_links = $add_link;
                $profile->save();

                Session::flash('success', 'Social Link Added Successfully !');
                return redirect()->back();

            }

        } else {
            $ins_link = $request->social_name . '=>' . $request->social_link;

            $profile->social_links = $ins_link;
            $profile->save();

            Session::flash('success', 'Social Link Added Successfully !');
            return redirect()->back();
        }
    }

    public function delete_social_media($key)
    {
        $profile = Auth::user();

        if($profile->social_links != null)
        {
            $saved_links = $profile->social_links;

            $str = $saved_links;

            $mstr = explode(",",$str);
            $a = array();

            foreach($mstr as $nstr)
            {
                $narr = explode("=>",$nstr);
                $narr[0] = str_replace("\x98","",trim($narr[0]));
                $ytr[1] = $narr[1];
                $a[$narr[0]] = $ytr[1];
            }

            unset($a[$key]);
            
            $output = implode(', ', array_map(
                function ($v, $k) { return sprintf("%s=>%s", $k, $v); },
                $a,
                array_keys($a)
            ));

            $profile->social_links = $output;
            $profile->save();

            Session::flash('error', 'Social Link Deleted Successfully !');
            return redirect()->back(); 
        }
    }

    /*public function profile_mode()
    {
        $user = Auth::user();
        return view('frontend-user.theme', compact('user'));
    }

    public function public_theme(Request $request)
    {
        $this->validate($request, [
            'profile_mode' => 'required',
        ]);

        $profile = Profile::where('user_id', Auth::id())->first();

        $profile->public_theme = $request->profile_mode;
        $profile->save();

        Session::flash('success', 'Theme Selected Successfully !');
        return redirect()->back(); 
    }*/

    public function save_basic_info(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|unique:users,email,'.$user->id
        ]);

        $find_user = User::findOrFail($user->id);

        $find_user->name = $request->name;
        $find_user->email = $request->email;

        $find_user->save();

        Session::flash('success', 'Basic Information Updated Successfully !');
        return redirect()->back();
    }

    public function change_auth_password(Request $request)
    {
        $this->validate($request, [
            'oldpassword'           => 'required',
            'newpassword'           => 'required|string|min:8',
            'password_confirmation' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;
 
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
 
            if (!\Hash::check($request->newpassword , $hashedPassword)) {

                $users = User::find(Auth::user()->id);
                $users->password = bcrypt($request->newpassword);

                \Cookie::queue(\Cookie::make('passwordcng', 'Password Changed Successfully ! Login again with the new password.', 0.1));
                
                User::where('id', Auth::user()->id)->update(array('password' => $users->password));
                
                return redirect('/login');
            } else {
                Session::flash('error', 'New password can\'t be same as Old Password. Update Denied !');
                return redirect()->back();
            }

        } else {
            Session::flash('error', 'The password confirmation does not match. Update Denied !');
            return redirect()->back();
        }
    }
}
