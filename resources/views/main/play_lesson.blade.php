@extends('layouts.global')

@section('title')
    {{ $course->name }}
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid text-white">
        <div class="container text-center">
            @if (Route::is('play', [$course->slug]))
                <h3>Trailer Kelas</h3>
            @else
                <h3>{{ $content->name }}</h3>
            @endif
        </div>
    </div>
    <section class="lesson-area py-5" style="margin-top: -110px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card border-0 shadow">
                        @if (Route::is('play', [$course->slug]))
                            <div class="card-body">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $course->trailer_url }}?modestbranding=1&autoplay=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen style="width: 100%; height: 664px;">
                                </iframe>
                            </div>
                        @else
                            <div class="card-body">
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $content->video_id }}?modestbranding=1&autoplay=1"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen style="width: 100%; height: 664px;">
                                </iframe>
                                <div class="instructor-note py-2">
                                    <h5>Catatan Instruktur :</h5>
                                    <p class="text-muted">
                                        @if ($content->instructor_note)
                                            {!! $content->instructor_note !!}
                                        @else
                                            Tidak ada catatan instruktur
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="course-contents pb-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <h4 class="font-weight-bold text-center">Materi Kelas</h4>
                    <hr>
                    @foreach ($contents as $content)
                        <a href="{{ route('play-lesson', [$course->slug, $content->id]) }}">
                            <div class="panel bg-light rounde-lg shadow-lg p-3 mb-2">
                                {{ $loop->iteration }} | {{ $content->name }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
