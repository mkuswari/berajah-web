@extends('layouts.backend')

@section('title')
    Detail Kelas
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Kelas</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <b>Thumbnail</b>
                            <img src="{{ asset('storage/' . $course->thumbnail) }}" class="rounded"
                                style="width: 100%; height: 280px; object-fit: cover; object-position: center;">
                            <hr>
                            <b>Nama Kelas</b>
                            <p>{{ $course->name }}</p>
                            <b>Slug</b>
                            <p>{{ $course->slug }}</p>
                            <b>Deskripsi Kelas</b>
                            <p>{{ $course->description }}</p>
                            <b>Level</b>
                            <p>{{ $course->level }}</p>
                            <b>Tipe Kelas</b>
                            <p>{{ $course->type }}</p>
                            <b>Harga Kelas</b>
                            <p>
                                @if ($course->type == 'Premium')
                                    Rp. {{ number_format($course->price) }}
                                @else
                                    Gratis.
                                @endif
                            </p>
                            <b>Prasyarat</b>
                            <p>
                                @if ($course->prerequisite)
                                    {{ $course->prerequisite }}
                                @else
                                    Tidak ada prasyarat khusus untuk kelas ini.
                                @endif
                            </p>
                            <b>Kategori</b>
                            <p>{{ $course->categories->name }}</p>
                            <b>Instruktur</b>
                            <p>{{ $course->instructors->name }}</p>
                            <b>Status</b>
                            <p>
                                @if ($course->status == 'Published')
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-warning">Archived</span>
                                @endif
                            </p>
                            <b>Dibuat pada</b>
                            <p>{{ date('d F Y', strtotime($course->created_at)) }}</p>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="header d-flex justify-content-between">
                                        <h4>Silabus Kelas</h4>
                                        <a href="" class="btn btn-primary">Tambah Silabus</a>
                                    </div>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th width="15">No.</th>
                                                    <th width="300">Nama Section</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Level</th>
                                                    <th>Harga</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="{{ asset('backend/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/page/modules-datatables.js') }}"></script>
@endpush
