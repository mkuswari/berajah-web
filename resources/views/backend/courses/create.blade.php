@extends('layouts.backend')

@section('title')
    Tambah Kelas
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
                                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nama Kelas...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="thumbnail" class="col-sm-2 col-form-label">Thumbnail</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="thumbnail" id="thumbnail">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="trailer_url" class="col-sm-2 col-form-label">URL Trailer</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="trailer_url" id="trailer_url"
                                                    placeholder="Url Trailer">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description" class="col-sm-2 col-form-label">Deskripsi Kelas</label>
                                            <div class="col-sm-10">
                                                <textarea class="summernote-simple" name="description"
                                                    id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="level" class="col-sm-2 col-form-label">Level Kelas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="level" id="level">
                                                    <option value="" disabled selected>--Pilih Level--</option>
                                                    <option value="All Level">All Level</option>
                                                    <option value="Beginner">Beginner</option>
                                                    <option value="Intermediate">Intermediate</option>
                                                    <option value="Expert">Expert</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="type" class="col-sm-2 col-form-label">Tipe Kelas</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="type" id="type">
                                                    <option value="" disabled selected>--Pilih Tipe Kelas--</option>
                                                    <option value="Free">Free</option>
                                                    <option value="Premium">Premium</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="form-harga">
                                            <label for="price" class="col-sm-2 col-form-label">Harga Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="price" id="price"
                                                    placeholder="Harga kelas">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="prerequisite" class="col-sm-2 col-form-label">Prasyarat</label>
                                            <div class="col-sm-10">
                                                <textarea name="prerequisite" id="prerequisite" class="form-control"
                                                    rows="5" placeholder="Prasyarat Kelas"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="category_id" class="col-sm-2 col-form-label">Kategori</label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2" name="category_id" id="category_id">
                                                    <option value="" disabled selected>--Pilih Kategori--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                        <option value="{{ $instructor->id }}">{{ $instructor->name }}
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
                                                        value="Published" name="status" checked>
                                                    <label class="form-check-label" for="Published">Published</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="Archived"
                                                        value="Archived" name="status">
                                                    <label class="form-check-label" for="Archived">Archived</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Tambah User</button>
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
    <script>
        $(document).ready(function() {
            $('#form-harga').hide();
            $('#type').change(function() {
                if ($(this).val() == 'Free') {
                    $('#form-harga').hide();
                } else {
                    $('#form-harga').show();
                }

                $('#form-harga').val('');

            });
        });

    </script>
@endpush
