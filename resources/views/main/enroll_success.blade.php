<!doctype html>
<html lang="en">

<head>
    @include('layouts.include.global._head')
</head>

<body>

    <div class="container" style="margin-top: 100px;">
        <div class="row mt-5">
            <div class="col-5 mx-auto text-center">
                <h3 class="font-weight-bold mb-4">Yeayy!! Berhasil</h3>
                <img src="{{ asset('global/svg/done.svg') }}" width="100%">
                <p class="text-muted mt-3">Kamu berhasil terdaftar di kelas ini.</p>
                <div class="row">
                    <div class="col-sm-6 mx-auto">
                        <a href="{{ route('home') }}" class="btn btn-success btn-block rounded-0">Kelas saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.include.global._scripts')
</body>

</html>
