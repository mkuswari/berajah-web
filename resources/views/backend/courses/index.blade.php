@extends('layouts.backend')

@section('title')
    Kelola Kelas
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>Kelola Kelas</h1>
                <a href="{{ route('courses.create') }}" class="btn btn-primary">Tambah Kelas</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- message --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- end of message --}}
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th width="15">No.</th>
                                            <th width="300">Thumbnail</th>
                                            <th>Nama Kelas</th>
                                            <th>Level</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img class="rounded" width="100%"
                                                        src="{{ asset('storage/' . $course->thumbnail) }}"
                                                        style="height: 150px; object-fit: cover; object-position: center;">
                                                </td>
                                                <td>{{ $course->name }}</td>
                                                <td>{{ $course->level }}</td>
                                                <td>
                                                    @if ($course->type == 'Premium')
                                                        Rp. {{ number_format($course->price) }} ,-
                                                    @else
                                                        Gratis
                                                    @endif
                                                </td>
                                                <td>{{ $course->status }}</td>
                                                <td>
                                                    <a href="{{ route('courses.show', [$course->id]) }}"
                                                        class="btn btn-info btn-icon"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('courses.edit', [$course->id]) }}"
                                                        class="btn btn-warning btn-icon"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <form action="{{ route('courses.destroy', [$course->id]) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Hapus kategori ini dari sistem?')"
                                                        class="d-inline">
                                                        {{ csrf_field() }}
                                                        @method("DELETE")
                                                        <button type="submit" class="btn btn-danger btn-icon"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{ asset('backend/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/js/page/modules-datatables.js') }}"></script>
@endpush
