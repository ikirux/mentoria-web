<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('published_at')
            ->with(['category', 'author']);

        if (request('search')) {
            // agregar las condiciones de busqueda
            $posts->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('resumen', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            'posts' => $posts->get(),
            'categories' => Category::all(),
        ]);
    }
}
