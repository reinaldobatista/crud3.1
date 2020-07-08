<?php

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
Route::resource('/products','ProductController');
Route::get('/', function () {
    return view('index');
});
Route::get('/administraCategorias', function () {
    return view('administraCategorias');
})->name('administra.categoria');
Route::get('/administraEstoque', function () {
    return view('administraEstoque');
})->name('administra.story');
Route::get('/administraUsuarios', function () {
    return view('administraUsuarios');
})->name('administra.usuario');
Route::get('/usuario/index.blade.php',function () {
    return view('ajax.usuario.CadastraUsuario');
});
Route::post('/produto/storeCategory','ProductController@categoryStore')->name('category.store');

Route::post('/produto/storeproduto','ProductController@productStore')->name('product.store');

Route::post('/produto/storeUsuario','ProductController@userStore')->name('usuario.store');

Route::post('/produto/storeStory','ProductController@storyStore')->name('story.store');

Route::get('/produto/cadastraProduto','ProductController@createProducts')->name('product.create');

Route::get('/usuario/index','ProductController@createUser')->name('user.create');

Route::get('/categoria/cadastra','ProductController@createCategory')->name('categoy.create');

Route::get('/cadastra/estoque','ProductController@createStory')->name('story.create');

Route::get('/produto/visualizarProduto','ProductController@visualizarProduto')->name('products.visualizar');

Route::get('/categoria/index','ProductController@visualizarCategory')->name('category.visualizar');

Route::get('/usuario/visualizar','ProductController@visualizarUsuario')->name('usuario.visualizar');

Route::get('/visualizar/estoque','ProductController@visualizarStory')->name('story.visualizar');
