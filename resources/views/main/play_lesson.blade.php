@extends('layouts.lesson')

@section('title')
    {{ $course->name }}
@endsection

@section('content')
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-light py-3">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="{{ url('/') }}">Lumbung Kelas</a>
            <a class="btn btn-warning text-white rounded-0" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
            <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                @csrf
            </form>
        </div>
    </nav>
    {{-- end of navbar --}}

    {{-- panel--}}
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" style="height: 200px;"></div>
    <!-- end of jumbotron -->
    <section class="lesson-section" style="margin-top: -220px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-9">
                    @if (Route::is('play', [$course->slug]))
                        <h3 class="text-white font-weight-bold text-center">Trailer Kelas {{ $course->name }}</h3>
                    @else
                        <h3 class="text-white font-weight-bold text-center">{{ $content->name }}</h3>
                    @endif
                    <hr>
                    <div class="card shadow border-0">
                        @if (Route::is('play', [$course->slug]))
                            <div class="card-body">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $course->trailer_url }}?modestbranding=1&autoplay=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen style="width: 100%; height: 845px;">
                                </iframe>
                            </div>
                        @else
                            <div class="card-body">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $content->video_id }}?modestbranding=1&autoplay=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen style="width: 100%; height: 845px;">
                                </iframe>
                                <div class="instructor-note py-2">
                                    <h5>Catatan Instruktur :</h5>
                                    <p class="text-muted">
                                        @if ($content->instructor_note)
                                            {!! $content->instructor_note !!}
                                        @else
                                            Tidak ada catatan
                                            instruktur
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-3">
                    <h3 class="text-white font-weight-bold text-center">Materi</h3>
                    <hr>
                    <div class="card shadow border-0">
                        <div class="card-body">
                            @foreach ($contents as $content)
                                <a href="{{ route('play-lesson', [$course->slug, $content->id]) }}">
                                    <div class="panel bg-light rounded-lg shadow p-3 mb-2">

                                        {{ $loop->iteration }} |
                                        {{ $content->name }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{--@section('content')--}}
{{-- <div class="jumbotron jumbotron-fluid text-white">--}}
    {{-- <div class="container text-center">--}}

        {{--
    </div>--}}
    {{-- </div>--}}
{{-- <section class="lesson-area py-5" style="margin-top: -110px;">
    --}}
    {{-- <div class="container">--}}
        {{-- <div class="row">--}}
            {{-- <div class="col-sm-12">--}}
                {{-- <div class="card border-0 shadow">--}}

                    {{--
                </div>--}}
                {{-- </div>--}}
            {{-- </div>--}}
        {{-- </div>--}}
    {{-- </section>--}}

{{-- <section class="course-contents pb-5">--}}
    {{-- <div class="container">--}}
        {{-- <div class="row">--}}
            {{-- <div class="col-sm-6 mx-auto">--}}
                {{-- <h4 class="font-weight-bold text-center">Materi Kelas</h4>
                --}}
                {{--
                <hr>--}}

                {{--
            </div>--}}
            {{-- </div>--}}
        {{-- </div>--}}
    {{-- </section>--}}
{{--@endsection--}}
