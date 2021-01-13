@extends('layouts.backend')

@section('title')
    Detail Instruktur
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Instruktur</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        @if ($instructor->avatar)
                                            <img src="{{ asset('storage/' . $instructor->avatar) }}" class="card-img"
                                                style="width: 100%; height: 205px;">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ $instructor->name }}&background=random&color=fff"
                                                class="card-img" style="width: 100%; height: 205px;">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $instructor->name }}</h5>
                                            <p class="card-text">{{ $instructor->email }}</p>
                                            <p class="card-text"><small class="text-muted">Ditambahkan pada :
                                                    {{ date('d F Y', strtotime($instructor->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <b>Nama Instruktur</b>
                            <p>{{ $instructor->name }}</p>
                            <b>Pekerjaan</b>
                            <p>{{ $instructor->job }}</p>
                            <b>Keahlian</b>
                            <p>{{ $instructor->expertise }}</p>
                            <b>Email</b>
                            <p>{{ $instructor->email }}</p>
                            <b>Tentang</b>
                            <p>{{ $instructor->about }}</p>
                            <b>Ditambahkan Pada</b>
                            <p>{{ date('d F Y', strtotime($instructor->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
