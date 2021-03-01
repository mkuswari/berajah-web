@extends('layouts.backend')

@section('title')
    Kelola Users
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
                <h1>Kelola Users</h1>
                <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
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
                                            <th width="10">No.</th>
                                            <th width="64">Avatar</th>
                                            <th>Nama</th>
                                            <th>E-mail</th>
                                            <th>No. Hp</th>
                                            <th>Hak Akses</th>
                                            <th width="120">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($user->avatar)
                                                        <img alt="image"
                                                            src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                                            class="rounded-circle mr-1"
                                                            style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                                                    @else
                                                        <img alt="image"
                                                            src="https://ui-avatars.com/api/?name={{ $user->name }}&background=random&color=fff"
                                                            class="rounded-circle mr-1"
                                                            style="width: 50px; height: 50px; object-fit: cover; object-position: center;">
                                                    @endif
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    @foreach (json_decode($user->roles) as $role)
                                                        @if ($role == 'Admin')
                                                            <span class="badge badge-success">{{ $role }}</span>
                                                        @elseif($role == "Staff")
                                                            <span class="badge badge-info">{{ $role }}</span>
                                                        @else
                                                            <span class="badge badge-warning">{{ $role }}</span>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a href="{{ route('users.show', [$user->id]) }}"
                                                        class="btn btn-info btn-icon"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('users.edit', [$user->id]) }}"
                                                        class="btn btn-warning btn-icon"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <form action="{{ route('users.destroy', [$user->id]) }}"
                                                        method="post" class="d-inline"
                                                        onsubmit="return confirm('Hapus User ini?')">
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
