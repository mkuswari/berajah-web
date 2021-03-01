@extends('layouts.global')

@section('title')
    Berajah ID - Blogs
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
    <section class="courses py-4" style="margin-bottom: 100px;">
        <div class="container ">
            <div class="row d-flex justify-content-between">
                <div class="col-sm-7 align-self-center">
                    <h3 class="font-weight-bold">Artikel</h3>
                </div>
                <div class="col-sm-5">
                    <form action="{{ route('blog') }}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari nama kelas..." name="keyword"
                                value="{{ Request::get('keyword') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-5">
                @forelse ($articles as $article)
                    <div class="col-sm-4">
                        <div class="card shadow rounded-lg border-0">
                            <img src="{{ asset('images/thumbnails/articles/' . $article->thumbnail) }}" width="100%"
                                style="height: 200px; object-fit: cover; object-position: center;">
                            <div class="card-body">
                                <a href="{{ route('blog/', [$article->slug]) }}" style="color: black;">
                                    <h6 class="card-title font-weight-bold">{{ $article->title }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="row py-5">
                        <div class="col-sm-8 mx-auto">
                            <img src="{{ asset('global/images/svg/empty.svg') }}" width="100%">
                            <h4 class="text-center mt-4 text-muted font-weight-bold">Upps.. Sepertinya Belum ada Artikel
                                tersedia
                            </h4>
                        </div>
                    </div>
                @endforelse
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
