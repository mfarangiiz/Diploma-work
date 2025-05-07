@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-3">
                    <h2 class="text-center text-primary mb-3">Math Test</h2>
                    <!-- Filters Form (always visible) -->
                    <form method="POST" action="/generate-question" class="mb-3">
                        @csrf
                        <div class="row g-2 mb-3">
                            <div class="col-md-4">
                                <label for="count" class="form-label">Number count:</label>
                                <select id="count" name="count" class="form-select" required>
                                    @foreach ([2, 3, 4, 5] as $num)
                                        <option value="{{ $num }}">{{ $num }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="difficulty" class="form-label">Difficulty:</label>
                                <select id="difficulty" name="difficulty" class="form-select" required>
                                    <option value="easy">Easy</option>
                                    <option value="medium">Medium</option>
                                    <option value="hard">Hard</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="timer" class="form-label">Time (seconds):</label>
                                <input type="number" id="timer" name="timer" value="30" min="5" class="form-control" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">
                                Start Test
                            </button>
                        </div>
                    </form>

                    <!-- Question and Answer Section -->
                    @if (isset($expression))
                        <div class="mt-4 p-3 bg-light rounded shadow-sm">
                            <!-- Timer Section -->
                            <div class="text-center mb-3">
                                <span class="badge bg-danger p-2">
                                    Time Left: <span id="timerDisplay" class="fw-bold">{{ $timer ?? 30 }}s</span>
                                </span>
                            </div>
                            <!-- Question Display -->
                            <div class="mb-3">
                                <p class="text-muted mb-1">Question:</p>
                                <h4 class="text-center">{{ $expression }}</h4>
                            </div>

                            <!-- Answer Form -->
                            @if (!isset($result))
                                <form method="POST" action="/submit-answer">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="number" name="answer" class="form-control"
                                               placeholder="Enter your answer" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" id="submitBtn" class="btn btn-success w-100">
                                            Submit Answer
                                        </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    @endif

                    <!-- Result Section -->
                    @if (isset($result))
                        <div id="resultBox" class="mt-4 p-3 bg-light rounded shadow-sm">
                            <div class="text-center">
                                <h4 class="{{ $result == 'Correct!' ? 'text-success' : 'text-danger' }} mb-3">
                                    {{ $result }}
                                </h4>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="p-2 border rounded">
                                            <small class="text-muted">Your Answer</small>
                                            <div class="fw-bold">{{ $user_answer }}</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-2 border rounded">
                                            <small class="text-muted">Correct Answer</small>
                                            <div class="fw-bold">{{ $correct_answer }}</div>
                                        </div>
                                    </div>
                                </div>

                                <a href="/math-test" class="btn btn-outline-primary">
                                    Try Again
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Version (Optional) -->
    @if (isset($expression) && !isset($result))
        <div class="modal fade show" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" style="display: block; padding-right: 15px;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="questionModalLabel">Math Test Question</h5>
                        <span class="badge bg-danger ms-auto">
                            Time: <span id="modalTimerDisplay">{{ $timer ?? 30 }}s</span>
                        </span>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-4">
                            <h4>{{ $expression }}</h4>
                        </div>
                        <form method="POST" action="/submit-answer">
                            @csrf
                            <div class="mb-3">
                                <input type="number" name="answer" class="form-control"
                                       placeholder="Enter your answer" required>
                            </div>
                            <button type="submit" id="modalSubmitBtn" class="btn btn-success w-100">
                                Submit Answer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif

    <!-- Timer Script -->
    @if (isset($expression) && !isset($result))
        <script>
            let timer = {{ $timer ?? 30 }};
            const updateTimerDisplay = (value) => {
                const displays = document.querySelectorAll('#timerDisplay, #modalTimerDisplay');
                displays.forEach(display => {
                    if (display) display.textContent = value + 's';
                });
            };

            function startTimer() {
                updateTimerDisplay(timer);
                const interval = setInterval(() => {
                    timer--;
                    updateTimerDisplay(timer);

                    if (timer <= 0) {
                        clearInterval(interval);
                        const buttons = document.querySelectorAll('#submitBtn, #modalSubmitBtn');
                        buttons.forEach(btn => {
                            if (btn) {
                                btn.disabled = true;
                                btn.textContent = 'Time Expired';
                                btn.classList.remove('btn-success');
                                btn.classList.add('btn-secondary');
                            }
                        });
                    }
                }, 1000);
            }

            window.addEventListener('load', startTimer);
        </script>
    @endif
@endsection
