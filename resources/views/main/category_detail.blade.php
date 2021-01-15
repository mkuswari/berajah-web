@extends('layouts.global')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white text-center">
            <h2 class="font-weight-bold">{{ $category->name }}</h2>
        </div>
    </div>
    </div>
    <!-- end of jumbotron -->

    <!-- courses -->
    <section class="courses py-4">
        <div class="container ">
            <div class="row d-flex justify-content-between">
                <div class="col-sm-7 align-self-center">
                    <h3 class="font-weight-bold">Kelas</h3>
                </div>
                <div class="col-sm-5">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari nama kelas...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                @if ($courses)
                    @foreach ($courses as $course)
                        <div class="col-sm-3">
                            <div class="card shadow-sm border-0 mt-3">
                                <img src="{{ asset('storage/' . $course->thumbnail) }}" class="course-thumbnail"
                                    width="100%">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('kelas/detail', [$course->slug]) }}"
                                            style="text-decoration: none;" class="text-dark">{{ $course->name }}</a>
                                    </h5>
                                    @if ($course->type == 'Premium')
                                        <span class="badge badge-success badge-pill px-3">Premium</span>
                                    @else
                                        <span class="badge badge-warning badge-pill px-3 text-white">Free</span>
                                    @endif
                                </div>
                                <div class="card-footer border-0 bg-white">
                                    <a href="{{ route('kelas/detail', [$course->slug]) }}"
                                        class="btn btn-primary btn-block rounded-0">Pelajari Kelas ini</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger">Maaf, belum ada kelas tersedia</div>
                @endif
            </div>
        </div>
    </section>
    <!-- end of courses -->

    <!-- pagination -->
    {{-- <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> --}}
    <!-- end of pagination -->
@endsection
