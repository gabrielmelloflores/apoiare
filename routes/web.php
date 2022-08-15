<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\SessionController;
use App\Services\Newsletter;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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
//
//Route::get('/', function () {
//    $posts = ['posts' => Post::latest()->filter(
//        request(['search', 'category', 'author'])
//    )->paginate(6)->withQueryString()];
//    return view('vendor.jetstream.components.welcome', compact('posts'));
//})->name('/');

Route::get('/', [PostController::class, 'welcome'])->name('/');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
});

// Route::get('/dashboard', function () {
//     return view('posts\index');
// })->name('dashboard');


Route::get('/dashboard', [PostController::class, 'index'])->name('home');
//Route::get('posts/{post}', function (Post $post) {
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);
//dd(Auth::check());

// Admin
//index, show, create, store, edit, update, destroy
Route::middleware('can:adminOrAuthor')->group(function(){
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::delete('admin/category/{category}', [CategoryController::class, 'destroy']);
    Route::post('admin/category', [CategoryController::class, 'store']);
});

Route::get('/register', [RegisteredUserController::class, 'create'])
//    ->middleware(['guest:'.config('fortify.guard')])
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);
//->middleware(['guest:'.config('fortify.guard')]);
