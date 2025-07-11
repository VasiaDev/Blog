<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $countLikes = auth()->user()->likedPosts()->count();
        $countComments = auth()->user()->comments()->count();
        return view('personal.main.index', compact('countLikes', 'countComments'));
    }
}
