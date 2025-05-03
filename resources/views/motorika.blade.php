@extends('layouts.main')
@section('content')

    @foreach($motorikas as $motorika)
        <div>

            <h4 class="fw-bold py-3 mb-2"><span
                    class="text-muted fw-light"></span></h4>

            <div class="row mb-5">
                <div class="col-md-6 col-lg-8 mb-2 mx-auto my-auto">
                    <div class="card" style="display: flex; justify-content: center; align-items: center;">
                        <video width="400" controls>
                            <source src="{{ asset(asset('storage/' . $motorika->video)) }}"
                                    type="{{ Storage::mimeType('storage/videos' . $motorika->video) }}">
                            Your browser does not support HTML5 video.
                        </video>
                        <div class="card-body text-center">
                                    <h3 class="card-title fw-bold">{{ $motorika->title }}</h3>
                                    <p class="card-text mt-2">{{ $motorika->description }}</p>
                                    @if ($motorikas->currentPage() == $motorikas->lastPage())
                                        <a href="{{ route('client.test.show', ['name' => auth()->user()->name, 'id' => 2 ]) }}"
                                           class="btn btn-info mt-2">
                                            <i class="bx bxs-graduation me-2"></i> Testni boshlash
                                        </a>
                                    @endif

                                </div>
                    </div>
                </div>
            </div>

<!-- 
            <div class="row mb-5">
                <div class="col-md-6 col-lg-8 mx-auto my-auto">
                    <div class="card table-responsive">
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body text-center">
                                    <h3 class="card-title fw-bold">{{ $motorika->title }}</h3>
                                    <p class="card-text mt-2">{{ $motorika->description }}</p>
                                    @if ($motorikas->currentPage() == $motorikas->lastPage())
                                        <a href="{{ route('client.test.show', ['name' => auth()->user()->name, 'id' => 2 ]) }}"
                                           class="btn btn-info mt-2">
                                            <i class="bx bxs-graduation me-2"></i> Testni boshlash
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Comments Section -->
            <div class="col-md-6 col-lg-8 mx-auto">
                <div class="card mt-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Fikrlar</h5>

                        <!-- Display existing comments -->
                        @foreach($$motorika->comments as $comment)
                            <div class="mb-2 border-bottom pb-2">
                                <strong>{{ $comment->user->name }}</strong>
                                <span class="text-muted small">· {{ $comment->created_at->diffForHumans() }}</span>
                                <p class="mb-0">{{ $comment->taxt }}</p>
                            </div>
                        @endforeach

                        <!-- Add new comment -->
                        <form action="{{ route('comments.store') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="video_id" value="{{ $$motorika->id }}">
                            <div class="form-floating mb-2">
                                <textarea class="form-control" placeholder="Fikringizni yozing..." name="content" style="height: 100px;" required></textarea>
                                <label>Kommentariya</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Yuborish</button>
                        </form>
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
