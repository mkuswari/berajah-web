@extends('layouts.global')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" style="height: 200px;"></div>
    <!-- end of jumbotron -->

    <section class="blog-section" style="margin-top: -150px; margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card shadow border-0 mt-2">
                        <div class="card-body">
                            <h4 class="font-weight-bold">{{ $article->title }}</h4>
                            <p class="text-muted small">Oleh : {{ $article->author }} | Pada :
                                {{ date('d F, Y', strtotime($article->created_at)) }}
                            </p>
                            <hr>
                            <img src="{{ asset('images/thumbnails/articles/' . $article->thumbnail) }}" width="100%"
                                style="height: 400px; object-fit: cover; object-position: center;" class="rounded">
                            <div class="article-content py-4">
                                {!! $article->content !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card shadow border-0 mt-2">
                        <div class="card-body">
                            <h5 class="font-weight-bold text-center">Blog Lainnya</h5>
                            <hr>
                            @foreach ($articles as $article)
                                <a href="{{ route('blog/', [$article->slug]) }}" class="text-dark font-weight-bold">
                                    <p>{{ $article->title }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
