@extends('snead.layout.master')
@section('content')

    <!-- Loading Spinner (full screen) with animations -->
    <div id="loadingSpinner" class="upload-feedback" style="display: none;">
        <div class="upload-container">
            <div class="upload-animation">
                <!-- Animated film reel -->
                <div class="film-reel">
                    <div class="film-strip"></div>
                    <div class="reel-left"></div>
                    <div class="reel-right"></div>
                </div>

                <!-- Playful progress indicator -->
                <div class="progress-container">
                    <div class="progress-text">
                        <span class="upload-message">Video yuklanmoqda...</span>
                        <span class="fun-message">🎬 Kino yaratish jarayoni! 🍿</span>
                    </div>
                    <div class="progress" style="height: 10px;">
                        <div id="uploadProgress"
                             class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                             role="progressbar" style="width: 0%"></div>
                    </div>
                    <div class="upload-stats">
                        <span id="uploadPercentage">0%</span>
                        <span id="uploadSpeed" class="ms-3">⚡ Tezlik: hisoblanmoqda...</span>
                    </div>
                </div>

                <!-- Entertaining tips while waiting -->
                <div class="waiting-tips">
                    <p>📽️ Eslatma: Video hajmi qancha katta bo'lsa, yuklash shunchalik uzoqroq davom etadi</p>
                    <p>🎥 Yoqimli fakt: 1 daqiqalik video taxminan 10MB dan 500MB gacha bo'lishi mumkin</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        .upload-feedback {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(255, 255, 255, 0.95);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .upload-container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 90%;
            text-align: center;
            border: 2px solid #0d6efd;
            animation: pulseBorder 2s infinite;
        }

        .film-reel {
            position: relative;
            width: 200px;
            height: 100px;
            margin: 0 auto 30px;
        }

        .film-strip {
            width: 100%;
            height: 60px;
            background: repeating-linear-gradient(
                to bottom,
                #333,
                #333 10px,
                #fff 10px,
                #fff 20px
            );
            position: relative;
            top: 20px;
            animation: moveFilm 3s linear infinite;
        }

        .reel-left, .reel-right {
            position: absolute;
            width: 40px;
            height: 40px;
            background: #555;
            border-radius: 50%;
            top: 30px;
            border: 5px solid #333;
        }

        .reel-left {
            left: -20px;
        }

        .reel-right {
            right: -20px;
        }

        .progress-container {
            margin: 20px 0;
        }

        .progress-text {
            margin-bottom: 15px;
        }

        .upload-message {
            display: block;
            font-size: 1.2rem;
            font-weight: bold;
            color: #0d6efd;
        }

        .fun-message {
            display: block;
            font-size: 1rem;
            color: #6c757d;
            margin-top: 5px;
        }

        .upload-stats {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 0.9rem;
        }

        @keyframes moveFilm {
            from {
                background-position: 0 0;
            }
            to {
                background-position: 0 20px;
            }
        }

        @keyframes pulseBorder {
            0% {
                border-color: #0d6efd;
            }
            50% {
                border-color: #0dcaf0;
            }
            100% {
                border-color: #0d6efd;
            }
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Jadval /</span> Abakus</h4>
        @include('alerts.success-alert')
        @include('alerts.error-alert')

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center flex-column flex-sm-row">
                <!-- Search -->
                <form action="{{ route('abakus.index') }}" method="GET"
                      class="d-flex align-items-center mb-2 mb-sm-0 me-sm-2">
                    <input type="text" class="form-control me-2" placeholder="Izlash" name="search"
                           value="{{ request('search') }}">
                    <button class="btn btn-primary me-2" type="submit">
                        <i class="bx bx-search"></i>
                    </button>
                </form>

                <div class="ms-auto">
                    @include('admin.abakus.create')
                </div>

            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Sarlavha</th>
                        <th>Qoshimcha malumot</th>
                        <th>yoshi</th>
                        <th>Video</th>
                        <th>harakatlar</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($abakuses as $abakus)
                        <tr>
                            <td>{{ $abakus->id }}</td>
                            <td>{{ $abakus->title }}</td>
                            <td>{{ $abakus->description }}</td>
                            <td>{{ $abakus->age }}</td>
                            <td>
                                <video width="400" controls>
                                    <source src="{{ asset(asset('storage/' . $abakus->video)) }}"
                                            type="{{ Storage::mimeType('storage/videos' . $abakus->video) }}">
                                    Your browser does not support HTML5 video.
                                </video>
                            </td>
                            <td>
                                <div class="d-flex">

                                    @include('admin.abakus.edit')

                                    @include('admin.abakus.delete')

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Basic Pagination -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="demo-inline-spacing">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item first">
                                        <a class="page-link" href="{{ $abakuses->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevrons-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item prev">
                                        <a class="page-link" href="{{ $abakuses->previousPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-left"></i>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $abakuses->lastPage(); $i++)
                                        <li class="page-item {{ $abakuses->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $abakuses->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item next">
                                        <a class="page-link" href="{{ $abakuses->nextPageUrl() }}">
                                            <i class="tf-icon bx bx-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li class="page-item last">
                                        <a class="page-link" href="{{ $abakuses->url($abakuses->lastPage()) }}">
                                            <i class="tf-icon bx bx-chevrons-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Basic Pagination -->
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.prevent-duplicate-submit');
            const spinner = document.getElementById('loadingSpinner');
            const progressBar = document.getElementById('uploadProgress');
            const percentageText = document.getElementById('uploadPercentage');
            const speedText = document.getElementById('uploadSpeed');

            const funMessages = [
                "🎥 Video yuklash davom etmoqda...",
                "🍿 Tayyor bo'lishini kutayotganingiz uchun rahmat!",
                "🎬 Sizning videongiz ajoyib bo'lishiga ishonamiz!",
                "📽️ Yuklash tezligi internet ulanishiga bog'liq",
                "🎞️ Videoni qisqa qilish yuklashni tezlashtirishi mumkin"
            ];

            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    // Show loading spinner
                    spinner.style.display = 'flex';

                    // Hide the modal associated with this form
                    const modal = bootstrap.Modal.getInstance(form.closest('.modal'));
                    if (modal) modal.hide();

                    let uploadStartTime = new Date().getTime();
                    let lastLoaded = 0;
                    let lastTime = uploadStartTime;

                    let messageIndex = 0;
                    const messageInterval = setInterval(() => {
                        document.querySelector('.fun-message').textContent = funMessages[messageIndex];
                        messageIndex = (messageIndex + 1) % funMessages.length;
                    }, 5000);

                    const formData = new FormData(form);
                    const xhr = new XMLHttpRequest();

                    xhr.upload.addEventListener('progress', function (e) {
                        if (e.lengthComputable) {
                            const percentComplete = Math.round((e.loaded / e.total) * 100);
                            progressBar.style.width = percentComplete + '%';
                            percentageText.textContent = percentComplete + '%';

                            const currentTime = new Date().getTime();
                            const timeElapsed = (currentTime - lastTime) / 1000;
                            if (timeElapsed > 0.5) {
                                const bytesLoaded = e.loaded - lastLoaded;
                                const speed = (bytesLoaded / (1024 * 1024)) / timeElapsed;

                                if (speed > 0) {
                                    speedText.textContent = `⚡ Tezlik: ${speed.toFixed(2)} MB/s`;
                                }

                                lastLoaded = e.loaded;
                                lastTime = currentTime;
                            }
                        }
                    }, false);

                    xhr.addEventListener('load', function () {
                        clearInterval(messageInterval);
                        if (xhr.status >= 200 && xhr.status < 300) {
                            window.location.reload();
                        } else {
                            alert('Yuklashda xatolik yuz berdi: ' + xhr.statusText);
                            spinner.style.display = 'none';
                        }
                    });

                    xhr.addEventListener('error', function () {
                        clearInterval(messageInterval);
                        alert('Yuklashda xatolik yuz berdi');
                        spinner.style.display = 'none';
                    });

                    xhr.open(form.method, form.action, true);
                    xhr.send(formData);
                });
            });
        });
    </script>
@endsection
