@extends('layouts.auth')

@section('title')
    Permintaan Reset Password
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
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="login-form">
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">E-mail kamu</label>
                                        <input type="text" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-action">
                                        <button type="submit" class="btn btn-primary btn-block">Kirim Reset Password
                                            Link</button>
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
