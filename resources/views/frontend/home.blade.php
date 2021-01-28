@extends('layouts.global')

@section('title')
    Dashboard Akun
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid text-white">
        <div class="container">
            <h2>Hai, {{ Auth::user()->name }}</h2>
            <p>Jangan lupa Berdo'a sebelum belajar.</p>
        </div>
    </div>

    {{-- enrolled course --}}
    <section class="enrolled-course py-5">
        <div class="container">
            <h3 class="font-weight-bold">Kelas yang saya ambil</h3>
            <hr>
            <div class="row">
                @foreach ($enrollments as $enrollment)
                <div class="col-sm-3">
                    <div class="card shadow border-0 mt-3">
                        <img src="{{ asset('storage/' . $enrollment->courses->thumbnail) }}" class="course-thumbnail"
                            width="100%">
                        <div class="card-body">
                            <h6 class="card-title">
                                <a href="{{ route('play', [$enrollment->courses->slug]) }}" style="text-decoration: none;"
                                    class="text-dark">{{ \Str::limit($enrollment->courses->name, 50, '...') }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- challenge takes --}}
    <section class="challenge-take py-5 bg-light">
        <div class="container">
            <h3 class="font-weight-bold">Challenge yang saya ikuti</h3>
            <hr>
        </div>
    </section>

@endsection
