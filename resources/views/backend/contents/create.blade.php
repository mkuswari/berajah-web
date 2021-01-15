@extends('layouts.backend')

@section('title')
    Tambah Materi
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>@yield('title')</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8 mx-auto">
                                    <form action="{{ route('courses.store-content') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Judul Materi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Judul Materi...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="video_id" class="col-sm-2 col-form-label">Url Video</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="video_id" id="video_id"
                                                    placeholder="Url Video">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="instructor_note" class="col-sm-2 col-form-label">Catatan
                                                Instruktur</label>
                                            <div class="col-sm-10">
                                                <textarea class="summernote-simple" name="instructor_note"
                                                    id="instructor_note"></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Tambah Materi</button>
                                                <button type="reset" class="btn btn-warning">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('backend/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endpush
