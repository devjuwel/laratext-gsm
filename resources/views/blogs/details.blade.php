@extends('layouts.frontend')
@section('title')
    <title>Blank details | GSP - The best place to explore your favourite business.</title>
@endsection
@section('custom_head')
    <!-- Custom styles for this template -->
@endsection
@section('content')
    <main>
        <div class="container-fluid container-lg bg-white mt-3 mt-md-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $blog->post_title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on
                                {{ date('F d, Y', strtotime($blog->created_at)) }}</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light"
                                href="#!">{{ $blog->post_category_title }}</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4">
                            <img class="img-fluid rounded" src="{{ asset($blog->post_image) }}" alt="{{ $blog->post_title }}"
                                style="width: 900px; height: 400px" />
                        </figure>
                        <!-- Post content-->
                        <section class="mb-5"><?php echo $blog->post_description; ?></section>
                    </article>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..."
                                    aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="row list-unstyled mb-0">
                                        @foreach ($categories as $category)
                                            <li class="col-6 col-lg-6"><a href="#">{{ $category->category_title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    {{-- <div class="card mb-4">
                            <div class="card-header">Side Widget</div>
                            <div class="card-body">You can put anything you want inside of these side widgets. They are
                                easy to use, and feature the card component!</div>
                        </div> --}}
                </div>
            </div>
        </div>
    </main>
@endsection

@section('custom_script')
@endsection
