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
                        <div class="card mb-4">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Title</th>
                                        <th style="width: 90px; text-align: center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr class="align-middle">
                                            <td>{{ $comment->id }}</td>
                                            <td>{{ $comment->message }}</td>
                                            <td style="text-align: center" class="d-flex">
                                                <a href="{{ route('personal.comment.edit', $comment->id) }}"
                                                   class="text-success"><i class="fa-solid fa-pen-to-square m-2"></i></a>
                                                <form action="{{ route('personal.comment.delete', $comment->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fa-solid fa-trash-can m-2 text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <!--end::Row-->
                </div>
            <!--end::Container-->
            </div>
        </div>
        <!--end::App Content-->
    </main>
@endsection

