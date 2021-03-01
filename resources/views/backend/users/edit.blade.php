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
                                        @if ($user->avatar)
                                            <img src="{{ asset('images/avatars/users/' . $user->avatar) }}"
                                                class="card-img" style="width: 100%; height: 205px;">
                                        @else
                                            <img src="https://ui-avatars.com/api/?name={{ $user->name }}&background=random&color=fff"
                                                class="card-img" style="width: 100%; height: 205px;">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $user->name }}</h5>
                                            <p class="card-text">{{ $user->email }}</p>
                                            <p class="card-text">{{ $user->phone }}</p>
                                            <p class="card-text"><small class="text-muted">Member Since :
                                                    {{ date('d F Y', strtotime($user->created_at)) }}</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('users.update', [$user->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('name')
                                                                                                                                                    is-invalid
                                                                                                @enderror" name="name"
                                                    id="name" placeholder="Nama Lengkap..." value="{{ $user->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control @error('email')
                                                                                                                                                    is-invalid
                                                                                                @enderror" name="email"
                                                    id="email" placeholder="E-mail..." value="{{ $user->email }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="phone" id="phone"
                                                    placeholder="Phone number..." value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="roles" class="col-sm-2 col-form-label">Hak Akses</label>
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Admin" value="Admin"
                                                        name="roles[]"
                                                        {{ in_array('Admin', json_decode($user->roles)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Admin">Administrator</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Staff" value="Staff"
                                                        name="roles[]"
                                                        {{ in_array('Staff', json_decode($user->roles)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Staff">Staff</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="Member"
                                                        value="Member" name="roles[]"
                                                        {{ in_array('Member', json_decode($user->roles)) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="Member">Member</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="avatar" id="avatar">
                                                <small class="text-muted">Kosongkan jika tidak ingin merubah
                                                    avatar</small>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update User</button>
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
