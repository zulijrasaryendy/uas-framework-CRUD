<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminUsersController;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\HomeController;
use App\Models\Article;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/old', function () {
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get("/", [HomeController::class, "test"])->name("home.test");
Route::get("/about", [HomeController::class, "about"])->name("home.about");
Route::get("/blogs", [HomeController::class, "blogs"])->name("home.blogs");
Route::get("/articles", [HomeController::class, "blogs"])->name("home.blogs");
Route::get('/articles/{article:slug}', [HomeController::class, 'show']);
Route::post('/comment/{article:slug}', [HomeController::class, 'storeComment'])->name("home.storeComment");

// Route::get('/about', function () {
//     return view('about', [
//         'title' => 'About',
//         'active' => 'about',
//         'name' => 'Zul Ijra Saryendy',
//         'email' => 'saryendyzulijra@gmail.com',
//         'image' => 'zulijra.jfif'
//     ]);
// });

// Route::get('/articles', [ArticleController::class, 'index']);
// Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

// Route::get('/categories', function () {
//     return view('categories', [
//         'title' => 'Article Categories',
//         'active' => 'categories',
//         'categories' => Category::all()
//     ]);
// });


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name("logout");

// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/articles/checkSlug', [DashboardArticleController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');

Route::resource("/dashboard/users", AdminUsersController::class)->middleware("admin");