<div class="d-flex justify-content-between">
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#abakusesCreate">
                <i class="bx bx-plus"></i>
            </button>

            <div class="modal fade" id="abakusesCreate" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Abakus yaratish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('abakus.store') }}" class="prevent-duplicate-submit">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">sarlavha</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="title"
                                        placeholder="Enter your username"
                                        autofocus
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">qoshimcha malumot</label>
                                    <input type="text" class="form-control" id="description" name="description"
                                           maxlength="9"
                                           required/>
                                </div>
                                <div class="mb-3">
                                    <label for="age_group" class="form-label">Yosh</label>
                                    <select name="age" id="age" class="form-control" required>
                                        <option value="5-7" {{ old('age_group') == '5-7' ? 'selected' : '' }}>5 - 7 yosh
                                        </option>
                                        <option value="7-10" {{ old('age_group') == '7-10' ? 'selected' : '' }}>7 - 10
                                            yosh
                                        </option>
                                        <option value="10-12" {{ old('age_group') == '10-12' ? 'selected' : '' }}>10 -
                                            12
                                            yosh
                                        </option>
                                    </select>
                                </div>

                                <div class="col mb-3">
                                    <label for="dobExLarge" class="form-label">Video</label>
                                    <input type="url" id="dobExLarge" name="video" class="form-control" accept="video/*"
                                           value="{{ old('video') }}" required/>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Yopish
                                    </button>
                                    <button type="submit" class="btn btn-primary">Saqlash</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
