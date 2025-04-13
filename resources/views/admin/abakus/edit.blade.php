<button type="button" class="btn btn-warning me-2" data-bs-toggle="modal"
        data-bs-target="#usersEdit{{ $abakus->id }}">
    <i class="bx bx-edit-alt"></i>
</button>

<div class="modal fade" id="usersEdit{{ $abakus->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">abakussni tahrirlash</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST"
                      id="editForm{{ $abakus->id }}"
                      action="{{ route('abakus.update', $abakus->id) }}"
                      enctype="multipart/form-data"
                      class="prevent-duplicate-submit">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Sarlavha</label>
                        <input type="text" class="form-control" name="title" value="{{ $abakus->title }}" autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Qoshimcha malumot</label>
                        <input type="text" class="form-control" name="description" value="{{ $abakus->description }}"
                               maxlength="9" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Yosh</label>
                        <select name="age" class="form-control" required>
                            <option value="5-7" {{ $abakus->age == '5-7' ? 'selected' : '' }}>5 - 7 yosh</option>
                            <option value="7-10" {{ $abakus->age == '7-10' ? 'selected' : '' }}>7 - 10 yosh</option>
                            <option value="10-12" {{ $abakus->age == '10-12' ? 'selected' : '' }}>10 - 12 yosh
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Video</label>
                        <input type="file" name="video" class="form-control" accept="video/*">
                        <div class="form-text">Agar video o'zgartirilmasa, bo'sh qoldiring</div>
                        @if($abakus->video)
                            <div class="mt-2">
                                <video width="200" controls>
                                    <source src="{{ asset('storage/' . $abakus->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif
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
