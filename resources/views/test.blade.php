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
                            <div class="mb-4 p-3 border rounded bg-light">
                                <h5 class="text-dark">{{ $test->question }}</h5>
                                @foreach($test->options as $option)
                                    <div class="form-check">
                                        <label class="form-check-label w-100 p-2 border rounded bg-white"
                                               style="cursor: pointer;">
                                            <input class="form-check-input me-2" type="radio"
                                                   name="answers[{{ $test->id }}]"
                                                   value="{{ $option }}" required
                                                {{ (session('submittedAnswers')[$test->id] ?? '') == $option ? 'checked' : '' }}>
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary px-5">Submit Test</button>
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
                            <h5 class="modal-title text-success">Test Result</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center fs-5">You got <strong>{{ session('correctCount') }}</strong> correct
                                answers!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
