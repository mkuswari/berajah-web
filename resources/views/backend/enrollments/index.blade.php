@extends('layouts.backend')

@section('title')
    Kelola Enroll Kelas
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
                <h1>Kelola Enroll Kelas</h1>
                <a href="{{ route('enrolls.create') }}" class="btn btn-primary">Tambah Enroll Kelas</a>
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
                                            <th width="300">Nama Member</th>
                                            <th>Nama Kelas</th>
                                            <th>Status</th>
                                            <th>Tanggal Enroll</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enrollments as $enrollment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $enrollment->users['name'] }}</td>
                                                <td>{{ $enrollment->courses['name'] }}</td>
                                                <td>
                                                    @if ($enrollment->status == 'Selesai')
                                                        <span class="badge badge-success">Selesai</span>
                                                    @else
                                                        <span class="badge badge-warning">On Progress</span>
                                                    @endif
                                                </td>
                                                <td>{{ date('d F Y', strtotime($enrollment->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ route('enrolls.edit', [$enrollment->id]) }}"
                                                        class="btn btn-warning btn-icon">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('enrolls.destroy', [$enrollment->id]) }}"
                                                        method="POST" class="d-inline"
                                                        onclick="return confirm('Hapus Enroll kelas ini?')">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button type="submit" class="btn btn-danger btn-icon">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
