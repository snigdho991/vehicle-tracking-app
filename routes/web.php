<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\RoleController;
use App\Http\Controllers\Ums\DashboardController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Cms\BusController;
use App\Http\Controllers\Cms\ShareController;
use App\Http\Controllers\Cms\SocialLinkController;
use App\Http\Controllers\Ums\ProfileController;
use App\Http\Controllers\Cms\FrontendController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/profile/{slug}', [FrontendController::class, 'frontend_profile'])->name('frontend.profile');

// Route::get('/generate-role', [RoleController::class, 'generate_role'])->name('generate.role');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');
	Route::get('/share-location', [ShareController::class, 'share_location'])->name('share.location');
	Route::post('/start-location', [ShareController::class, 'start_location'])->name('start.location');
	Route::get('/location/{bus}/{id}', [ShareController::class, 'track_location'])->name('track.location');
	Route::post('/update-location/{user}/{share}', [ShareController::class, 'update_location'])->name('update.location');
	Route::get('/get-location/{user_id}/{share}', [ShareController::class, 'get_location'])->name('get.location');
	Route::post('/stop-location/{sharer}/{share}', [ShareController::class, 'stop_location'])->name('stop.location');
	Route::get('/thanks', [ShareController::class, 'thank_you'])->name('thank.you');

	// PROFILE STUFFS

	Route::group(['prefix' => 'user'], function(){
		Route::get('/edit-profile', [ProfileController::class, 'edit_profile'])->name('edit.profile');
	    Route::post('/update-profile', [ProfileController::class, 'update_profile'])->name('update.profile');
	    Route::get('/social-media', [ProfileController::class, 'social_media'])->name('social.media.links');
	    Route::post('/save/social-media', [ProfileController::class, 'save_social_media'])->name('save.social.media.links');
	    Route::get('/delete/social-media/{key}', [ProfileController::class, 'delete_social_media'])->name('user.delete.social');

	    Route::post('/save/basic-info', [ProfileController::class, 'save_basic_info'])->name('save.basic.info');
	    Route::post('/save/change-password', [ProfileController::class, 'change_auth_password'])->name('change.auth.password');

	    /*Route::get('/profile-mode', [ProfileController::class, 'profile_mode'])->name('profile.mode');
	    Route::post('/public-theme', [ProfileController::class, 'public_theme'])->name('public.theme');*/
	});

		
	Route::group(['prefix' => 'administrator'], function(){
		
		// BUS
		Route::get('/all-buses', [BusController::class, 'index'])->name('bus.index');
		Route::get('/add-bus', [BusController::class, 'create'])->name('bus.create');
		Route::post('/store-bus', [BusController::class, 'store'])->name('bus.store');
		Route::get('/bus/edit/{id}', [BusController::class, 'edit'])->name('bus.edit');
		Route::post('bus/update/{id}', [BusController::class, 'update'])->name('bus.update');
		Route::delete('/bus/delete/{id}', [BusController::class, 'destroy'])->name('bus.destroy');

		// SOCIAL LINK
		Route::group(['prefix' => 'social-link', 'as' => 'social.'], function(){
			Route::get('/index', [SocialLinkController::class, 'index'])->name('index');
			Route::get('/create', [SocialLinkController::class, 'create'])->name('create');
			Route::post('/store', [SocialLinkController::class, 'store'])->name('store');
			Route::get('/edit/{id}', [SocialLinkController::class, 'edit'])->name('edit');
			Route::post('/update/{id}', [SocialLinkController::class, 'update'])->name('update');
			Route::get('/delete/{id}', [SocialLinkController::class, 'destroy'])->name('destroy');
		});
	});

});
