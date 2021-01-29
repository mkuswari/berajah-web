@extends('layouts.global')

@section('title')
    Lumbung Kelas - Katalog Kategori
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white text-center">
            <h2 class="font-weight-bold">Kategori</h2>
        </div>
    </div>
    </div>
    <!-- end of jumbotron -->

    <!-- courses -->
    <section class="categories pb-5" style="margin-bottom: 250px;">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-sm-7 align-self-center">
                    <h3 class="font-weight-bold">Kategori</h3>
                </div>
                <div class="col-sm-5">
                    <form action="{{ route('kategori') }}">
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
            <div class="row py-5">
                @forelse ($categories as $category)
                    <div class="col-sm-3">
                        <a href="{{ route('kategori/', [$category->slug]) }}" style="text-decoration: none;" class="text-dark">
                            <div class="card shadow mt-4 border-0">
                                <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top category-thumbnail">
                                <div class="card-body">
                                    <p class="card-text font-weight-bold text-center">{{ $category->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="row py-5">
                        <div class="col-sm-8 mx-auto">
                            <img src="{{ asset('global/images/svg/empty.svg') }}" width="100%">
                            <h4 class="text-center mt-4 text-muted font-weight-bold">Upps.. Sepertinya Belum ada Kategori
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
            {{ $categories->links() }}
        </ul>
    </nav>
@endsection
