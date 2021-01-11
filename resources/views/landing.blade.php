@extends('layouts.global')

@section('title')
    Belajar Online mudah dan Gratis
@endsection

@section('content')
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-white">
            <div class="row">
                <div class="col-sm-6 align-self-center">
                    <h1>Belajar bersama kami.</h1>
                    <p>Lumbung Ilmu merupakan Platform Belajar Online Lokal, yang membantu kamu mengasah dan memperoleh
                        ilmu dengan beragam kelas gratis.</p>
                    <hr>
                    <a href="" class="btn btn-warning btn-lg text-white">Mulai Belajar</a>
                </div>
                <div class="col-sm-6">
                    <img src="{{ asset('global/images/svg/developer_activity.svg') }}" width="100%">
                </div>
            </div>
        </div>
    </div>
    <!-- end of jumbotron -->

    <!-- our-benefit -->
    <section class="benefit-us py-5">
        <div class="container text-center">
            <h2 class="font-weight-bold">Kenapa belajar di Lumbung Ilmu?</h2>
            <div class="row mt-5">
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/1.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">100% Semua Kelas Online</h4>
                        <p class="text-muted">Kamu bisa belajar kapanpun dan dimanapun sesuai keinginan kamu.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/2.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">Akses Beragam kelas Online</h4>
                        <p class="text-muted">Kamu bisa Mengakses beragam kelas yang kami punya secara mudah.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/3.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">Pengajar Berpengalaman</h4>
                        <p class="text-muted">Kelas kami diajar oleh pengajar yang berpengalaman dibidangnya.</p>
                    </div>
                </div>
                <div class="col-sm-3">
                    <img src="{{ asset('global/images/png/4.png') }}">
                    <div class="title mt-4">
                        <h4 class="font-weight-bold">Diskusi dan Kolaborasi</h4>
                        <p class="text-muted">Kamu bisa memperluas jaringan dengan memiliki forum komunitas untuk
                            berdiskusi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of our benefit -->

    <!-- latest course -->
    <section class="lates-course py-5 bg-light">
        <div class="container">
            <h3 class="font-weight-bold text-center">Kelas Terbaru kami</h3>
            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="card shadow-sm border-0 mt-3">
                        <img src="global/images/courses/laravel.jpg" class="course-thumbnail" width="100%">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="">Belajar dasar-dasar laravel dengan mudah</a>
                            </h5>
                            <span class="badge badge-success badge-pill px-3">Premium</span>
                        </div>
                        <div class="card-footer border-0 bg-white">
                            <a href="" class="btn btn-primary btn-block rounded-0">Pelajari Kelas ini</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow-sm border-0 mt-3">
                        <img src="global/images/courses/codeigniter.jpg" class="course-thumbnail" width="100%">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="">Belajar dasar-dasar laravel dengan mudah</a>
                            </h5>
                            <span class="badge badge-success badge-pill px-3">Premium</span>
                        </div>
                        <div class="card-footer border-0 bg-white">
                            <a href="" class="btn btn-primary btn-block rounded-0">Pelajari Kelas ini</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow-sm border-0 mt-3">
                        <img src="global/images/courses/nodejs.png" class="course-thumbnail" width="100%">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="">Belajar dasar-dasar laravel dengan mudah</a>
                            </h5>
                            <span class="badge badge-success badge-pill px-3">Premium</span>
                        </div>
                        <div class="card-footer border-0 bg-white">
                            <a href="" class="btn btn-primary btn-block rounded-0">Pelajari Kelas ini</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card shadow-sm border-0 mt-3">
                        <img src="global/images/courses/laravel.jpg" class="course-thumbnail" width="100%">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="">Belajar dasar-dasar laravel dengan mudah</a>
                            </h5>
                            <span class="badge badge-success badge-pill px-3">Premium</span>
                        </div>
                        <div class="card-footer border-0 bg-white">
                            <a href="" class="btn btn-primary btn-block rounded-0">Pelajari Kelas ini</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="">Lihat Semua Kelas</a>
            </div>
        </div>
    </section>
    <!-- end of latest course -->

    <!-- blogs -->
    <section class="lates-blogs py-5">
        <div class="container">
            <h3 class="font-weight-bold text-center">Artikel Terbaru</h3>
            <div class="row mt-3">
                <div class="col-sm-6 mt-3">
                    <div class="card mb-3 border-0 shadow-sm" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="global/images/courses/codeigniter.jpg" class="card-img blogs-thumbnail" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                                    <p class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                                        quae illum porro vel magni consequatur voluptates qui libero. Totam asperiores
                                        ducimus voluptas sunt odit!....</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card mb-3 border-0 shadow-sm" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="global/images/courses/codeigniter.jpg" class="card-img blogs-thumbnail" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                                    <p class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                                        quae illum porro vel magni consequatur voluptates qui libero. Totam asperiores
                                        ducimus voluptas sunt odit!....</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card mb-3 border-0 shadow-sm" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="global/images/courses/codeigniter.jpg" class="card-img blogs-thumbnail" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                                    <p class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                                        quae illum porro vel magni consequatur voluptates qui libero. Totam asperiores
                                        ducimus voluptas sunt odit!....</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="card mb-3 border-0 shadow-sm" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="global/images/courses/codeigniter.jpg" class="card-img blogs-thumbnail" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                                    <p class="small">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis
                                        quae illum porro vel magni consequatur voluptates qui libero. Totam asperiores
                                        ducimus voluptas sunt odit!....</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="">Lihat semua Artikel</a>
            </div>
        </div>
    </section>
    <!-- end of blogs -->
@endsection
