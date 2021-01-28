@extends('layouts.global')

@section('title')
    Kategori
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white text-center">
            <h2 class="font-weight-bold">{{ $article->title }}</h2>
        </div>
    </div>
    </div>
    <!-- end of jumbotron -->

    <!-- courses -->
    <section class="categories pb-5">
        <div class="container ">
            <div class="row">
                <div class="col-sm-10 mx-auto">
                    <i class="fas fa-user mr-2"></i><span>{{ $article->author }}</span> | <i
                        class="fas fa-clock mr-2"></i><span>{{ date('d F Y', strtotime($article->created_at)) }}</span> | <i
                        class="fas fa-tags mr-2"></i><span>{{ $article->categories->name }}</span>
                    <hr>
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </section>
    <!-- end of courses -->

@endsection
