<?php


use App\Http\Controllers\AreaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EduController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PhysiotypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::middleware('auth')->group(function (){
//Route::get('/home',[HomeController::class,'index']);

//
//});
//Route::post('user-login',[LoginController::class,'login']);
Route::middleware('auth')->group(function (){

    Route::resource('patient', PatientController::class);
    Route::resource('forms', FormsController::class);
    Route::resource('medicine', MedicineController::class);
    Route::resource('area', AreaController::class);
    Route::resource('type', PhysiotypeController::class);
    Route::resource('users', UserController::class);
    Route::resource('edu', EduController::class);
    Route::get('listUsers',[UserController::class,'listUsers'])->name('listUsers');
    Route::get('listMedicine',[MedicineController::class,'listMedicine'])->name('listMedicine');
    Route::get('listPatient',[PatientController::class,'listForms']);
    Route::get('listType',[PhysioTypeController::class,'listType'])->name('listType');
    Route::get('listArea',[AreaController::class,'listArea'])->name('listArea');
    Route::get('showPatient/{nCode}',[FormsController::class,'showPatient']);
    Route::post('addPayment',[FormsController::class,'storePayment']);
    Route::post('addSickCertificate',[FormsController::class,'storeSickCertificate']);
    Route::post('addPhysioCertificate',[FormsController::class,'storePhysioCertificate']);
    Route::post('addPrescriptionCertificate',[FormsController::class,'storePrescriptionCertificate']);
    Route::get('printPaymentA5/{id}',[FormsController::class,'printPaymentA5'])->name('printPaymentA5');
    Route::get('printPrescriptionA5/{id}',[FormsController::class,'printPrescriptionA5'])->name('printPrescriptionA5');
    Route::get('printPhysioA5/{id}',[FormsController::class,'printPhysioA5'])->name('printPhysioA5');
    Route::get('printSickA5/{id}',[FormsController::class,'printSickA5'])->name('printSickA5');
    Route::get('/logout',[LoginController::class,'logout']);
    Route::get('artroz_edu');
    Route::get('artroz', function () {
        return view('artroz_edu');
    });
    Route::get('dashboard', function () {
        return view('dashboard');
    });
    Route::get('information-base', function () {
        return view('information-base');
    });
});
Auth::routes();

//Route::resource('patient',Controller::class);


