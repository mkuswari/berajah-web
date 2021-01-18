@extends('layouts.backend')

@section('title')
    {{ $article->title }}
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>Detail Artikel</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <h3>{{ $article->title }}</h3>
                                        <p class="small-text">
                                            <i class="fas fa-tags"></i>
                                            <span>{{ $article->categories->name }}</span> |
                                            <i class="fas fa-user"></i>
                                            <span>{{ $article->author }}</span> |
                                            <i class="fas fa-clock"></i>
                                            <span>{{ date('d F Y', strtotime($article->created_at)) }}</span>
                                        </p>
                                        <img src="{{ asset('storage/' . $article->thumbnail) }}"
                                            style="width: 100%; height: 500px; object-fit: cover; object-position: center;">
                                        <div class="content mt-3">
                                            {!! $article->content !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
