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
    <section class="enrolled-course py-3">
        <div class="container">
            <h3 class="font-weight-bold">Kelas yang saya ambil</h3>
            <hr>
        </div>
    </section>

    {{-- challenge takes --}}
    <section class="challenge-take py-3 bg-light">
        <div class="container">
            <h3 class="font-weight-bold">Challenge yang saya ikuti</h3>
            <hr>
        </div>
    </section>

@endsection
