@extends('layouts.global')

@section('title')
    Blogs
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white text-center">
            <h2 class="font-weight-bold">Blogs</h2>
        </div>
    </div>
    </div>
    <!-- end of jumbotron -->

    <!-- courses -->
    <section class="courses py-4">
        <div class="container ">
            {{-- <div class="row d-flex justify-content-between">
                <div class="col-sm-7 align-self-center">
                    <h3 class="font-weight-bold">Kelas kami</h3>
                </div>
                <div class="col-sm-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari Artikel...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="row mt-5">
                @foreach ($articles as $article)
                    <div class="col-sm-4">
                        <div class="card shadow rounded-lg border-0">
                            <img src="{{ asset('storage/' . $article->thumbnail) }}" width="100%"
                                style="height: 200px; object-fit: cover; object-position: center;">
                            <div class="card-body">
                                <a href="{{ route('blog/', [$article->slug]) }}"
                                    style="text-decoration: none; color: black;">
                                    <h5 class="card-title font-weight-bold">{{ $article->title }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end of courses -->

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $articles->links() }}
        </ul>
    </nav>
@endsection
