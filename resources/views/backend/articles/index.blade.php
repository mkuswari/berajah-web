@extends('layouts.backend')

@section('title')
    Kelola Artikel
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
                <h1>Kelola Artikel</h1>
                <a href="{{ route('articles.create') }}" class="btn btn-primary">Tambah Artikel Baru</a>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Semua</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Draft</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
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
                                            <th>Judul</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articles as $article)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $article->title }}
                                                    <div class="table-links">
                                                        <a href="{{ route('articles.show', [$article->id]) }}">Lihat</a>
                                                        <div class="bullet"></div>
                                                        <a href="{{ route('articles.edit', [$article->id]) }}">Edit</a>
                                                        <div class="bullet"></div>
                                                        <form action="{{ route('articles.destroy', [$article->id]) }}"
                                                            class="d-inline" method="POST"
                                                            onclick="return confirm('Hapus Artikel ini?')">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button type="submit"
                                                                class="btn btn-link text-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>{{ $article->categories->name }}</td>
                                                <td>{{ $article->author }}</td>
                                                <td>{{ date('d F Y', strtotime($article->created_at)) }}</td>
                                                <td>
                                                    @if ($article->status == 'Published')
                                                        <span class="badge badge-success">Published</span>
                                                    @else
                                                        <span class="badge badge-warning">Draft</span>
                                                    @endif
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
