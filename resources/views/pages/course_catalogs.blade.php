@extends('layouts.global')

@section('title')
    Berajah ID - Katalog Kelas
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white text-center">
            <h2 class="font-weight-bold">Katalog Kelas</h2>
        </div>
    </div>
    </div>
    <!-- end of jumbotron -->

    <!-- courses -->
    <section class="courses py-4" style="margin-bottom: 100px;">
        <div class="container ">
            <div class="row d-flex justify-content-between">
                <div class="col-sm-7 align-self-center">
                    <h3 class="font-weight-bold">Kelas</h3>
                </div>
                <div class="col-sm-5">
                    <form action="{{ route('kelas') }}">
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
            <div class="row mt-4">
                @forelse ($courses as $course)
                    <div class="col-sm-3">
                        <div class="card shadow border-0 mt-3">
                            <img src="{{ asset('images/thumbnails/courses/' . $course->thumbnail) }}" class="course-thumbnail"
                                width="100%">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <a href="{{ route('kelas/', [$course->slug]) }}" style="text-decoration: none;"
                                        class="text-dark">{{ \Str::limit($course->name, 50, '...') }}</a>
                                </h6>
                                @if ($course->type == 'Premium')
                                    <span class="badge badge-success badge-pill px-3">Premium</span>
                                @else
                                    <span class="badge badge-warning badge-pill px-3 text-white">Free</span>
                                @endif
                            </div>
                            <div class="card-footer border-0 bg-white">
                                <a href="{{ route('kelas/', [$course->slug]) }}"
                                    class="btn btn-primary btn-block rounded-0">Pelajari Kelas ini</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="row py-5">
                        <div class="col-sm-8 mx-auto">
                            <img src="{{ asset('global/images/svg/empty.svg') }}" width="100%">
                            <h4 class="text-center mt-4 text-muted font-weight-bold">Upps.. Sepertinya Belum ada Kelas tersedia
                            </h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- end of courses -->

    <!-- pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{ $courses->links() }}
        </ul>
    </nav>
    <!-- end of pagination -->
@endsection
