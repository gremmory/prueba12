<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('layouts/admin');
});



Route::resource('nomodel/annos', 'AnnosController');
Route::resource('nomodel/cargos', 'CargosController');
Route::post('nomodel/annos/store', ['as' =>'AnnosFormRequest', 'uses' => 'AnnosController@Insetar']);
Route::post('nomodel/cargos/store', ['as' =>'CargosFormRequest', 'uses' => 'CargosController@Insetar']);


Route::resource('model/profesiones', 'ProfesionesController');
Route::post('model/profesiones/store', ['as' =>'ProfesionesFormRequest', 'uses' => 'ProfesionesController@Insetar']);


Route::resource('model/marcas', 'MarcasController');
Route::post('model/marcas/store', ['as' =>'MarcasFormRequest', 'uses' => 'MarcasController@Insetar']);


Route::resource('model/proveedores', 'ProveedoresController');
Route::post('model/proveedores/store', ['as' =>'ProveedoresFormRequest', 'uses' => 'ProveedoresController@Insetar']);


Route::resource('model/departamentos', 'DepartamentosController');
Route::post('model/departamentos/store', ['as' =>'DepartamentosFormRequest', 'uses' => 'DepartamentosController@Insetar']);

Route::resource('model/niveles', 'NivelesController');
Route::post('model/niveles/store', ['as' =>'NivelesFormRequest', 'uses' => 'NivelesController@Insetar']);

Route::resource('model/jornadas', 'JornadasController');
Route::post('model/jornadas/store', ['as' =>'JornadasFormRequest', 'uses' => 'JornadasController@Insetar']);

Route::resource('model/errores_de_pegados', 'Errores_de_pegadosController');
Route::post('model/errores_de_pegados/store', ['as' =>'Errores_de_pegadosFormRequest', 'uses' => 'Errores_de_pegadosController@Insetar']);

Route::resource('model/switchboard_items', 'Switchboard_ItemsController');
Route::post('model/switchboard_items/store', ['as' =>'Switchboard_ItemsFormRequest', 'uses' => 'Switchboard_ItemsController@Insetar']);
Route::delete('model/switchboard_items/{id1}/{id2}', 'Switchboard_ItemsController@destroy');
Route::get('model/switchboard_items/{id1}/{id2}', 'Switchboard_ItemsController@update');


Route::resource('model/usuarios', 'UsuariosController');
Route::post('model/usuarios/store', ['as' =>'UsuariosFormRequest', 'uses' => 'UsuariosController@Insetar']);
//Route::get('model/switchboard_items/{id1}/{id2}/edit', 'Switchboard_ItemsController@edit');
//Route::get('model/switchboard_items/{id}/edito', ['as' => 'edito', 'uses' => 'Switchboard_ItemsController@edito']);


//Route::delete('nomodel/annos/{id}', 'AnnosController@destroy')->name('annos.destroy');
//Route::get('nomodel/annos/delete/{id}', 'AnnosController@destroyer')->name('nomodel.annos.destroyer');
//Route::POST('/workout' , SomeController@post);

//AnnosController@store


Route::resource('model/ctrlsupervisiones', 'CtrlsupervisionesController');
Route::post('model/ctrlsupervisiones/store', ['as' =>'CtrlsupervisionesFormRequest', 'uses' => 'CtrlsupervisionesController@Insetar']);


Route::resource('model/dispositivos', 'DispositivosController');
Route::post('model/dispositivos/store', ['as' =>'DispositivosFormRequest', 'uses' => 'DispositivosController@Insetar']);


Route::resource('model/municipios', 'MunicipiosController');
Route::post('model/municipios/store', ['as' =>'MunicipiosFormRequest', 'uses' => 'MunicipiosController@Insetar']);


Route::resource('model/fases', 'FasesController');
Route::post('model/fases/store', ['as' =>'FasesFormRequest', 'uses' => 'FasesController@Insetar']);


Route::resource('model/establecimientos', 'EstablecimientosController');
Route::post('model/establecimientos/store', ['as' =>'EstablecimientosFormRequest', 'uses' => 'EstablecimientosController@Insetar']);
Route::get('model/municipios2/{id}', 'EstablecimientosController@getMunicipio');

Route::get('/model/fotos/{id}/', 'FotosController@getFotos');
Route::post('/model/fotos/store',  ['as' =>'FotosFormRequest', 'uses' => 'FotosController@Insetar']);
Route::get('/model/fotos/destroy/{id1}/{id2}',  ['as' =>'FotosFormRequest', 'uses' => 'FotosController@destroy']);



Route::resource('model/detalle_equipos', 'Detalle_EquiposController');
Route::post('model/detalle_equipos/store', ['as' =>'Detalle_EquiposFormRequest', 'uses' => 'Detalle_EquiposController@Insetar']);


Route::resource('model/instructores', 'InstructoresController');
Route::post('model/instructores/store', ['as' =>'InstructoresFormRequest', 'uses' => 'InstructoresController@Insetar']);



//Route::resource('carga/establecimiento', 'Carga_EstablecimientoController');
Route::get('/carga/establecimiento', 'Carga_EstablecimientoController@index');
Route::post('/carga/establecimiento/store',  'Carga_EstablecimientoController@establecimientos');




Route::get('/carga/dispositivos', 'Carga_EstablecimientoController@index2');
Route::post('/carga/dispositivos/store',  'Carga_EstablecimientoController@dispositivoss');




// para generar PDF
Route::get('generate-pdf','PruebaPDFController@generatePDF');

Route::get('/pdf/generarpdf/vista','GenerarPDFController@vista');
Route::post('/pdf/generarpdf/crearvista',  'GenerarPDFController@crearvista');
Route::get('/pdf/generarpdf/depto/{id}', 'GenerarPDFController@getFases_Depto');

Route::get('/pdf/generarpdf/edu/{id}', 'GenerarPDFController@getEducativa');

Route::get('/pdf/generarpdf/doc/{id}', 'GenerarPDFController@getDocente');
Route::get('/pdf/generarpdf/ser/{id}', 'GenerarPDFController@getServidor');
Route::get('/pdf/generarpdf/rou/{id}', 'GenerarPDFController@getEnrutador');
Route::get('/pdf/generarpdf/all/{id}/{dpt}', 'GenerarPDFController@getAll');


/*
Route::get('/', function () {
    return view('carga.carga_establecimiento');
});
*/


//Route::post('/model/images/postFotos', 'FotosController@postFotos');

//Route::resource('model/retiro_equipos', 'Retiro_EquiposController');
//Route::post('model/retiro_equipos/store', ['as' =>'Retiro_EquiposFormRequest', 'uses' => 'Retiro_EquiposController@Insetar']);