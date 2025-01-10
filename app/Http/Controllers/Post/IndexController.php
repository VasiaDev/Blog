<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(9);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $newestPosts = Post::orderBy('created_at', 'DESC')->take(3)->get();
        return view('posts.index', compact('posts', 'randomPosts', 'likedPosts', 'newestPosts'));
    }
}
