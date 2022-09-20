<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use Session;
use Auth;

class FrontendController extends Controller
{
    /*public function frontend_index()
    {
        return view('frontend-pages.index');
    }*/

    public function frontend_profile(Request $request, $slug)
    {
    	$reverse_slug = Str::title(str_replace('-', ' ', $slug));
    	$user = User::where('name', $reverse_slug)->first();
    	
    	
    	return view('frontend.profile', compact('user'));
    }

    /*public function frontend_faq()
    {
        return view('frontend-pages.faq');
    }

    public function frontend_about()
    {
        return view('frontend-pages.about');
    }*/
}
