<div class="d-flex justify-content-between">
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#motorikaesCreate">
                <i class="bx bx-plus"></i>
            </button>

            <div class="modal fade" id="motorikaesCreate" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">motorika yaratish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="uploadForm" action="{{ route('motorika.store') }}"
                                  enctype="multipart/form-data" class="prevent-duplicate-submit" novalidate>

                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">sarlavha</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="title"
                                        placeholder=""
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

                                <div class="col mb-3">
                                    <label for="dobExLarge" class="form-label">Video</label>
                                    <input id="dobExLarge" type="file" name="video" class="form-control"
                                           accept="video/*"
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('uploadForm');
        const spinner = document.getElementById('loadingSpinner');
        const progressBar = document.getElementById('uploadProgress');
        const percentageText = document.getElementById('uploadPercentage');
        const speedText = document.getElementById('uploadSpeed');

        // Array of fun messages to display
        const funMessages = [
            "🎥 Video yuklash davom etmoqda...",
            "🍿 Tayyor bo'lishini kutayotganingiz uchun rahmat!",
            "🎬 Sizning videongiz ajoyib bo'lishiga ishonamiz!",
            "📽️ Yuklash tezligi internet ulanishiga bog'liq",
            "🎞️ Videoni qisqa qilish yuklashni tezlashtirishi mumkin"
        ];

        form.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Show loading spinner
            spinner.style.display = 'flex';

            // Hide modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('motorikaesCreate'));
            if (modal) modal.hide();

            // Record start time and initial loaded bytes
            let uploadStartTime = new Date().getTime();
            let lastLoaded = 0;
            let lastTime = uploadStartTime;

            // Change fun message every 5 seconds
            let messageIndex = 0;
            const messageInterval = setInterval(() => {
                document.querySelector('.fun-message').textContent = funMessages[messageIndex];
                messageIndex = (messageIndex + 1) % funMessages.length;
            }, 5000);

            // Handle form submission with progress tracking
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();

            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    // Update progress bar
                    const percentComplete = Math.round((e.loaded / e.total) * 100);
                    progressBar.style.width = percentComplete + '%';
                    percentageText.textContent = percentComplete + '%';

                    // Calculate upload speed
                    const currentTime = new Date().getTime();
                    const timeElapsed = (currentTime - lastTime) / 1000; // in seconds
                    if (timeElapsed > 0.5) { // Only update every 0.5 seconds for stability
                        const bytesLoaded = e.loaded - lastLoaded;
                        const speed = (bytesLoaded / (1024 * 1024)) / timeElapsed; // in MB/s

                        if (speed > 0) {
                            speedText.textContent = `⚡ Tezlik: ${speed.toFixed(2)} MB/s`;
                        }

                        lastLoaded = e.loaded;
                        lastTime = currentTime;
                    }
                }
            }, false);

            xhr.addEventListener('load', function () {
                clearInterval(messageInterval);
                if (xhr.status >= 200 && xhr.status < 300) {
                    // Success - reload or redirect as needed
                    window.location.reload();
                } else {
                    // Handle error
                    alert('Yuklashda xatolik yuz berdi: ' + xhr.statusText);
                    spinner.style.display = 'none';
                }
            });

            xhr.addEventListener('error', function () {
                clearInterval(messageInterval);
                alert('Yuklashda xatolik yuz berdi');
                spinner.style.display = 'none';
            });

            xhr.open('POST', form.action, true);
            xhr.send(formData);
        });
    });
</script>
