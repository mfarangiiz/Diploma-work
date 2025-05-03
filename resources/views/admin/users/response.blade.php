<button type="button" id="chatButton" class="btn btn-info me-2 position-relative" data-bs-toggle="modal"
        data-bs-target="#chatModal{{ $user->id }}">
    <i class="bx bx-message"></i>
    @if($user->AdminhasMessage($user->id))
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
           1
        </span>
    @endif
</button>

<div class="modal fade" id="chatModal{{ $user->id }}"" tabindex="-1" aria-labelledby="chatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="chatLabel">💬 O‘qituvchi bilan chat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="chat-box" id="chatBox"
                     style="height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                    @foreach($user->chat as $message)
                        <li class="list-group-item border-0 d-flex justify-content-{{ ($message->status == 0) ? 'start' : 'end' }}">
                            <div class="p-3 rounded"
                                 style="background-color: #DCF8C6;  max-width: 70%;">
                                <strong>{{ $message->status == 0 ? $message->user->name : 'teacher' }}</strong>
                                <div>{{ $message->message }}</div>
                            </div>
                        </li>
                    @endforeach
                </div>

                <form action="{{(route('admin.message.send',$user->id))}}" method="post">
                    @method('PUT')
                    <div class="input-group mt-3">
                        @csrf
                        <input type="text" name="message" class="form-control" placeholder="Xabar yozing...">
                        <button class="btn btn-primary">Yuborish</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatModal = document.getElementById('chatModal');

        chatModal.addEventListener('shown.bs.modal', function () {
            const chatBox = document.getElementById('chatBox');
            if (chatBox) {
                chatBox.scrollTo({top: chatBox.scrollHeight, behavior: 'smooth'});
            }
        });
    });
</script>



