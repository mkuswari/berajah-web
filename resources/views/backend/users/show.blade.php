@extends('layouts.backend')

@section('title')
    Detail User
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail User</h1>
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
                            <b>Nama</b>
                            <p>{{ $user->name }}</p>
                            <b>E-mail</b>
                            <p>{{ $user->email }}</p>
                            <b>Phone</b>
                            <p>{{ $user->phone }}</p>
                            <b>Hak Akses</b>
                            <p>
                                @foreach (json_decode($user->roles) as $role)
                                    @if ($role == 'Admin')
                                        <span class="badge badge-success">{{ $role }}</span>
                                    @elseif($role == "Staff")
                                        <span class="badge badge-info">{{ $role }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ $role }}</span>
                                    @endif
                                @endforeach
                            </p>
                            <b>Bergabung Pada</b>
                            <p>{{ date('d F Y', strtotime($user->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
