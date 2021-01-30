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
                @forelse ($enrollments as $enrollment)
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
                @empty
                    <div class="row py-5">
                        <div class="col-sm-8 mx-auto">
                            <img src="{{ asset('global/images/svg/empty.svg') }}" width="100%">
                            <h4 class="text-center mt-4 text-muted font-weight-bold">Upps.. Kamu belum punya kelas
                            </h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection
