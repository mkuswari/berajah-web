@extends('layouts.backend')

@section('title')
    Edit User
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit User</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $category->image) }}" class="card-img"
                                            style="width: 100%; height: 205px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $category->name }}</h5>
                                            <p class="card-text">{{ $category->slug }}</p>
                                            <p class="card-text"><small class="text-muted">Dibuat Pada :
                                                    {{ date('d F Y', strtotime($category->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('categories.update', [$category->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama Kategori</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" id="name" placeholder="Nama Kategori..."
                                                    value="{{ $category->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Image Kategori</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="image" id="image">
                                                <small class="text-muted">Kosongkan jika tidak ingin merubah</small>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update Kategori</button>
                                                <a href="{{ route('categories.index') }}"
                                                    class="btn btn-warning">Batalkan</a>
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
