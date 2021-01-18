@extends('layouts.backend')

@section('title')
    Kelola Artikel
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>@yield('title')</h1>
                <a href="" class="btn btn-primary">Artikel Baru</a>
            </div>
        </section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="carad-body">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad iusto vitae, neque distinctio ut
                        adipisci, praesentium blanditiis nulla at enim hic beatae veniam consequuntur sed vel soluta eveniet
                        ipsam tempore!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
