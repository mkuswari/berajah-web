@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4 text-gray-800">Overview Saya</h1>
                <div class="jumbotron jumbotron-fluid bg-blue-global text-white rounded text-center">
                    <div class="container">
                      <h1 class="display-4">Selamat datang, {{ Auth::user()->name }}</h1>
                      <p class="lead">"Jangan lupa berdo'a sebelum mulai belajar."</p>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4 text-gray-800">Kelas Saya</h1>
                <hr>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
