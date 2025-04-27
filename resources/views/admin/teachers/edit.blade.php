<button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#usersEdit{{ $teacher->id }}">
    <i class="bx bx-edit-alt"></i>
</button>

<div class="modal fade" id="usersEdit{{ $teacher->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Foydalanuvchi tahrirlash</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('teachers.update', $teacher->id) }}" class="prevent-duplicate-submit">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Ismi</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{$teacher->name}}"
                            placeholder=""
                            autofocus
                        />
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefon raqam</label>
                        <div class="input-group input-group-merge">

                        <span class="input-group-text">+998</span>
                        <input type="tel" class="form-control" id="phone" name="phone" maxlength="9" value="{{$teacher->phone}}"
                               required/>
                               </div>
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
