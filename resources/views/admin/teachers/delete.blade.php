<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#doctorsDelete{{ $teacher->id }}">
    <i class="bx bx-trash-alt"></i>
</button>

<div class="modal fade" id="doctorsDelete{{ $teacher->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $teacher->id }}">Buni qaytara olmaysiz!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $teacher->name }}ni o'chirishni xohlaysizmi?
            </div>
            <div class="modal-footer">
                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="prevent-duplicate-submit">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">O'chirish</button>
                </form>
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Ortga</button>
            </div>
        </div>
    </div>
</div>
