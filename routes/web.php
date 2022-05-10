<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use App\Mail\ProcesosEnvios;

use App\Events\ContactWasRecorded;
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


Route::get('/test', function () {
event(new ContactWasRecorded("TEST"));
/*
    $client = new Client([
        // Base URI is used with relative requests
        'base_uri' => 'https://consultaprocesos.ramajudicial.gov.co:448',
        // You can set any number of default request options.
        'timeout'  => 8.0,
    ]);

 
// Send a request to https://foo.com/api/test
$response = $client->request('GET', '/api/v2/Procesos/Consulta/NumeroRadicacion?numero=05001400302020190050300&SoloActivos=false');
//dd($response->getBody()-> getContents());
 
//uavqqamdfmzaazgy
$array = json_decode( $response->getBody()-> getContents() , true);
Mail::to("julioam22@gmail.com")->send(new ProcesosEnvios());
dd($array['procesos'][0]['despacho']);
return json_decode($response->getBody()-> getContents());*/
//   return view('welcome');
});

/*Authentication*/
Route::get( '/', 'App\Http\Controllers\Auth\LoginController@showLogin')->middleware('guest')->name('login');
//Route::get( '/', 'Auth\LoginController@login')->name('login');
Route::get( '/logout', 'App\Http\Controllers\Auth\LoginController@logout')->middleware('guest')->name('logout');
Route::post('login','Auth\LoginController@login')->name('login');

Route::get('/authentication-signin', function () {return view('authentication-signin');})->name("login.new");
Route::get('/authentication-signup', function () {
    return view('authentication-signup');
});
Route::get('/authentication-signin-with-header-footer', function () {
    return view('authentication-signin-with-header-footer');
});
Route::get('/authentication-signup-with-header-footer', function () {
    return view('authentication-signup-with-header-footer');
});
Route::get('/authentication-forgot-password', function () {
    return view('authentication-forgot-password');
});
Route::get('/authentication-reset-password', function () {
    return view('authentication-reset-password');
});
Route::get('/authentication-lock-screen', function () {
    return view('authentication-lock-screen');
});
/*Route::view('/users','users.showAll')->name('users.all');
Route::get('/', function () {
    return view('index');
});
*/

/*Usuarios */
Route::get('admin/usuarios','App\Http\Controllers\UsuariosController@index')->name('index.usuarios');
Route::get('admin/usuarios/crear','App\Http\Controllers\UsuariosController@create')->name('create.usuario');
Route::post('admin/usuarios/crear','App\Http\Controllers\UsuariosController@store')->name('store.usuario');
Route::get('admin/usuarios/actualizar/{id}','App\Http\Controllers\UsuariosController@edit')->name('edit.usuario');
Route::patch('admin/usuarios/actualizar/{id}','App\Http\Controllers\UsuariosController@update')->name('update.usuario');
Route::delete('admin/usuarios/{id}','App\Http\Controllers\UsuariosController@destroy')->name('destroy.usuario');

/* PERFIL */
Route::get('admin/perfil','App\Http\Controllers\UsuariosController@perfil')->name('perfil.usuario');
Route::patch('admin/perfil/{id}','App\Http\Controllers\UsuariosController@updatePerfil')->name('update.perfil');

/*Procesos */
Route::get('admin/procesos','App\Http\Controllers\ProcesosController@index')->name('index.procesos');
Route::get('detalle/{id?}/{fecini?/{fecfin?}','App\Http\Controllers\ProcesosController@verDetalle')->name('detalle.procesos');
Route::get('crearproceso','App\Http\Controllers\ProcesosController@create')->name('create.proceso');
Route::post('guardarproceso','App\Http\Controllers\ProcesosController@store')->name('store.proceso');
Route::delete('admin/proceso/{id}','App\Http\Controllers\ProcesosController@destroy')->name('destroy.proceso');
Route::get('admin/procesoarchivados','App\Http\Controllers\ProcesosController@indexarchivados')->name('indexarchivados.proceso');

Route::get('admin/archivar/{id?}','App\Http\Controllers\ProcesosController@archivar')->name('archivar.proceso');
Route::get('admin/activar/{id?}','App\Http\Controllers\ProcesosController@activar')->name('activar.proceso');
Route::post('admin/upload/{id?}','App\Http\Controllers\ProcesosController@upload')->name('upload.documento');
/*Route::get('admin/blog/{id}','BlogController@edit')->name('edit.blog');
Route::patch('admin/blog/{id}','BlogController@update')->name('update.blog');
Route::delete('admin/blog/{id}','BlogController@destroy')->name('destroy.blog');
*/
/*Reportes */
Route::get('admin/reportes/procesos','App\Http\Controllers\ReportesController@index')->name('index.reportprocesos');
Route::get('admin/reportes/eliminados','App\Http\Controllers\ReportesController@indexeliminados')->name('index.reporteliminados');
/*Contactos */
Route::get('contactos','App\Http\Controllers\ContactosController@index')->name('index.contactos');
Route::get('contactos/crear','App\Http\Controllers\ContactosController@create')->name('create.contacto');
Route::post('contactos/crear','App\Http\Controllers\ContactosController@store')->name('store.contacto');
Route::get('contactos/actualizar/{id}','App\Http\Controllers\ContactosController@edit')->name('edit.contacto');
Route::patch('contactos/actualizar/{id}','App\Http\Controllers\ContactosController@update')->name('update.contacto');
Route::delete('contactos/{id}','App\Http\Controllers\ContactosController@destroy')->name('destroy.contacto');


/*Documento */
Route::get('admin/documento/{id?}','App\Http\Controllers\DocumentosController@index')->name('index.documentos');
Route::post('delete/{id?}','App\Http\Controllers\DocumentosController@eliminar')->name('eliminar.documento');
/*FIN DOCUMENTO */


Route::get('/dashboard-alternate', 'App\Http\Controllers\DashboardController@index')->name('dashboard-alternate');

Route::get('/form-layouts', function () {
    return view('form-layouts');
});
/*
Route::get('/contactos', function () {
    return view('contactos');
});*/


/*Procesos */
/*Route::get('/procesos_activos', function () {
    return view('procesos_activos');
});*/
/*Components*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
