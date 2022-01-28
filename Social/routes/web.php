<?php
namespace App\Http\Controllers;

use Illuminate\Auth\Events\Logout;
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
Route::post('/', [HomeController::class, 'home']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::get('/home/comment', [HomeController::class, 'showComments']);
Route::get('/post', [PostsController::class, 'publish']);
Route::get('/About', [AboutController::class, 'about']);
Route::get('/Services', [ServicesController::class, 'services']);
Route::get('/Posts', [PostsController::class, 'posts']);
Route::get('/Logout', [LogoutController::class, 'logout']);
Route::get('/Profile', [ProfileController::class, 'viewProfile']);
Route::post('/UpdateProfile', [ProfileController::class, 'updateProfile']);
Route::get('/postDel', [PostsController::class, 'del']);
Route::get('/updatePost', [PostsController::class, 'updatePost']);
Route::get('/comDel', [PostsController::class, 'delComment']);
Route::get('/rate', [RateController::class, 'rate']);

Route::get('/', [HomeController::class, 'home']);
Route::get('/About1', [AboutController::class, 'publicAbout']);
Route::get('/Services1', [ServicesController::class, 'publicServices']);
Route::get('/log', [LoginController::class, 'loginView']);
Route::get('/reg', [LoginController::class, 'registerView']);