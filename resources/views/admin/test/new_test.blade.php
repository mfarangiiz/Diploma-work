<!-- resources/views/math_test.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Math Test</title>
    <script>
        let timer = {{ $timer ?? 0 }};
        let interval;

        function startTimer() {
            if ({{ isset($result) ? 'true' : 'false' }}) return; // Stop timer if already answered

            interval = setInterval(() => {
                document.getElementById('timer').innerText = timer + 's';
                if (timer <= 0) {
                    clearInterval(interval);
                    document.getElementById('submitBtn').disabled = true;
                    document.getElementById('resultBox').innerHTML = "⏰ Time's up! Correct answer: {{ session('correct_answer') }}";
                }
                timer--;
            }, 1000);
        }

        window.onload = startTimer;
    </script>
</head>
<body>
<h1>🧮 Math Test</h1>

@if (!isset($expression))
    <form method="POST" action="/generate-question">
        @csrf
        <label>Number count:</label>
        <select name="count">
            @foreach ([2, 3, 4, 5] as $num)
                <option value="{{ $num }}">{{ $num }}</option>
            @endforeach
        </select>

        <label>Difficulty:</label>
        <select name="difficulty">
            <option value="easy">Easy</option>
            <option value="medium">Medium</option>
            <option value="hard">Hard</option>
        </select>

        <label>Time (seconds):</label>
        <input type="number" name="timer" value="30" min="5" required>

        <button type="submit">▶️ Start Test</button>
    </form>
@else
    <div>
        <p><strong>Question:</strong> {{ $expression }}</p>
        <p><strong>Time left:</strong> <span id="timer"></span></p>

        @if (!isset($result))
            <form method="POST" action="/submit-answer">
                @csrf
                <input type="n"  name="answer" required>
                <button type="submit" id="submitBtn">✅ Submit</button>
            </form>
        @endif
    </div>
@endif

<div id="resultBox">
    @if (isset($result))
        <p>
            {{ $result == 'Correct!' ? '🎉 Congratulations! You got it right.' : '❌ ' . $result }}
        </p>
        <p>Your Answer: {{ $user_answer }}</p>
        <p>Correct Answer: {{ $correct_answer }}</p>
        <form method="GET" action="/math-test">
            <button type="submit">🔁 Try Again</button>
        </form>
    @endif
</div>
</body>
</html>
