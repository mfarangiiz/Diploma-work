<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menkids</title>
    <link rel="stylesheet" href="{{asset('recourse/css/styles.css')}}">
    <script src="{{asset('recourse/js/script.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<header class="header">
    <div class="logo">LOGO qo‘yaman</div>

    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Bosh sahifa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('about')}}">Biz Haqimizda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('abakus')}}">Abacus</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('motorika')}}">Motorika</a></li>
                @if(auth()->check())
                    @hasanyrole('admin|teacher')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    @endhasanyrole

                    @role('user')
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                   data-bs-target="#editProfileModal">
                                    ✏️ Profilni tahrirlash
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" id="openAchievements">
                                    📊 O‘zlashtirish
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item position-relative" id="chatButton" href="#"
                                   data-bs-toggle="modal" data-bs-target="#chatModal">
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
                                <a class="dropdown-item text-danger" href="#" id="openLogoutModal">
                                    ❌ Chiqish
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endrole

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Login</a>
                    </li>
                @endif

            </ul>
        </div>
    </nav>
</header>


@yield('content')


@if(auth()->check())
    <!-- Profilni tahrirlashni modali -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel">✏️ Profilni tahrirlash</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('profile.update',auth()->id())}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label text-start w-100">Ism</label>
                            <input type="text" id="editName" name="name" value="{{auth()->user()->name}}"
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-start w-100">Telefon raqam</label>
                            <input type="tel" id="editPhone" name="phone" value="{{auth()->user()->phone}}"
                                   class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-start w-100">parol</label>
                            <input type="password" id="" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn custom-btn w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @php
        $percentage = auth()->user()->test_status ?? 1;
    @endphp

        <!-- O‘zlashtirishni modali -->
    <div class="modal fade" id="achievementsModal" tabindex="-1" aria-labelledby="achievementsLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="achievementsLabel">📊 O‘zlashtirish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <h4>Umumiy o‘zlashtirish darajasi</h4>
                    <div class="progress" style="height: 30px;">
                        <div
                            class="progress-bar progress-bar-striped progress-bar-animated bg-info d-flex align-items-center justify-content-center"
                            id="overallProgress"
                            style="width: {{ $percentage }}%;">
                            <span id="overallPercentage" class="text-white fw-bold">{{ $percentage }}%</span>
                        </div>
                    </div>
                    <p class="mt-3">Siz <strong id="totalTests">{{ $percentage > 0 ? 1 : 0 }}</strong> ta test
                        ishladingiz</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat modali -->
    <div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatLabel">💬 O‘qituvchi bilan chat </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="chat-box" id="chatBox"
                         style="height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                        @foreach(auth()->user()->chat as $message)
                            <li class="list-group-item border-0 d-flex justify-content-{{ ($message->status == 0) ? 'end' : 'start' }}">
                                <div class="p-3 rounded"
                                     style="background-color: #DCF8C6;  max-width: 70%;">
                                    <strong>{{ $message->status == 0 ? 'siz' : 'Admin' }}:</strong>
                                    <div>{{ $message->message }}</div>
                                </div>
                            </li>
                        @endforeach
                    </div>

                    <form action="{{(route('message.send'))}}" method="post">
                        <div class="input-group mt-3">
                            <input type="text" name="message" class="form-control" placeholder="Xabar yozing...">
                            <button class="btn btn-primary">Yuborish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Log outni modali -->
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

                        <x-dropdown-link :href="route('logout')"
                                         class="btn btn-danger d-inline-block text-center"
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

{{--alert--}}
<script>
    const chatModal = document.getElementById('chatModal');

    chatModal.addEventListener('shown.bs.modal', function () {
        const userId = "{{ $user->id ?? auth()->id() }}"; // Ensure you're using the correct user id

        fetch(`/admin/chat/read/${userId}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
        }).then(() => {
            // Remove notification badge once the message is marked as seen
            const badge = document.querySelector('#chatButton .badge');
            if (badge) {
                badge.remove();
            }
        });
    });

    @if(session('success') || session('error'))
    Swal.fire({
        position: "center",
        icon: "{{ session('success') ? 'success' : 'error' }}",
        title: "{{ session('success') ?? session('error') }}",
        showConfirmButton: false,
        timer: 1500
    });
    @endif


    document.addEventListener('DOMContentLoaded', function () {
        const chatModal = document.getElementById('chatModal');

        chatModal.addEventListener('shown.bs.modal', function () {
            const chatBox = document.getElementById('chatBox');
            if (chatBox) {
                chatBox.scrollTo({top: chatBox.scrollHeight, behavior: 'smooth'});
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        const chatModal = document.getElementById('chatModal');

        chatModal.addEventListener('shown.bs.modal', function () {
            const chatBox = document.getElementById('chatBox');
            if (chatBox) {
                chatBox.scrollTo({top: chatBox.scrollHeight, behavior: 'smooth'});
            }

            // Ajax orqali javobsiz xabarlarni `answered = 1` qilish
            fetch("{{ route('chat.markAsAnswered') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            }).then(res => res.json()).then(data => {
                console.log("Xabarlar javob berilgan deb belgilandi");
            });
        });
    });

</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
