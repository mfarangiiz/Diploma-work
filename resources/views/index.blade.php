@extends('layouts.main')
@section('content')

    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 text-lg-start text-center order-lg-1">
                    <h1 class="hero-title">Mental Arifmetika bilan Aqlni Charxlang!</h1>
                    <p class="hero-text">Biz bilan bolalaringiz aqliy hisobni tez va aniq bajarishni o‘rganadilar.</p>
                    <button class="hero-btn" data-bs-toggle="modal" data-bs-target="#heroVideoModal">
                        Ko‘rish
                    </button>
                </div>

                <div class="col-lg-6 order-lg-2">
                    <img src="{{asset('recourse/img/kids2.png')}}" class="img-fluid" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>





    <section class="about">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 about-img order-lg-1">
                    <img src="{{asset('recourse/img/abakus.png')}}" class="img-fluid" alt="About Image">
                </div>

                <div class="col-lg-6 about-text order-lg-2">
                    <h2 class="about-title">Biz Haqimizda</h2>
                    <p class="about-description">
                    {{$home->title}}
                </div>
            </div>
        </div>
    </section>


    <section class="cards-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <h3 class="card-title">Aqliy rivojlanish</h3>
                        <p class="card-text">Mental arifmetika bolalarning tafakkur va mantiqiy fikrlash qobiliyatini
                            o'stiradi, rivojlantiradi.</p>
                        <button class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#videoModal1"
                                data-video="videos/aqliy_rivojlanish.mp4">
                            Ko‘rish
                        </button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h3 class="card-title">O'sish va taraqqiyot</h3>
                        <p class="card-text">Doimiy mashg‘ulotlar bolalarda intizom va o‘zini o‘zi rivojlantirish
                            ko‘nikmasini shakllantiradi.</p>
                        <button class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#videoModal2"
                                data-video="videos/osish_taraqqiyot.mp4">
                            Ko‘rish
                        </button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h3 class="card-title">O‘zlashtirish</h3>
                        <p class="card-text">Mental arifmetika o‘quvchilarni mukofot va sertifikatlar bilan
                            rag‘batlantirishga yordam beradi.</p>
                        <button class="btn custom-btn" data-bs-toggle="modal" data-bs-target="#videoModal3"
                                data-video="videos/ozlashtirish.mp4">
                            Ko‘rish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="videoModal1" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">📺 Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card" style="display: flex; justify-content: center; align-items: center;">

                    {{--                    //iframe--}}


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="videoModal2" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">📺 Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card" style="display: flex; justify-content: center; align-items: center;">
                    {{--                    //iframe--}}

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoModal3" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">📺 Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card" style="display: flex; justify-content: center; align-items: center;">
                    {{--                    //iframe--}}

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="heroVideoModal" tabindex="-1" aria-labelledby="heroVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="heroVideoModalLabel">📺 Mental Arifmetika</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="card" style="display: flex; justify-content: center; align-items: center;">

                    {{--                    //iframe--}}

                </div>
            </div>
        </div>
    </div>

    <section class="info-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6">
                    <div class="info-content">
                        <h2 class="info-title">Nima uchun mental arifmetika ?</h2>
                        <p class="info-text">Mental arifmetika bolalar fikrlash qobiliyatini rivojlantirishga yordam
                            beradi.
                            Mental arifmetika bolalar fikrlash qobiliyatini rivojlantirishga yordam beradi.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="img/boy-holding-stack-books.png" alt="Info Image" class="info-img">
                </div>
            </div>
        </div>
    </section>

@endsection
