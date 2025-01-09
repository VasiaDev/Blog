@extends('admin.layouts.main')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Editing a post</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group mb-3 w-25">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Post title" value="{{ $post->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mt-3 w-50">
                                <label class="form-label">Add preview</label>
                                <div class="container">
                                    <div class="row w-50 mb-2">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="d-block w-50">
                                    </div>
                                </div>

                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="preview_image">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mt-3 w-50">
                                <label class="form-label">Add main preview</label>
                                <div class="container">
                                    <div class="row w-50 mb-2">
                                        <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" class="d-block w-50">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile02" name="main_image">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3 w-50">
                                <label class="form-label">Select category</label>
                                <select name="category_id" class="form-select">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? ' selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label">Select tags</label>
                                <div mbsc-page class="demo-multiple-select">
                                    <div style="height:100%; width: 50%">
                                        <label>
                                            <input mbsc-input id="demo-multiple-select-input" placeholder="Please select..." data-dropdown="true" data-input-style="outline" data-label-style="stacked" data-tags="true" />
                                        </label>
                                        <select id="demo-multiple-select" name="tag_ids[]" multiple>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}" {{ is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}>
                                                    {{ $tag->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-secondary mb-2 mt-3" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

