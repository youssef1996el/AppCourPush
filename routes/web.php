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
use App\http\Controllers\Online_ClassesController;
use App\Http\Middleware\IsProfesseur;
use App\Http\Middleware\IsEleve;
use App\Http\Middleware\IsAdmin;




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
Route::group(['middleware' => ['web','auth']], function ()
{
    /****************************************Start Cours DashBorad **************************************/
    Route::post('StoreCours'          ,[CoursController::class,'StoreCours']);
    Route::get('GetTableCour'         ,[CoursController::class,'GetTableCour']);
    Route::post('EditCour'            ,[CoursController::class,'EditCour']);
    /****************************************End Cours DashBorad ****************************************/


    /******************************************* Professeur  ***************************************************/
    Route::get('ShowProfileProf'        ,[ProfesseurController::class,'ShowProfile'])
        ->name('ShowProfileProf')
        ->middleware('IsProfesser');

    Route::post('StoreCoursProf'        ,[ProfesseurController::class,'StoreCoursProf'])
        ->middleware('IsProfesser');

    Route::post('DestroyCoursProf'      ,[ProfesseurController::class,'DestroyCoursProf'])
        ->middleware('IsProfesser');

    Route::get('getCoursByProf'         ,[ProfesseurController::class,'getCoursByProf'])
        ->middleware('IsProfesser');

    Route::get('InfoProfesseur'         ,[ProfesseurController::class,'InfoProfesseur'])
        ->name('InfoProfesseur')
        ->middleware('IsProfesser');

    Route::get('GetPriceGroupeOrPrive'  ,[ProfesseurController::class,'GetPriceGroupeOrPrive'])
        ->middleware('IsEleve');

    Route::get('ExpEduInfos'            ,[ProfesseurController::class,'ExpEduInfos'])
        ->name('ExpEduInfos')
        ->middleware('IsProfesser');

    Route::get('Cours&Disponibilite'    ,[ProfesseurController::class,'CoursDisponibilite'])
        ->middleware('IsProfesser');

    Route::post('DeleteDisponible'      ,[ProfesseurController::class,'DeleteDisponible'])
        ->middleware('IsProfesser');

    Route::post('DeleteDisponibleByDay' ,[ProfesseurController::class,'DeleteDisponibleByDay'])
        ->middleware('IsProfesser');

    Route::get('checkDayIsExiste'       ,[ProfesseurController::class,'CheckDayIsExiste'])
        ->middleware('IsProfesser');

    Route::post('UpDateDisponibleByProf',[ProfesseurController::class,'UpDateDisponibleByProf'])
        ->middleware('IsProfesser');

    Route::post('UpdateInfoProfesseur'  ,[ProfesseurController::class,'UpdateInfoProfesseur'])
        ->middleware('IsProfesser');

    Route::get('MesEleves'              ,[ProfesseurController::class,'MesEleves'])
        ->middleware('IsProfesser');

    Route::get('ElevesReserve'          ,[ProfesseurController::class,'ElevesReserve'])
        ->name('ElevesReserve')
        ->middleware('IsProfesser');

    Route::post('SendLinkMeet'          ,[ProfesseurController::class,'SendLinkToEleves'])
        ->middleware('IsProfesser');

    Route::get('Validation/Cours/Professeur'           ,[AdminController::class,'Validation'])
        ->middleware('IsProfesser');
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
    Route::get('profile/eleve'                                              ,[EleveController::class,'index'])
        ->name('profile/eleve')
        ->middleware('IsEleve');

    Route::get('GetpProfesseur'                                             ,[EleveController::class,'GetpProfesseur'])
        ->middleware('IsEleve');

    Route::get('Reservation/{Time}/{NameProfesseur}/{Cours}/{TypeCours}'    ,[EleveController::class,'Reservation'])
        ->middleware('IsEleve');

    Route::get('InfosProfile'                                               ,[EleveController::class,'InfosProfile'])
        ->middleware('IsEleve');

    Route::get('Details/{Time}/{NameProfesseur}/{Cours}/{TypeCours}/{Date}' ,[EleveController::class,'Details'])
        ->middleware('IsEleve');

    Route::post('UpdateDataEleve'                                           ,[EleveController::class,'UpdateDataEleve'])
        ->name('UpdateDataEleve')
        ->middleware('IsEleve');

    Route::get('Mescours'                                                   ,[EleveController::class,'Mescours'])
        ->name('Mescours')
        ->middleware('IsEleve');

    Route::get('CalanderCours'                                              ,[EleveController::class,'GetMesCourCalander'])
        ->middleware('IsEleve');

    Route::post('CreatePayement'                                             ,[EleveController::class,'CreatePayement'])
    ->middleware('IsEleve');

    /******************************************** End Eleve  ****************************************************/


    /******************************************** Start Dashboard Admin ***********************************************/
    Route::get('professeurs'              ,[AdminController::class,'professeurs'])
        ->name('professeurs')
        ->middleware('IsAdmin');

    Route::get('eleves'                   ,[AdminController::class,'eleves'])
        ->name('eleves')
        ->middleware('IsAdmin');

    Route::get('view/professeur'          ,[AdminController::class,'Viewprofesseur'])
        ->middleware('IsAdmin');

    Route::post('verificationProf'        ,[AdminController::class,'verificationProf'])
        ->middleware('IsAdmin');

    Route::get('Admin/Dashboard'          ,[AdminController::class,'AdminDashboard'])
        ->name('Admin/Dashboard')
        ->middleware('IsAdmin');

    Route::get('Admin/Profile'            ,[AdminController::class,'AdminProfile'])
        ->middleware('IsAdmin');

    Route::get('ShowUsers/{id}'           ,[AdminController::class,'ShowUser'])
        ->middleware('IsAdmin');

    Route::get('getStartYearAndEnd'       ,[AdminController::class,'getStartYearAndEnd'])
        ->middleware('IsAdmin');

    Route::get('StartPayement'            ,[AdminController::class,'StartPayement'])
        ->middleware('IsAdmin');

    Route::get('GetChartEleveCount'       ,[AdminController::class,'getChartEleveCount'])
        ->middleware('IsAdmin');

    Route::get('GetChartByCountry'        ,[AdminController::class,'GetChartByCountry'])
        ->middleware('IsAdmin');

    Route::get('CoursPaiement'            ,[AdminController::class,'CoursPaiement'])
        ->middleware('IsAdmin');

    Route::get('fetchDataTypeCours'       ,[AdminController::class,'fetchDataTypeCours'])
        ->middleware('IsAdmin');

    Route::post('StoreDataTypeCours'      ,[AdminController::class,'StoreDataTypeCours'])
        ->middleware('IsAdmin');

    Route::get('GetTypeCours'             ,[AdminController::class,'GetTypeCours'])
        ->middleware('IsAdmin');

    Route::post('UpdateDataTypeCourse'    ,[AdminController::class,'UpdateDataTypeCourse'])
        ->middleware('IsAdmin');

    Route::post('UpDateAdmin'             ,[AdminController::class,'UpDateAdmin'])
        ->middleware('IsAdmin');

    Route::get('GetTotalByDate'             ,[AdminController::class,'GetTotalByDate'])
    ->middleware('IsAdmin');

    Route::get('Validation/Cours'           ,[AdminController::class,'Validation'])
    ->middleware('IsAdmin');

    Route::post('ValidationCours'          ,[AdminController::class,'ValidationCoursProf'])
   ;
    /******************************************** End Dashboard Admin ***********************************************/



    /********************************************* Stripe  ****************************************************/

    Route::get('Acount/store/checkout/{Time}/{NameProfesseur}/{Cours}/{TypeCours}/{Nomber}/{Montant}',[StripeController::class,'index'])
        ->middleware('IsEleve');

    Route::post('PostStripe'                                                                         ,[StripeController::class,'StripePost'])
        ->name('stripe.post')
        ->middleware('IsEleve');
    /********************************************* End Stripe **************************************************/


    /********************************************* Start Online_Classes ***************************************/
    Route::resource('online_Classes', Online_ClassesController::class);
    /********************************************* End Online_Classes   ***************************************/


    Route::get('StepByStep',function()
    {
        return view('Professeur.StepByStep');
    })->name('StepByStep')->middleware('IsProfesser');

    Route::get('spaces/index',function()
    {
        return view('Spaces.index');
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

    Route::get('Dashboard/template',function()
    {
        return view('Dashboard.templateAdmin');
    });

    Route::get('Reserver',function()
    {
        $cours = Cours::all();
        return view('profile.eleve')
        ->with('cours'          , $cours);
    });

});

Route::get('Details/{id}' ,[EleveController::class,'DetailsProfesseur']);












Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);

Route::get('auth/google'          ,[SocialiteController::class,'redirectToGoogle']);
Route::get('auth/google/callback' ,[SocialiteController::class,'handGoogleCallback']);
Route::post('LoginWithGoogle'     ,[SocialiteController::class,'LoginWithGoogle'])->name('LoginWithGoogle');



/***************************************** Rest Password *********************************************/
Route::get('forget-password'        , [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password'       , [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}' , [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password'        , [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
/***************************************** End Rest Password  *****************************************/














Route::get('/prof/{name}/{id}',function()
{
    return view('Profile.index');
});


Route::post('StoreData',[HomeController::class,'Store']);


Route::get('professeur/detailprof',function()
{
    return view('professeur.detailprof');
});

Route::get('SendEmail',function()
{
    return view('email.Send');
});























/* Route::get('Details',function()
{
    return view('Eleve.Details');
}); */



