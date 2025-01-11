<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $countLikes = auth()->user()->likedPosts()->count();
        $countComments = auth()->user()->comments()->count();
        return view('personal.main.index', compact('countLikes', 'countComments'));
    }
}
