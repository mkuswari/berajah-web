@extends('layouts.global')

@section('title')
    {{ $course->name }}
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white text-center">
            <div class="row">
                <div class="col-10 mx-auto">
                    <h4 class="font-weight-bold">{{ $course->name }}</h4>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end of jumbotron -->

    <!-- course-detail -->
    <section class="course-detail py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <iframe
                                src="https://www.youtube.com/embed/{{ $course->trailer_url }}?modestbranding=1&autoplay=1"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen style="width: 100%; height: 420px;"></iframe>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">Tentang Mentor</h5>
                            @if ($course->instructors->avatar)
                                <img src="{{ asset('storage/' . $course->instructors->avatar) }}"
                                    class="rounded-cirle instructor-thumbnail shadow-sm">
                            @else
                                <img alt="image"
                                    src="https://ui-avatars.com/api/?name={{ $course->instructors->name }}&background=random&color=fff"
                                    class="rounded-cirle instructor-thumbnail shadow-sm">
                            @endif
                            <div class="instructor-profile mt-3">
                                <p>{{ $course->instructors->name }}</p>
                                <small class="text-muted">
                                    {{ $course->instructors->about }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of course detail -->

    <!-- about course -->
    <section class="about-course py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="font-weight-bold">Tentang Kelas</h3>
                    <hr>
                    <div>
                        {!! $course->description !!}
                    </div>
                </div>
                <div class="col-sm-5">
                    <h3 class="font-weight-bold">Materi Kelas</h3>
                    <hr>
                    <ul class="list-group">
                        @foreach ($contents as $content)
                        <li class="list-group-item">{{ $loop->iteration }} | {{ $content->name }}</li>
                        @endforeach
                      </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end of about course -->

    <!-- reviews -->
    <section class="reviews py-5">
        <div class="container">
            <h3 class="font-weight-bold text-center">Kelas Lainnya</h3>
            <div class="row mt-4">
                @if ($courses)
                    @foreach ($courses as $course)
                        <div class="col-sm-3">
                            <div class="card shadow-sm border-0 mt-3">
                                <img src="{{ asset('storage/' . $course->thumbnail) }}" class="course-thumbnail"
                                    width="100%">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('kelas/detail', [$course->slug, $course->id]) }}"
                                            style="text-decoration: none;" class="text-dark">{{ $course->name }}</a>
                                    </h5>
                                    @if ($course->type == 'Premium')
                                        <span class="badge badge-success badge-pill px-3">Premium</span>
                                    @else
                                        <span class="badge badge-warning badge-pill px-3 text-white">Free</span>
                                    @endif
                                </div>
                                <div class="card-footer border-0 bg-white">
                                    <a href="{{ route('kelas/detail', [$course->slug, $course->id]) }}"
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
    <!-- end of reviews -->


    <!-- enroll bar -->
    <div class="enroll-bar fixed-bottom shadow-lg py-4">
        <div class="container d-flex justify-content-between">
            <div class="row" style="width: 100%;">
                <div class="col-sm-3 align-self-center">
                    <b>Level</b>
                    <p class="text-muted">{{ $course->level }}</p>
                </div>
                <div class="col-sm-3 align-self-center">
                    <b>Kategori</b>
                    <p class="text-muted">{{ $course->categories->name }}</p>
                </div>
                <div class="col-sm-3 align-self-center">
                    <b>Harga</b>
                    <p class="text-muted">
                        @if ($course->type == 'Premium')
                            Rp. {{ number_format($course->price) }}
                        @else
                            Gratis.
                        @endif
                    </p>
                </div>
                <div class="col-sm-3 align-self-center">
                    <form action="{{ route('enroll-kelas') }}" class="d-inline" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <button type="submit" class="btn btn-primary btn-block btn-lg rounded-0">Enroll Kelas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end of enroll bar -->
@endsection
