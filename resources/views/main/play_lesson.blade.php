@extends('layouts.global')

@section('title')
{{ $course->name }}
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid text-white">
    <div class="container text-center">
        <h3>Judul Materi sedang diputar</h3>
    </div>
</div>
<section class="lesson-area py-5" style="margin-top: -110px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card border-0 shadow">
                        <div class="card-body">
                            <iframe src="https://www.youtube.com/embed/{{ $course->trailer_url }}?modestbranding=1&autoplay=1"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen style="width: 100%; height: 664px;">
                            </iframe>
                            <div class="instructor-note py-2">
                                <h5>Catatan Instruktur :</h5>
                                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus sapiente nesciunt odit accusantium voluptates voluptatum, veritatis sed amet hic quidem recusandae reprehenderit rerum obcaecati laudantium autem error nam officiis quia.</p>
                            </div>
                        </div>
                        </div>
            </div>
        </div>
    </div>
</section>

<section class="course-contents pb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <h4 class="font-weight-bold">Materi Kelas</h4>
                <hr>
                <ul class="list-group">
                    @foreach ($contents as $content)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $loop->iteration }}. {{ $content->name }}
                        <a href="" class="badge badge-primary badge-pill px-3">Play</a>
                    </li>
                    @endforeach
                  </ul>
            </div>
        </div>
    </div>
</section>
@endsection
