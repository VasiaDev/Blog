<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        // Обработка preview_image
        if ($request->hasFile('preview_image')) {
            // Если загружен новый файл, сохраняем его
            $data['preview_image'] = Storage::disk('public')->put('/images', $request->file('preview_image'));
        } else {
            // Если файл не был загружен, сохраняем старое значение (из базы данных)
            $data['preview_image'] = $post->preview_image;
        }

        // Обработка main_image
        if ($request->hasFile('main_image')) {
            // Если загружен новый файл, сохраняем его
            $data['main_image'] = Storage::disk('public')->put('/images', $request->file('main_image'));
        } else {
            // Если файл не был загружен, сохраняем старое значение (из базы данных)
            $data['main_image'] = $post->main_image;
        }


        $post->update($data);
        $post->tags()->sync($tagIds);
        return redirect()->route('admin.post.show', compact('post'));
    }
}
