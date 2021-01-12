@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card border-0 shadow p-4">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="font-weight-bold">Selamat datang</h4>
                                <span class="text-muted">Silahkan login untuk mulai belajar.</span>
                                <hr>
                            </div>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="login-form">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
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
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember_me"
                                            name="remember_me">
                                        <label class="custom-control-label" for="remember_me">Remember Me</label>
                                    </div>
                                    <hr>
                                    <div class="form-action">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        <a href="" class="btn btn-danger btn-block">Login With Google</a>
                                    </div>
                                    <div class="text-center mt-3">
                                        <a href="{{ route('register') }}">Daftar Akun Baru</a>
                                        <br>
                                        <a href="{{ route('password.request') }}">Lupa Password?</a>
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
