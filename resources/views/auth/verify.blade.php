@extends('layouts.global')

@section('title')
    Verifikasi E-mail kamu terlebih dahulu
@endsection

@section('content')
    <div class="container py-5" style="margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 mx-auto text-center">
                @if (session('resent'))
                    <div class="alert alert-success">
                        Berhasil mengirim email verifikasi baru
                    </div>
                @endif
                <div class="head mb-3">
                    <p class="text-muted">
                    <h5 class="font-weight-bold">Kami telah mengirimkan email ke email kamu</h5>
                    Verifikasi email kamu terlebih dahulu untuk melanjutkan
                    </p>
                </div>
                <img src="{{ asset('global/images/svg/verify-email.svg') }}" width="100%">
                <div class="foot mt-3">
                    <p class="text-muted">Tidak menerima email?</p>
                    <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-0">Kirimi Ulang E-mail</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
