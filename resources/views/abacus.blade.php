@extends('layouts.main')
@section('content')

    @foreach($abakuses as $abakus)
        @php
            // Extract video ID from URL
            parse_str(parse_url($abakus->video, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? '';
            $embedUrl = $videoId ? 'https://www.youtube.com/embed/' . $videoId : '';
        @endphp
        <div>
            <h4 class="fw-bold py-3 mb-2"><span
                    class="text-muted fw-light">Darslar/</span> {{ $abakus->title }} {{$loop->index+1}}</h4>

            <div class="row mb-5">
                <div class="col-md-6 col-lg-8 mb-2 mx-auto my-auto">
                    <div class="card" style="display: flex; justify-content: center; align-items: center;">
                        <video width="400" controls>
                            <source src="{{ asset(asset('storage/' . $abakus->video)) }}"
                                    type="{{ Storage::mimeType('storage/videos' . $abakus->video) }}">
                            Your browser does not support HTML5 video.
                        </video>

                        <div class="card-body">
                            <h3 class="card-title fw-bold">{{ $abakus->title }}</h3>
                                    <p class="card-text mt-2">{{ $abakus->description }}</p>
                                    @if ($abakuses->currentPage() == $abakuses->lastPage())
                                        <a href="{{ route('client.test.show', ['name' => auth()->user()->name, 'id' => 1 ]) }}"
                                           class="btn btn-info mt-2">
                                            <i class="bx bxs-graduation me-2"></i> Testni boshlash
                                        </a>
                                    @endif

                            {{--                            <h5 class="card-title">{{ $abakus->name_video }}</h5>--}}
                        </div>
                    </div>
                </div>
            </div>

                <!-- <div class="col-md-6 col-lg-8 mx-auto my-auto">
                    <div class="card table-responsive">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body text-center">
                                    <h3 class="card-title fw-bold">{{ $abakus->title }}</h3>
                                    <p class="card-text mt-2">{{ $abakus->description }}</p>
                                    @if ($abakuses->currentPage() == $abakuses->lastPage())
                                        <a href="{{ route('client.test.show', ['name' => auth()->user()->name, 'id' => 1 ]) }}"
                                           class="btn btn-info mt-2">
                                            <i class="bx bxs-graduation me-2"></i> Testni boshlash
                                        </a>
                                    @endif

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Yuborish</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="d-flex justify-content-center">
                    {{ $abakuses->links('pagination::bootstrap-5') }}
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
