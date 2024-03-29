@extends('layouts.global')

@section('title')
    Belajar ID - Belajar Online dari komunitas untuk komunitas
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white">
            <div class="row">
                <div class="col-sm-6 align-self-center">
                    <h1>Belajar bersama kami.</h1>
                    <p><b>Belajar.id</b> merupakan Platform Belajar Online Lokal, yang membantu kamu mengasah dan memperoleh
                        ilmu dengan beragam kelas gratis.</p>
                    <hr>
                    <a href="{{ route('kelas') }}" class="btn btn-warning btn-lg text-white">Mulai Belajar</a>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <img src="{{ asset('global/images/svg/developer_activity.svg') }}" width="100%">
                </div>
            </div>
        </div>
    </div>
    <!-- end of jumbotron -->

    <!-- our-benefit -->
    <section class="benefit-us py-5">
        <div class="container text-center">
            <h2 class="font-weight-bold">Kenapa belajar di belajar.id?</h2>
            <div class="row mt-5">
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/1.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">100% Semua Kelas Online</h4>
                        <p class="text-muted">Kamu bisa belajar kapanpun dan dimanapun sesuai keinginan kamu.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/2.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">Akses Beragam kelas Online</h4>
                        <p class="text-muted">Kamu bisa Mengakses beragam kelas yang kami punya secara mudah.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/3.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">Pengajar Berpengalaman</h4>
                        <p class="text-muted">Kelas kami diajar oleh pengajar yang berpengalaman dibidangnya.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/4.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">Diskusi dan Kolaborasi</h4>
                        <p class="text-muted">Kamu bisa memperluas jaringan dengan memiliki forum komunitas untuk
                            berdiskusi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of our benefit -->

    <!-- latest course -->
    <section class="lates-course py-5 bg-light">
        <div class="container">
            <h3 class="font-weight-bold text-center">Kelas Terbaru kami</h3>
            <hr>
            <div class="row mt-3">
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
                    <img src="{{ asset('global/images/svg/empty.svg') }}" width="50%" class="mx-auto">
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('kelas') }}">Lihat Semua Kelas</a>
            </div>
        </div>
    </section>
    <!-- end of latest course -->

    <!-- blogs -->
    <section class="lates-blogs py-5">
        <div class="container">
            <h3 class="font-weight-bold text-center">Artikel Terbaru</h3>
            <div class="row mt-3">
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
                    <img src="{{ asset('global/images/svg/empty.svg') }}" width="50%" class="mx-auto">
                @endforelse
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('blog') }}">Lihat semua Artikel</a>
            </div>
        </div>
    </section>
    <!-- end of blogs -->
@endsection
