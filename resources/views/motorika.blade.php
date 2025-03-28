@extends('layouts.main')
@section('content')

    @foreach($motorikas as $motorika)
        <div>

            <h4 class="fw-bold py-3 mb-2"><span
                    class="text-muted fw-light">Darslar/</span> {{ $motorika->title }} {{$loop->index+1}}</h4>

            <div class="row mb-5">
                <div class="col-md-6 col-lg-8 mb-2 mx-auto my-auto">
                    <div class="card" style="display: flex; justify-content: center; align-items: center;">
                        <iframe width="560" height="315" src="{{ $motorika->video }}" frameborder="0"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6 col-lg-8 mx-auto my-auto">
                    <div class="card table-responsive">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body text-center">
                                    <h3 class="card-title fw-bold">{{ $motorika->title }}</h3>
                                    <p class="card-text mt-2">{{ $motorika->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row mb-5">
                <div class="d-flex justify-content-center">
                    {{ $motorikas->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    @endforeach

@endsection
<style>
    /* Стиль для кнопок навигации */
    .btn-navigation {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: #007bff; /* Основной цвет */
        color: white;
        border: none;
        border-radius: 50%; /* Закругленные углы */
        width: 40px;
        height: 40px;
        font-size: 20px; /* Размер символа */
        transition: background-color 0.3s, transform 0.3s; /* Анимация при наведении */
    }

    /* Кнопка "назад" слева */
    .btn-prev {
        left: 10px; /* Положение по горизонтали */
    }

    /* Кнопка "вперед" справа */
    .btn-next {
        right: 10px; /* Положение по горизонтали */
    }

    .btn-navigation:hover {
        background: white;
        transform: translateY(-50%) scale(1.1);
        transition: background-color 0.3s, transform 0.3s;
    }
</style>
