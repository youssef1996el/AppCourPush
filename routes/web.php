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
use App\http\Controllers\AdminController;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Cours;
use App\http\Controllers\StripeController;




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
/* Route::get('professeur/StepByStep' ,[ProfesseurController::class,'StepByStep'])->name('professeur/StepByStep'); */
Route::get('ShowProfileProf'        ,[ProfesseurController::class,'ShowProfile'])->name('ShowProfileProf');
Route::post('StoreCoursProf'        ,[ProfesseurController::class,'StoreCoursProf']);
Route::post('DestroyCoursProf'      ,[ProfesseurController::class,'DestroyCoursProf']);
Route::get('getCoursByProf'         ,[ProfesseurController::class,'getCoursByProf']);
Route::get('InfoProfesseur'         ,[ProfesseurController::class,'InfoProfesseur'])->name('InfoProfesseur');
Route::get('GetPriceGroupeOrPrive'  ,[ProfesseurController::class,'GetPriceGroupeOrPrive']);
Route::get('ExpEduInfos'            ,[ProfesseurController::class,'ExpEduInfos'])->name('ExpEduInfos');
Route::get('Cours&Disponibilite'    ,[ProfesseurController::class,'CoursDisponibilite']);
Route::post('DeleteDisponible'      ,[ProfesseurController::class,'DeleteDisponible']);
Route::post('DeleteDisponibleByDay' ,[ProfesseurController::class,'DeleteDisponibleByDay']);
Route::get('checkDayIsExiste'       ,[ProfesseurController::class,'CheckDayIsExiste']);
Route::post('UpDateDisponibleByProf',[ProfesseurController::class,'UpDateDisponibleByProf']);
Route::post('UpdateInfoProfesseur'  ,[ProfesseurController::class,'UpdateInfoProfesseur']);
Route::get('MesEleves'              ,[ProfesseurController::class,'MesEleves']);
Route::get('ElevesReserve'          ,[ProfesseurController::class,'ElevesReserve']);
Route::get('StepByStep',function()
{
    return view('Professeur.StepByStep');
})->name('StepByStep');

/******************************************* End Professeur *************************************************/

/********************************************** Formation **************************************************/
Route::post('DeleteFormationPro'   ,[FormationProf::class,'DeleteFormationPro']);
Route::post('UpdateFormation'      ,[FormationProf::class,'UpdateFormation']);
/********************************************** End Formation ***********************************************/

/*********************************************** Experince  *************************************************/
Route::post('DeleteExperincePro'  ,[ExperinceProf::class,'ExperinceProf']);
Route::post('UpdateExperince'     ,[ExperinceProf::class,'UpdateExperince']);
/*********************************************** End Experince  **********************************************/

/******************************************** Eleve *********************************************************/
Route::get('profile/eleve'                                              ,[EleveController::class,'index'])->name('profile/eleve');
Route::get('GetpProfesseur'                                             ,[EleveController::class,'GetpProfesseur']);
Route::get('Reservation/{Time}/{NameProfesseur}/{Cours}/{TypeCours}'    ,[EleveController::class,'Reservation']);
Route::get('InfosProfile'                                               ,[EleveController::class,'InfosProfile']);
Route::get('Details/{Time}/{NameProfesseur}/{Cours}/{TypeCours}/{Date}' ,[EleveController::class,'Details']);
Route::post('UpdateDataEleve'                                           ,[EleveController::class,'UpdateDataEleve'])->name('UpdateDataEleve');
Route::get('Mescours'                                                   ,[EleveController::class,'Mescours'])->name('Mescours');
Route::get('CalanderCours'                                              ,[EleveController::class,'GetMesCourCalander']);
/******************************************** End Eleve  ****************************************************/
/******************************************** Start Dashboard Admin ***********************************************/
Route::get('professeurs'              ,[AdminController::class,'professeurs'])->name('professeurs');
Route::get('eleves'                   ,[AdminController::class,'eleves'])->name('eleves');
Route::get('view/professeur'          ,[AdminController::class,'Viewprofesseur']);
Route::post('verificationProf'        ,[AdminController::class,'verificationProf']);
Route::get('Admin/Dashboard'          ,[AdminController::class,'AdminDashboard'])->name('Admin/Dashboard');
Route::get('Admin/Profile'            ,[AdminController::class,'AdminProfile']);
Route::get('ShowUsers/{id}'           ,[AdminController::class,'ShowUser']);
Route::get('getStartYearAndEnd'       ,[AdminController::class,'getStartYearAndEnd']);
Route::get('GetChartEleveCount'       ,[AdminController::class,'getChartEleveCount']);
Route::get('GetChartByCountry'        ,[AdminController::class,'GetChartByCountry']);
Route::get('CoursPaiement'            ,[AdminController::class,'CoursPaiement']);
Route::get('fetchDataTypeCours'       ,[AdminController::class,'fetchDataTypeCours']);
Route::post('StoreDataTypeCours'      ,[AdminController::class,'StoreDataTypeCours']);
Route::get('GetTypeCours'             ,[AdminController::class,'GetTypeCours']);
Route::post('UpdateDataTypeCourse'    ,[AdminController::class,'UpdateDataTypeCourse']);
Route::post('UpDateAdmin'             ,[AdminController::class,'UpDateAdmin']);

/******************************************** End Dashboard Admin ***********************************************/

/********************************************* Stripe  ****************************************************/

Route::get('Acount/store/checkout/{Time}/{NameProfesseur}/{Cours}/{TypeCours}/{Nomber}/{Montant}',[StripeController::class,'index']);
Route::post('PostStripe'                                                                         ,[StripeController::class,'StripePost'])->name('stripe.post');
/********************************************* End Stripe **************************************************/
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

















Route::get('Reserver',function()
{
    $cours = Cours::all();
    return view('profile.eleve')
    ->with('cours'          , $cours);
});

/* Route::get('Details',function()
{
    return view('Eleve.Details');
}); */



