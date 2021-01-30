@extends('layouts.backend')

@section('title')
    Profile Saya
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile Saya</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        @if (Auth::user()->avatar)
                                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="card-img"
                                                style="width: 100%; height: 205px;">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random&color=fff"
                                                class="card-img" style="width: 100%; height: 205px;">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ Auth::user()->name }}</h5>
                                            <p class="card-text">{{ Auth::user()->email }}</p>
                                            <p class="card-text">{{ Auth::user()->phone }}</p>
                                            <p class="card-text"><small class="text-muted">Member Since :
                                                    {{ date('d F Y', strtotime(Auth::user()->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center">Personal Information</h4>
                                    <hr>
                                    <form action="{{ route('profile-saya.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PATCH")
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" id="name" value="{{ Auth::user()->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                    name="email" id="email" value="{{ Auth::user()->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="phone" id="phone"
                                                    value="{{ Auth::user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="avatar" id="avatar">
                                                <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                            </div>
                                        </div>
                                        <div class="form-action row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card mt-2">
                                <div class="card-body">
                                    <h4 class="text-center">Ganti Password</h4>
                                    <hr>
                                    <form action="{{ route('profile-saya.changepassword') }}" method="post">
                                        @csrf
                                        {{-- @method("PATCH") --}}
                                        <div class="form-group row">
                                            <label for="current_password" class="col-sm-2 col-form-label">Password
                                                Sekarang</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    name="current_password" id="current_password"
                                                    placeholder="Current Password">
                                                @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="new_password" class="col-sm-2 col-form-label">Password baru</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    name="new_password" id="new_password" placeholder="New Password">
                                                @error('new_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="new_password_confirm" class="col-sm-2 col-form-label">Konfirmasi
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input type="password"
                                                    class="form-control @error('new_password_confirm') is-invalid @enderror"
                                                    name="new_password_confirm" id="new_password_confirm"
                                                    placeholder="Current Password">
                                                @error('new_password_confirm')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-action row">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Ganti Password</button>
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
