@extends('layouts.auth')

@section('title')
    Register
@endsection

@section('content')
    <section class="register-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card border-0 shadow p-4">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="font-weight-bold">Register</h4>
                                <hr>
                            </div>
                            <div class="login-form">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail kamu</label>
                                        <input type="text" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password kamu</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-action">
                                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                                        <a href="{{ url('auth/google') }}" class="btn btn-danger btn-block">Daftar dengan
                                            Google</a>
                                    </div>
                                    <div class="text-center mt-3">
                                        <a href="{{ route('login') }}">Login Disini</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
