<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;

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

Route::get('/', [ViewController::class,'index'])->name('web.index');
Route::get('/padres', [ViewController::class,'parents'])->name('web.parents');
Route::get('/docentes', [ViewController::class,'teachers'])->name('web.teachers');
Route::get('/profesionales', [ViewController::class,'professionals'])->name('web.professionals');
Route::get('/actividades', [ViewController::class,'activity'])->name('web.activity');
Route::get('/actividades/{plano}', [ViewController::class,'activities'])->name('web.activities');
Route::get('/centros', [ViewController::class,'center'])->name('web.center');
Route::get('/contacto', [ViewController::class,'contact'])->name('web.contact');
Route::post('/contacto', [MailController::class,'sendMail']);

Route::get('/registro', [ViewController::class,'register'])->middleware('guest')->name('web.register');
Route::post('/registro', [UserController::class,'userRegistry']);
Route::get('/login', [ViewController::class,'login'])->middleware('guest')->name('web.login');
Route::post('/login', [UserController::class,'userLogin']);
Route::get('/forgot-pass', [ViewController::class,'userForgot'])->middleware('guest')->name('web.forgot');
Route::post('/forgot-pass', [UserController::class,'userPassMail']);
Route::get('/reset-pass/{token}', [ViewController::class,'userReset'])->middleware('guest')->name('password.reset');
Route::post('/reset-pass', [UserController::class,'userPassReset'])->middleware('guest')->name('password.update');
Route::get('/login-google', [GoogleController::class,'googleLogin'])->middleware('guest')->name('web.gLogin');
Route::get('/google-callback', [GoogleController::class,'googleCallback']);
Route::get('/logout', [UserController::class,'userLogout'])->middleware('auth')->name('web.logout');

Route::prefix('/foro')->middleware('auth')->group(function(){
    Route::get('/', [ViewController::class,'forum'])->name('web.forum');
    Route::get('/{id}', [ViewController::class,'pubsByCategory'])->name('web.forumCat');
    Route::get('/{id}/new', [ViewController::class,'publicacionNewView'])->name('web.forumNewPub');
    Route::post('/{id}/new', [PublicacionController::class,'newPublicacion']);
    Route::get('/{id}/{pub}', [ViewController::class,'pubView'])->name('web.forumPub');
    Route::post('/{id}/{pub}', [ComentarioController::class,'newComentario']);
    Route::put('/{id}/{pub}', [ComentarioController::class,'editComentario']);
    Route::delete('/{id}/{pub}', [ComentarioController::class,'deleteComentario']);
    Route::post('/com',[ComentarioController::class,'blockComentario'])->middleware('IsAdmin')->name("web.blockComm");
    Route::post('/pub',[PublicacionController::class,'blockPublicacion'])->middleware('IsAdmin')->name("web.blockPub");
});

Route::prefix('/admin')->middleware('auth','IsAdmin')->group(function(){
    Route::get('/',[ViewController::class,'adminIndex'])->name('admin.index');

    Route::prefix('/actividades')->group(function(){
        Route::get('/',[ActividadController::class,'actividadesTableView'])->name('admin.actividades');
        Route::get('/new',[ActividadController::class,'actividadNewView'])->name('admin.actividadNew');
        Route::post('/new',[ActividadController::class,'newActividad']);
        Route::get('/{id}',[ActividadController::class,'actividadEditView'])->name('admin.actividadEdit');
        Route::put('/{id}',[ActividadController::class,'editActividad']);
        Route::delete('/',[ActividadController::class,'deleteActividad'])->name('admin.actividadDelete');
    });
    
    Route::prefix('/centros')->group(function(){
        Route::get('/',[CentroController::class,'centrosTableView'])->name('admin.centros');
        Route::get('/new',[CentroController::class,'centroNewView'])->name('admin.centroNew');
        Route::post('/new',[CentroController::class,'newCentro']);
        Route::get('/{id}',[CentroController::class,'centroEditView'])->name('admin.centroEdit');
        Route::put('/{id}',[CentroController::class,'editCentro']);
        Route::delete('/',[CentroController::class,'deleteCentro'])->name('admin.centroDelete');
    });

    Route::prefix('/usuarios')->group(function(){
        Route::get('/',[UserController::class,'usuariosTableView'])->name('admin.usuarios');
        Route::get('/{id}',[UserController::class,'usuarioReadView'])->name('admin.usuarioRead');
        Route::post('/{id}',[UserController::class,'usuarioCatEdit']);
    });
});
