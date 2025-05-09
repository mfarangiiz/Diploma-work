@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm m-4 p-3">
                    <h2 class="text-center text-primary mb-3">Matematika testi</h2>

                    <!-- Filters Form (always visible) -->
                    <form method="POST" action="/generate-question" class="mb-3">
                        @csrf
                        <div class="row g-2 mb-3">
                            <label for="count" class="form-label">Sonlar soni:</label>
                            <select id="count" name="count" class="form-select" required>
                                @foreach ([2, 3, 4, 5] as $num)
                                    <option value="{{ $num }}">{{ $num }}</option>
                                @endforeach
                            </select>

                            <label for="difficulty" class="form-label">Qiyinchilik darajasi:</label>
                            <select id="difficulty" name="difficulty" class="form-select" required>
                                <option value="easy">Oson</option>
                                <option value="medium">O‘rtacha</option>
                                <option value="hard">Qiyin</option>
                            </select>

                            <label for="timer" class="form-label">Vaqt (soniyada):</label>
                            <input type="number" id="timer" name="timer" value="30" min="5" class="form-control"
                                   required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Testni boshlash</button>
                        </div>
                    </form>

                    <!-- Result Section -->
                    @if (isset($result))
                        <div id="resultBox" class="mt-4 p-3 bg-light rounded shadow-sm">
                            <div class="text-center">
                                <h4 class="{{ $result == 'Correct!' ? 'text-success' : 'text-danger' }} mb-3">
                                    {{ $result == 'Correct!' ? 'To‘g‘ri!' : 'Noto‘g‘ri!' }}
                                </h4>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="p-2 border rounded">
                                            <small class="text-muted">Sizning javobingiz</small>
                                            <div class="fw-bold">{{ $user_answer }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 border rounded">
                                            <small class="text-muted">To‘g‘ri javob</small>
                                            <div class="fw-bold">{{ $correct_answer }}</div>
                                        </div>
                                    </div>
                                </div>

                                <a href="/math-test" class="btn btn-outline-primary">Yana urinib ko‘ring</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if (isset($expression) && !isset($result))
        <div class="modal fade show" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel"
             style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content shadow">
                    <div class="modal-header">
                        <h5 class="modal-title" id="questionModalLabel">Savol</h5>
                    </div>
                    <form method="POST" action="/submit-answer">
                        @csrf
                        <input type="hidden" name="timer" value="{{ $timer }}">
                        <div class="modal-body">
                            <div class="text-center mb-3">
                                <span class="badge bg-danger p-2">
                                    Qolgan vaqt: <span id="modalTimerDisplay" class="fw-bold">{{ $timer ?? 30 }}s</span>
                                </span>
                            </div>
                            <h4 class="text-center mb-3">{{ $expression }}</h4>
                            <div class="mb-3">
                                <input type="number" name="answer" class="form-control"
                                       placeholder="Javobingizni kiriting" required>
                            </div>
                        </div>
                        <div class="modal-footer d-flex flex-column gap-2">
                            <button type="submit" id="modalSubmitBtn" class="btn btn-success w-100">Javobni yuborish
                            </button>
                            <a href="/math-test" id="closeBtnAfterTimeout"
                               class="btn btn-secondary w-100 d-none">Yopish</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal backdrop -->
        <div class="modal-backdrop fade show"></div>
    @endif
    <script>
        let timer = {{ $timer ?? 30 }};
        const updateTimerDisplay = (value) => {
            const displays = document.querySelectorAll('#modalTimerDisplay');
            displays.forEach(display => display.textContent = value + 's');
        };

        function startTimer() {
            updateTimerDisplay(timer);
            const interval = setInterval(() => {
                timer--;
                updateTimerDisplay(timer);
                if (timer <= 0) {
                    clearInterval(interval);

                    // Hide submit button
                    const submitBtn = document.getElementById('modalSubmitBtn');
                    if (submitBtn) {
                        submitBtn.classList.add('d-none');
                    }

                    // Show only the "Yopish" link to go back to /math-test
                    const closeBtn = document.getElementById('closeBtnAfterTimeout');
                    if (closeBtn) {
                        closeBtn.classList.remove('d-none');
                    }
                }
            }, 1000);
        }

        window.addEventListener('load', startTimer);
    </script>

@endsection
