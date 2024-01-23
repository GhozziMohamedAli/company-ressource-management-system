<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);
Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


/*********************************** Institution Routes *******************************/

Route::middleware(['auth'])->prefix('institution')->group(function (){

    Route::get('/',[App\Http\Controllers\InstitutionController::class, 'index']);

    Route::get('/add-institution',[App\Http\Controllers\InstitutionController::class, 'create']);

    Route::post('/add-institution',[App\Http\Controllers\InstitutionController::class, 'store']);

    Route::get('/edit-institution/{id}',[App\Http\Controllers\InstitutionController::class, 'edit']);

    Route::post('/edit-institution/{id}',[App\Http\Controllers\InstitutionController::class, 'update']);

    Route::get('/delete/{id}',[App\Http\Controllers\InstitutionController::class, 'destroy']);
    
    });

/*********************************** End Institution Routes *******************************/

/*********************************** Employee Routes *******************************/

    Route::middleware(['auth'])->prefix('employee')->group(function (){

        

        Route::get('/',[App\Http\Controllers\EmployeeController::class, 'index']);

        Route::get('/add-employee',[App\Http\Controllers\EmployeeController::class, 'create']);

        Route::post('/add-employee',[App\Http\Controllers\EmployeeController::class, 'store']);

        Route::get('/edit-employee/{id}',[App\Http\Controllers\EmployeeController::class, 'edit']);

        Route::post('/edit-employee/{id}',[App\Http\Controllers\EmployeeController::class, 'update']);

        Route::get('/delete/{id}',[App\Http\Controllers\EmployeeController::class, 'destroy']);

        Route::get('/show/{id}',[App\Http\Controllers\EmployeeController::class, 'show']);

        Route::post('/medical-pdf',[App\Http\Controllers\EmployeeController::class, 'medical_pdf']);

        Route::post('/driving-pdf',[App\Http\Controllers\EmployeeController::class, 'driving_pdf']);
    
    });

/*********************************** End Employee Routes *******************************/

/*********************************** Branche Routes *******************************/

Route::middleware(['auth'])->prefix('branche')->group(function (){

    Route::get('/',[App\Http\Controllers\BrancheController::class, 'index']);

    Route::get('/add-branche',[App\Http\Controllers\BrancheController::class, 'create']);

    Route::post('/add-branche',[App\Http\Controllers\BrancheController::class, 'store']);

    Route::get('/edit-branche/{id}',[App\Http\Controllers\BrancheController::class, 'edit']);

    Route::post('/edit-branche/{id}',[App\Http\Controllers\BrancheController::class, 'update']);

    Route::get('/delete/{id}',[App\Http\Controllers\BrancheController::class, 'destroy']);
    
    });

/*********************************** End Branche Routes *******************************/

/*********************************** Store Routes *******************************/

Route::middleware(['auth'])->prefix('store')->group(function (){

    Route::get('/',[App\Http\Controllers\StoreController::class, 'index']);

    Route::get('/add-store',[App\Http\Controllers\StoreController::class, 'create']);

    Route::post('/add-store',[App\Http\Controllers\StoreController::class, 'store']);

    Route::get('/edit-store/{id}',[App\Http\Controllers\StoreController::class, 'edit']);

    Route::post('/edit-store/{id}',[App\Http\Controllers\StoreController::class, 'update']);

    Route::get('/delete/{id}',[App\Http\Controllers\StoreController::class, 'destroy']);
    Route::post('/municipal-license-pdf',[App\Http\Controllers\CarController::class, 'license_pdf']);
    Route::post('/civil-defense-pdf',[App\Http\Controllers\CarController::class, 'civil_pdf']);
    
    });

/*********************************** End Store Routes *******************************/

/*********************************** Computer Routes *******************************/

Route::middleware(['auth'])->prefix('computer')->group(function (){

    Route::get('/',[App\Http\Controllers\ComputerController::class, 'index']);

    Route::get('/add-computer',[App\Http\Controllers\ComputerController::class, 'create']);

    Route::post('/add-computer',[App\Http\Controllers\ComputerController::class, 'store']);

    Route::get('/edit-computer/{id}',[App\Http\Controllers\ComputerController::class, 'edit']);

    Route::post('/edit-computer/{id}',[App\Http\Controllers\ComputerController::class, 'update']);

    Route::get('/delete/{id}',[App\Http\Controllers\ComputerController::class, 'destroy']);
    
    });

/*********************************** End Computer Routes *******************************/

/*********************************** Extinguisher Routes *******************************/

Route::middleware(['auth'])->prefix('extinguisher')->middleware('auth')->group(function (){

    Route::get('/',[App\Http\Controllers\ExtinguisherController::class, 'index']);

    Route::get('/add-extinguisher',[App\Http\Controllers\ExtinguisherController::class, 'create']);

    Route::post('/add-extinguisher',[App\Http\Controllers\ExtinguisherController::class, 'store']);

    Route::get('/edit-extinguisher/{id}',[App\Http\Controllers\ExtinguisherController::class, 'edit']);

    Route::post('/edit-extinguisher/{id}',[App\Http\Controllers\ExtinguisherController::class, 'update']);

    Route::get('/delete/{id}',[App\Http\Controllers\ExtinguisherController::class, 'destroy']);
    
    });

/*********************************** End Extinguisher Routes *******************************/

/*********************************** Car Routes *******************************/

Route::middleware(['auth'])->prefix('car')->group(function (){

    Route::get('/',[App\Http\Controllers\CarController::class, 'index']);

    Route::get('/add-car',[App\Http\Controllers\CarController::class, 'create']);

    Route::post('/add-car',[App\Http\Controllers\CarController::class, 'store']);

    Route::get('/edit-car/{id}',[App\Http\Controllers\CarController::class, 'edit']);

    Route::post('/edit-car/{id}',[App\Http\Controllers\CarController::class, 'update']);

    Route::get('/delete/{id}',[App\Http\Controllers\CarController::class, 'destroy']);
    
    Route::get('/show/{id}',[App\Http\Controllers\CarController::class, 'show']);

    Route::get('/show_image/{id}',[App\Http\Controllers\CarController::class, 'show_image']);

    Route::post('/license-pdf',[App\Http\Controllers\CarController::class, 'license_pdf']);
    Route::post('/inspection-pdf',[App\Http\Controllers\CarController::class, 'inspection_pdf']);
    });
/*********************************** End Car Routes *******************************/

/*********************************** Start Document Routes *******************************/

Route::middleware(['auth'])->prefix('documents')->group(function (){
    Route::get('/',[App\Http\Controllers\DocumentController::class, 'index']);

    Route::post('/add-document',[App\Http\Controllers\DocumentController::class, 'store']);

    Route::get('/delete/{id}',[App\Http\Controllers\DocumentController::class, 'destroy']);

    Route::post('/see-document',[App\Http\Controllers\DocumentController::class, 'see_document']);

});

/*********************************** End Document Routes *******************************/

/*********************************** Language Routes *******************************/

Route::get('/change-language/ar',[LanguageController::class,'change_language_ar']);
Route::get('/change-language/en',[LanguageController::class,'change_language_en']);

/*********************************** End Language Routes *******************************/


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

//Auth
Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

