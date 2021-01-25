@extends('layouts.backend')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
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
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('instructors.update', [$instructor->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama Instruktur</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" id="name" placeholder="Nama Lengkap..."
                                                    value="{{ $instructor->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="job" class="col-sm-2 col-form-label">Pekerjaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('job') is-invalid @enderror"
                                                    name="job" id="job" placeholder="Pekerjaan..."
                                                    value="{{ $instructor->job }}">
                                                @error('job')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="expertise" class="col-sm-2 col-form-label">Keahlian</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                    class="form-control @error('expertise') is-invalid @enderror"
                                                    name="expertise" id="expertise" placeholder="Keahlian..."
                                                    value="{{ $instructor->expertise }}">
                                                @error('expertise')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                    name="email" id="email" placeholder="E-mail..."
                                                    value="{{ $instructor->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="about" class="col-sm-2 col-form-label">Tentang</label>
                                            <div class="col-sm-10">
                                                <textarea name="about" id="about" rows="5"
                                                    class="form-control @error('about') is-invalid @enderror"
                                                    placeholder="Tentang...">{{ $instructor->about }}</textarea>
                                                @error('about')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                            <div class="col-sm-10">
                                                <input type="file" id="avatar" name="avatar" class="form-control">
                                                <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update Instruktur</button>
                                                <a href="{{ route('instructors.index') }}"
                                                    class="btn btn-warning">Batalkan</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
