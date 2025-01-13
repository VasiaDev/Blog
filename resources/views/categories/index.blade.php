@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Categories</h1>
            <section class="featured-posts-section">
                <div class="card border-0 shadow-lg">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <li class="list-group-item list-group-item-action border-bottom border-light p-0">
                                <a href="{{ route('category.post.index', $category->id) }}" class="d-flex align-items-center p-4 text-decoration-none text-dark hover-bg-light-success">
                                    <i class="bi bi-folder2-open text-success me-3 fs-4"></i>
                                    <span class="fw-bolder">{{ $category->title }}</span>
                                    <i class="bi bi-chevron-right text-success ms-auto"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                </div>
            </section>
        </div>

    </main>
@endsection

