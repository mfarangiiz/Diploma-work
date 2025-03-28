<div class="d-flex justify-content-between">
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usersCreate">
                <i class="bx bx-plus"></i>
            </button>

            <div class="modal fade" id="usersCreate" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Foydalanuvchi yaratish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('users.store') }}" class="prevent-duplicate-submit">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Ism</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        autofocus
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon raqam</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" maxlength="9"
                                           required/>
                                </div>
                                <div class="mb-3">
                                    <label for="age_group" class="form-label">Yosh</label>
                                    <select name="age" id="age" class="form-control" required>
                                        <option value="5-7" {{ old('age_group') == '5-7' ? 'selected' : '' }}>5 - 7 yosh
                                        </option>
                                        <option value="7-10" {{ old('age_group') == '7-10' ? 'selected' : '' }}>7 - 10 yosh
                                        </option>
                                        <option value="10-12" {{ old('age_group') == '10-12' ? 'selected' : '' }}>10 - 12
                                            yosh
                                        </option>
                                    </select>
                                    @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Parol</label>
                                    <div class="input-group input-group-merge">
                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control"
                                            name="password"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="password"
                                        />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Yopish</button>
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
