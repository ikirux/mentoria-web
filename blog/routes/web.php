<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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

Route::get('/', function () {
    $posts = Post::latest('published_at')
                ->with(['category', 'author']);

    if (request('search')) {
        // agregar las condiciones de busqueda
        $posts->where('title', 'like', '%' . request('search') . '%');
    }

    return view('posts', [
        'posts' => $posts->get(),
        'categories' => Category::all(),
    ]);
})->name('home');

Route::get('/post/{post}', function (Post $post) {
    return view('post', [
        'post' => $post,
    ]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']),
        'categories' => Category::all(),
        'currentCategory' => $category,
    ]);
});

Route::get('/author/{author}', function (User $author) {
    return view('posts', [
        // eager loading (load, with)
        // por defecto es lazy loading
        'posts' => $author->posts->load(['category', 'author']),
        'categories' => Category::all(),
    ]);
});
