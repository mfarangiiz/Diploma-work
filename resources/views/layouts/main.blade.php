<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menkids</title>
    <link rel="stylesheet" href="{{ asset('recourse/css/styles.css') }}">
    <!-- Keep only one Bootstrap CSS version -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<header class="header">
    <div class="logo">
        <img src="{{ asset('/storage/logo/logo.png') }}" alt="">
    </div>

    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">Bosh Sahifa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Biz Haqimizda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('abakus') }}">Abacus</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('motorika') }}">Motorika</a></li>
                @if(auth()->check())
                    @hasanyrole('admin|teacher')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    @endhasanyrole

                    @role('user')
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                   data-bs-target="#editProfileModal">
                                    ✏️ Profilni tahrirlash
                                </a>
                            </li>
                            <li>
                                <!-- Fixed modal trigger without ID -->
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                   data-bs-target="#achievementsModal">
                                    📊 O‘zlashtirish
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item position-relative" href="#" data-bs-toggle="modal"
                                   data-bs-target="#chatModal">
                                    💬 Chat
                                    @if(auth()->user()->UserHasMessage())
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            1
                                        </span>
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal"
                                   data-bs-target="#logoutModal">
                                    ❌ Chiqish
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Kirish</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

@yield('content')

@if(auth()->check())
    <!-- Profilni tahrirlash modali -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">✏️ Profilni tahrirlash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('profile.update', auth()->id()) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label text-start w-100">Ism</label>
                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-start w-100">Telefon raqam</label>
                            <input type="tel" name="phone" value="{{ auth()->user()->phone }}" class="form-control"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-start w-100">Parol</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn custom-btn w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @php
        $percentage = auth()->user()->test_status ?? 0; // Default to 0 if null
    @endphp

        <!-- O‘zlashtirish modali (matching the image) -->
    <div class="modal fade" id="achievementsModal" tabindex="-1" aria-labelledby="achievementsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="achievementsLabel">📊 O‘zlashtirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <h4>Umumiy o‘zlashtirish darajasi</h4>
                    <div class="progress" style="height: 20px; background-color: #e5e7eb;">
                        <div class="progress-bar" style="width: {{ $percentage }}%; background-color: #d1d5db;"
                             role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                            <!-- Removed ID for the percentage span -->
                            <span class="text-white fw-bold">{{ $percentage }}%</span>
                        </div>
                    </div>
{{--                    <p class="mt-3">Siz hali testlarni to‘liq ishlab chiqmadingiz</p>--}}
                </div>
            </div>
        </div>
    </div>

    <!-- Chat modali -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatLabel">💬 O‘qituvchi bilan chat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="chat-box"
                         style="height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                        @foreach(auth()->user()->chat as $message)
                            <li class="list-group-item border-0 d-flex m-1 justify-content-{{ ($message->status == 1) ? 'start' : 'end' }}">
                                <div class="p-3 rounded" style="background-color: #DCF8C6; max-width: 70%;">
                                    <strong>{{ $message->status == 1 ? 'O`qituvchi ' : 'Siz' }}:</strong>
                                    <div>{{ $message->message }}</div>
                                </div>
                            </li>
                        @endforeach
                    </div>
                    <form action="{{ route('message.send') }}" method="post">
                        @csrf
                        <div class="input-group mt-3">
                            <input type="text" name="message" class="form-control" placeholder="Xabar yozing...">
                            <button class="btn btn-primary">Yuborish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Log out modali -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Haqiqatan ham hisobingizdan chiqmoqchimisiz?</p>
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="button" class="btn custom-btn" data-bs-dismiss="modal">Bekor qilish</button>
                        <x-dropdown-link :href="route('logout')" class="btn btn-danger d-inline-block text-center"
                                         style="display: inline-block; padding: .375rem .75rem; border-radius: .25rem;"
                                         onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

<footer class="footer">
    <div class="container">
        <p class="email">Email: example@example.com</p>
        <div class="row"></div>
        <p class="name">Farangiz Masharipova</p>
    </div>
</footer>

<!-- Removed all JavaScript dependencies and scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
