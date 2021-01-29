@extends('layouts.global')

@section('title')
    Kategori
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
    <section class="categories pb-5">
        <div class="container ">
            <div class="row">
                @if ($categories)
                    @foreach ($categories as $category)
                        <div class="col-sm-3">
                            <a href="{{ route('kategori/', [$category->slug]) }}" style="text-decoration: none;"
                                class="text-dark">
                                <div class="card shadow mt-4 border-0">
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        class="card-img-top category-thumbnail">
                                    <div class="card-body">
                                        <p class="card-text font-weight-bold text-center">{{ $category->name }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger">Maaf, belum ada kategori tersedia</div>
                @endif

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
