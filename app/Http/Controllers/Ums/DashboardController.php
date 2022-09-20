<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bus;
use App\Models\Share;

class DashboardController extends Controller
{
	public function dashboard()
    {
    	$upbuses   = Share::where('status', 1)->where('type', 'UP')->get();
    	$downbuses = Share::where('status', 1)->where('type', 'Down')->get();

    	return view('backend.index', compact('upbuses', 'downbuses'));
    }
}
