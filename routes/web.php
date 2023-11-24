<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\HomeController;
use App\http\Controllers\SocialiteController;
use App\http\Controllers\FormationProf;
use App\http\Controllers\ExperinceProf;
use App\http\Controllers\DisponibleProf;
use App\http\Controllers\CoursController;
use App\http\Controllers\Auth\ForgotPasswordController;
use App\http\Controllers\ProfesseurController;
use App\http\Controllers\EleveController;

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
Route::post('LoginWithGoogle'     ,[SocialiteController::class,'LoginWithGoogle'])->name('LoginWithGoogle');

/****************************************Start Cours DashBorad **************************************/
Route::post('StoreCours'          ,[CoursController::class,'StoreCours']);
Route::get('GetTableCour'         ,[CoursController::class,'GetTableCour']);
Route::post('EditCour'            ,[CoursController::class,'EditCour']);
/****************************************End Cours DashBorad ****************************************/

/***************************************** Rest Password *********************************************/
Route::get('forget-password'        , [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password'       , [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}' , [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password'        , [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
/***************************************** End Rest Password  *****************************************/


/******************************************* Professeur  ***************************************************/
Route::get('professeur/StepByStep' ,[ProfesseurController::class,'StepByStep'])->name('professeur/StepByStep');
Route::get('ShowProfileProf'       ,[ProfesseurController::class,'ShowProfile'])->name('ShowProfileProf');
/******************************************* End Professeur *************************************************/

/******************************************** Eleve *********************************************************/
Route::get('profile/eleve'            ,[EleveController::class,'index'])->name('profile/eleve');
Route::get('GetpProfesseur'           ,[EleveController::class,'GetpProfesseur']);
/******************************************** End Eleve  ****************************************************/


Route::get('/prof/{name}/{id}',function()
{
    return view('Profile.index');
});


Route::post('StoreData',[HomeController::class,'Store']);

Route::get('spaces/index',function()
{
    return view('Spaces.index');
});
Route::get('profile/admin',function()
{
    return view('profile.admin');
});



Route::get('GetAvailableProf',[HomeController::class,'GetAvailableProf']);



/********************* dashboard */
Route::get('Dashboard',function()
{
    return view('Dashboard.index');
})->name('Dashboard');

Route::get('Dashboard/cours',function()
{
    return view('Dashboard.cours');
});



