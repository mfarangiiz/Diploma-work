        <div class="modal fade" id="editModel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                        ></button>
                    </div>
                

                    <form method="POST" action="{{ route('test.edit') }}">
                        @csrf

                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="answer" class="form-label">darslik uchun test</label>
                                    <select name="status" class="form-control" id="">
                                        <option value="1">Abacus</option>
                                        <option value="2">Motorika</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="question" class="form-label">Savol</label>
                                    <input type="text" class="form-control" name="question"
                                           value="{{ $test->question ?? old('question') }}"/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="answer" class="form-label">Javob</label>
                                    <input type="text" name="answer" class="form-control"
                                           value="{{ $test->answer ?? old('answer') }}"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                    <label for="age_group" class="form-label">Yosh</label>
                                    <select name="age" id="age" class="form-control" required>
                                        <option value="5-7" {{ old('age_group') == '5-7' ? 'selected' : '' }}>5 - 7
                                            yosh
                                        </option>
                                        <option value="7-10" {{ old('age_group') == '7-10' ? 'selected' : '' }}>7 - 10
                                            yosh
                                        </option>
                                        <option value="10-12" {{ old('age_group') == '10-12' ? 'selected' : '' }}>10 -
                                            12 yosh
                                        </option>
                                    </select>
                                </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Yopmoq
                            </button>
                            <button type="submit" class="btn btn-primary">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
@endsection
