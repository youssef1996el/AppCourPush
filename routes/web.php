<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\HomeController;
use App\http\Controllers\SocialiteController;
use App\http\Controllers\FormationProf;
use App\http\Controllers\ExperinceProf;
use App\http\Controllers\DisponibleProf;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




/* Route::get('/',[HomeController::class,'welcome']); */
Auth::routes([
    'verify'    =>true,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);

Route::get('auth/google'          ,[SocialiteController::class,'redirectToGoogle']);
Route::get('auth/google/callback' ,[SocialiteController::class,'handGoogleCallback']);
Route::get('professeur/StepByStep',function()
{
    return view('Step.index');
})/* ->middleware('verified') */;
Route::get('/prof/{name}/{id}',function()
{
    return view('Profile.index');
});
Route::get('ShowProfileProf',[HomeController::class,'ShowProfile']);

Route::post('StoreData',[HomeController::class,'Store']);

Route::get('spaces/index',function()
{
    return view('Spaces.index');
});
Route::get('profile/admin',function()
{
    return view('profile.admin');
});

Route::get('profile/eleve',function()
{
    return view('profile.eleve');
});

Route::get('GetAvailableProf',[HomeController::class,'GetAvailableProf']);



/********************* dashboard */
Route::get('Dashboard',function()
{
    return view('Dashboard.index');
});

Route::get('Dashboard/cours',function()
{
    return view('Dashboard.cours');
});



