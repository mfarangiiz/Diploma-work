@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center text-primary mb-4">Test</h2>
                    <form action="{{ route('submit.test') }}" method="POST">
    @csrf
    @foreach($tests as $test)
        <div style="margin-bottom: 1.5rem; padding: 1rem; border: 1px solid #dee2e6; border-radius: 0.5rem; background-color: #f8f9fa;">
            <h5 style="color: #343a40; margin-bottom: 1rem;">{{ $test->question }}</h5>
            @foreach($test->options as $option)
                <div class="form-check" style="margin-bottom: 0.75rem;">
                    <label class="form-check-label w-100" 
                           style="display: flex; align-items: center; padding: 0.75rem; border: 1px solid #ced4da; border-radius: 0.5rem; background-color: #ffffff; cursor: pointer; transition: background-color 0.2s;">
                        <input class="form-check-input me-2" type="radio"
                               name="answers[{{ $test->id }}]"
                               value="{{ $option }}" required
                            {{ (session('submittedAnswers')[$test->id] ?? '') == $option ? 'checked' : '' }}
                               style="margin-right: 0.75rem;">
                        {{ $option }}
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach
    <div style="text-align: center;">
        <button type="submit" 
                style="font-size: 1.25rem; padding: 0.75rem 2.5rem; border: none; border-radius: 0.5rem; background-color: #0d6efd; color: white; transition: background-color 0.3s;"
                onmouseover="this.style.backgroundColor='#0b5ed7'"
                onmouseout="this.style.backgroundColor='#0d6efd'">
            Topshirish
        </button>
    </div>
</form>

                </div>
            </div>
        </div>

        <!-- Result Modal -->
        @if(session('correctCount') !== null)
            <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-success">Test Natijasi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center fs-5"> siz  <strong>{{ session('correctCount') }}</strong> ta siga togri javob berdingiz
                                </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">yopish</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Show the modal automatically when test is submitted
                document.addEventListener("DOMContentLoaded", function () {
                    var resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
                    resultModal.show();
                });
            </script>
        @endif
    </div>

@endsection
