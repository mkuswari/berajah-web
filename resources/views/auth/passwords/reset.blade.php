@extends('layouts.auth')

@section('title')
    Reset Password
@endsection

@section('content')
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card border-0 shadow p-4">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 class="font-weight-bold">Reset Password</h4>
                                <hr>
                            </div>
                            <div class="login-form">
                                <form action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <label for="email">E-mail kamu</label>
                                        <input type="text" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $email ?? old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password Baru</label>
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Konfirmasi Passwod</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-action">
                                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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
