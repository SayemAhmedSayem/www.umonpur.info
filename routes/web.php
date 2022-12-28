<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VersionController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LinkController;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::group(['middleware' => ['auth']], function(){
    Route::resource('dashboard', DashboardController::class);
});
Route::post('/web-income', [FrontendController::class, 'Incomestore'])->name('web-income-store');
Route::post('/web-message', [FrontendController::class, 'Messagestore'])->name('web-message-store');

Route::get('/', [FrontendController::class, 'index'])->name('web-home');
Route::get('/web-donate', [FrontendController::class, 'donate'])->name('web-donate');
Route::get('/web-donate/show/{id}', [FrontendController::class, 'donateShow'])->name('web-donate-show');
Route::get('/web-testimonial', [FrontendController::class, 'Testimonial'])->name('web-testimonial');
Route::get('/web-testimonial/{id}', [FrontendController::class, 'TestimonialSingle'])->name('web-testimonial-single');

Route::get('/web-about', [FrontendController::class, 'About'])->name('web-about');
Route::get('/web-about/profile/{id}', [ProfileController::class, 'Webshow'])->name('profile-webshow');
Route::get('/web-about-show/{id}', [FrontendController::class, 'AboutShow'])->name('web-about-show');
Route::get('/web-about-list', [FrontendController::class, 'AboutList'])->name('web-about-list');
Route::get('/web-about-donate-d', [FrontendController::class, 'AboutDonateD'])->name('web-about-donate-d');
Route::get('/web-about-donate-g', [FrontendController::class, 'AboutDonateG'])->name('web-about-donate-g');

Route::get('/web-post-list', [FrontendController::class, 'PostList'])->name('web-post-list');
Route::get('/web-post-category/{id}', [FrontendController::class, 'PostCategory'])->name('web-post-category');
Route::get('/web-notice-list', [FrontendController::class, 'NoticeList'])->name('web-notice-list');
Route::get('/web-event-list', [FrontendController::class, 'EventList'])->name('web-event-list');

Route::get('/web-post-show/{id}', [FrontendController::class, 'PostShow'])->name('web-post-show');
Route::get('/web-event-show/{id}', [FrontendController::class, 'EventShow'])->name('web-event-show');
Route::get('/web-notice-show/{id}', [FrontendController::class, 'NoticeShow'])->name('web-notice-show');

Route::get('/photo-gallery', [FrontendController::class, 'photoGallery'])->name('web-photo');
Route::get('/photo-gallery/year/{id}', [FrontendController::class, 'photoYear'])->name('web-year');
Route::get('/photo-gallery/year/photo/{id}', [FrontendController::class, 'photoPhoto'])->name('web-photo-photo');

Route::get('/video-gallery', [FrontendController::class, 'videoGallery'])->name('web-video');
Route::get('/video-gallery/video/{id}', [FrontendController::class, 'videoVideo'])->name('web-video-video');

Route::post('/votershow', [FrontendController::class, 'voterShow'])->name('voter.search');
Route::get('/web-voter-list', [FrontendController::class, 'voterList'])->name('web-voter-list');
Route::post('/web-voter-print', [FrontendController::class, 'voterPrint'])->name('web-voter-print');
Route::get('/web-message', [FrontendController::class, 'message'])->name('web-message');
Route::post('member-register', [App\Http\Controllers\MemberController::class, 'mStore'])->name('member-register');


Route::get('/myprofile/{id}', [FrontendController::class, 'Mypfile'])->name('my-profile');
Route::put('/myprofile/update/{id}', [FrontendController::class, 'Mypfile_update'])->name('my-profile-update');
Route::get('/mypayment/{id}', [FrontendController::class, 'Mypayment'])->name('my-payment');
Route::get('/mypayment-recipt/{id}', [FrontendController::class, 'MypaymentRecipt'])->name('my-payment-recipt');
Route::get('/changepass/{id}', [FrontendController::class, 'chnagePassword'])->name('change-pass');
Route::put('/myprofile/pass/update/{id}', [FrontendController::class, 'chnagePasswordStore'])->name('my-profile-pass-store');

//Version 

// Route::get('/web-version', [FrontendController::class, 'VersionAll'])->name('web-version-all');
Route::get('/web-version/show/{id}', [FrontendController::class, 'VersionShow'])->name('web-version-show');









Route::group(['middleware' =>  ['company']], function(){
Route::resource('roles', RoleController::class);
Route::get('permission/control/{user_id?}', [PermissionController::class, 'index'])->name('permission.index');
Route::get('psgdsfgsdfgsdfgsdfgsfdgsfdgrol', [PermissionController::class, 'accessControl'])->name('fgdfgdfgfdgfdg.accesscontrol');
Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
Route::resource('menu', MenuController::class);
Route::get('post-sort/{id}', [PostController::class, 'PostSort'])->name('post-sort');
Route::resource('posts', PostController::class);
Route::resource('category', CategoryController::class);
Route::resource('testimonial', TestimonialController::class);
Route::resource('members', MemberController::class);
Route::get('members-sort/{id}', [MemberController::class, 'RoleSort'])->name('member-sort');


Route::resource('sliders', SliderController::class);
Route::resource('settings', SettingController::class);
Route::resource('income', IncomeController::class);
Route::resource('expense', ExpenseController::class);
Route::resource('album', AlbumController::class);
Route::resource('year', YearController::class);
Route::resource('photo', PhotoController::class);
Route::resource('video', VideoController::class);
Route::resource('version', VersionController::class);
Route::resource('about', AboutController::class);
Route::resource('statistic', StatisticController::class);
Route::resource('donate', DonateController::class);
Route::resource('message', MessageController::class);

Route::resource('link', LinkController::class);
Route::resource('profile', ProfileController::class);
Route::post('/profile-member', [App\Http\Controllers\ProfileController::class, 'memberStore'])->name('profile.member-store');
Route::delete('/profile-member-destroy/{id}', [App\Http\Controllers\ProfileController::class, 'memberDelete'])->name('profile-member.destroy');
Route::post('/change-password', [App\Http\Controllers\MemberController::class, 'updatePassword'])->name('update-password');

Route::get('/income-approve/{id}', [App\Http\Controllers\IncomeController::class, 'Approve'])->name('income-approve');





});