@extends('personal.layouts.main')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">Comments</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('personal') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Comments</li>
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
                        <form action="{{ route('personal.comment.update', $comment->id ) }}" method="POST" class="w-50">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label">Comment</label>
                                <textarea class="form-control" name="message" cols="30" rows="5">{{ $comment->message }}</textarea>
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-secondary mb-2" value="Update">
                        </form>
                    </div>
                <!--end::Row-->
                </div>
            <!--end::Container-->
            </div>
        </div>
        <!--end::App Content-->
    </main>
@endsection

