@extends('layouts.backend')

@section('title')
    Edit Kelas
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/modules/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Kelas</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $course->thumbnail) }}" class="card-img"
                                            style="width: 100%; height: 205px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $course->name }}</h5>
                                            <p class="card-text">{{ $course->slug }}</p>
                                            <p class="card-text"><small class="text-muted">Dibuat Pada :
                                                    {{ date('d F Y', strtotime($course->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('courses.update', [$course->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nama Kelas..." value="{{ $course->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                                <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="trailer_url" class="col-sm-2 col-form-label">URL Trailer</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="trailer_url" id="trailer_url"
                                                    placeholder="Url Trailer" value="{{ $course->trailer_url }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description" class="col-sm-2 col-form-label">Deskripsi Kelas</label>
                                            <div class="col-sm-10">
                                                <textarea class="summernote-simple" name="description"
                                                    id="description">{!!  $course->description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="level" class="col-sm-2 col-form-label">Level Kelas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="level" id="level">
                                                    <option value="" disabled selected>--Pilih Level--</option>
                                                    <option value="All Level"
                                                        {{ $course->level == 'All Level' ? 'selected' : '' }}>All Level
                                                    </option>
                                                    <option value="Beginner"
                                                        {{ $course->level == 'Beginner' ? 'selected' : '' }}>Beginner
                                                    </option>
                                                    <option value="Intermediate"
                                                        {{ $course->level == 'Intermediate' ? 'selected' : '' }}>
                                                        Intermediate</option>
                                                    <option value="Expert"
                                                        {{ $course->level == 'Expert' ? 'selected' : '' }}>Expert</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="type" class="col-sm-2 col-form-label">Tipe Kelas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="type" id="type">
                                                    <option value="" disabled selected>--Pilih Tipe Kelas--</option>
                                                    <option value="Free" {{ $course->type == 'Free' ? 'selected' : '' }}>
                                                        Free</option>
                                                    <option value="Premium"
                                                        {{ $course->type == 'Premium' ? 'selected' : '' }}>Premium</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="price" class="col-sm-2 col-form-label">Harga Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="price" id="price"
                                                    placeholder="Harga kelas" value="{{ $course->price }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="prerequisite" class="col-sm-2 col-form-label">Prasyarat</label>
                                            <div class="col-sm-10">
                                                <textarea name="prerequisite" id="prerequisite" class="form-control"
                                                    rows="5"
                                                    placeholder="Prasyarat Kelas">{{ $course->prereuisite }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="category_id" id="category_id">
                                                    <option value="" disabled selected>--Pilih Kategori--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $category->id == $course->category_id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="instructor_id" class="col-sm-2 col-form-label">Instruktur</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="instructor_id"
                                                    id="instructor_id">
                                                    <option value="" disabled selected>--Pilih Instruktur--</option>
                                                    @foreach ($instructors as $instructor)
                                                        <option value="{{ $category->id }}"
                                                            {{ $instructor->id == $course->instructor_id ? 'selected' : '' }}>
                                                            {{ $instructor->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="roles" class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="Published"
                                                        value="Published" name="status"
                                                        {{ $course->status == 'Published' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Published">Published</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="Archived"
                                                        value="Archived" name="status"
                                                        {{ $course->status == 'Archived' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Archived">Archived</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update Kelas</button>
                                                <a href="{{ route('users.index') }}" class="btn btn-warning">Batalkan</a>
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
