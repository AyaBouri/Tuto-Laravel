<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\BlogController;
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
Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function (){
    //accueil
    Route::get('/','index')->name('index');
    //Cree un nouveau article
    //Methode Get
    Route::get('/new','create')->name('create');
    //Methode Post
    Route::post('/new','store');
    Route::get('/{post}/edit','edit')->name('edit');
    Route::post('/{post}/edit','update');
//list
    Route::get('/{slug}-{post}','show')->where([
        'post'=>'[0-9]+',
        'slug'=>'[a-z0-9\-]+'
    ])->name('show');
});
