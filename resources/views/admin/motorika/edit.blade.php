<button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
        data-bs-target="#usersEdit{{ $motorika->id }}">
    <i class="bx bx-edit-alt"></i>
</button>

<div class="modal fade" id="usersEdit{{ $motorika->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">motorikasni tahrirlash</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('motorika.update', $motorika->id) }}"
                      class="prevent-duplicate-submit">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Sarlavha</label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            value="{{$motorika->title}}"
                            autofocus
                        />
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Qoshimcha malumot</label>
                        <input type="text" class="form-control" id="description" name="description" maxlength="9"
                               value="{{$motorika->description}}"
                               required/>
                    </div>

                    <div class="mb-3">
                        <label for="age_group" class="form-label">Yosh</label>
                        <select name="age" id="age_group" class="form-control" required>
                            <option value="{{ $motorika->age }}">yoshini tanlash</option>

                            @endphp

                            <option value="5-7" {{ $motorika->age_group == '5-7' ? 'selected' : '' }}>5 - 7 years</option>
                            <option value="7-10" {{ $motorika->age_group == '7-10' ? 'selected' : '' }}>7 - 10 years
                            </option>
                            <option value="10-12" {{ $motorika->age_group == '10-12' ? 'selected' : '' }}>10 - 12 years
                            </option>

                        </select>
                        @error('age')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="age_group" class="form-label">Video</label>
                        <input type="url" id="dobExLarge" name="video" class="form-control" accept="video/*"
                               value="{{ $motorika->video??old('video') }}" required/>
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
