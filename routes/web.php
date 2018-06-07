<?php

//rutas para el Front
Route::get('/', 'Front\PaginasController@inicio')->name('inicio');
Route::get('/nosotros', 'Front\PaginasController@nosotros')->name('nosotros');
Route::get('/servicios', 'Front\PaginasController@servicios')->name('servicios');
Route::get('/contacto', 'Front\PaginasController@contacto')->name('contacto');

//rutas de usuarios

//rutas para probar el template. 
Route::get('/admin',function(){
	return view('admin.inicio');
});


Route::resource('admin/usuarios','Usuarios\UsuariosController');
Route::resource('admin/medicos','Usuarios\MedicosController');

route::get('usuarios-pdf','Usuarios\UsuariosController@exportarpdf')->name('pdfusuarios');
route::get('usuarios-xls','Usuarios\UsuariosController@exportarxls')->name('xlsusuarios');
route::get('usuariosimportar,Usuarios\UsuariosController@importarxls')->name('importar');
route::get('/calendario','Agenda\AgendasController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
