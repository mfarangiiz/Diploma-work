@extends('layouts.main')
@section('content')

    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 text-lg-start text-center order-lg-1">
                    <h1 class="hero-title">Nega aynan biz ?</h1>
                    <p class="hero-text">MenKids bolalar uchun mental arifmetika o‘rgatish platformasi! Bizning
                        interaktiv darslarimiz va qiziqarli mashg‘ulotlarimiz yordamida farzandingiz aqliy hisobni tez
                        va aniq bajarishni o‘rganadi!</p>
                </div>

                <div class="col-lg-6 order-lg-2">
                    <img src="{{ asset('storage/about/graduation.png')}}" class="img-fluid" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>

    <section class="about-platform py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('storage/about/komp.png')}}"  class="img-fluid about-img" alt="Mental arifmetika platformasi">
                </div>

                <div class="col-lg-6">
                    <h2 class="section-title">Interaktiv darslar</h2>
                    <p class="section-text">
                        Bizning platformamiz interaktiv darslar orqali o‘quvchilarga qiziqarli va samarali ta’lim
                        muhitini yaratadi.
                        Har bir dars jonli vizual materiallar, amaliy mashg‘ulotlar va o‘yin elementlari bilan
                        boyitilgan.
                        O‘quvchilar o‘z bilimlarini mustahkamlash uchun real vaqtda mashqlar bajara oladilar. </p>
                </div>
            </div>
        </div>
    </section>

    <section class="practical-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-center">
                    <h2 class="section-title">Amaliy Mashg‘ulotlar</h2>
                    <p class="section-text">
                        Bizning platformamiz darslarni real amaliy mashg‘ulotlar bilan uyg‘unlashtirgan holda taqdim
                        etadi.
                        O‘quvchilar nazariyani o‘rganish barobarida interaktiv topshiriqlarni ham bajara oladilar.
                        Har bir mashg‘ulot bolalar uchun qiziqarli va tushunarli tarzda ishlab chiqilgan.
                    </p>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('storage/about/abacus.png')}}"  alt="Amaliy Darslar" class="practical-img">
                </div>
            </div>
        </div>
    </section>

@endsection
