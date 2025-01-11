<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        if ($category->posts()->exists()) {
            throw new \Exception('Cannot delete, related records exist.');
        }
        $category->delete();
        return redirect()->route('admin.category.index', compact('category'));
    }
}
