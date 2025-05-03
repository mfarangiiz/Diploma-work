document.addEventListener("DOMContentLoaded", function () {
    var videoModal = document.getElementById("videoModal");
    var myVideo = document.getElementById("myVideo");
    var videoSource = document.getElementById("videoSource");
  
    // Modal ochilganda
    videoModal.addEventListener("show.bs.modal", function (event) {
      var button = event.relatedTarget;
      var videoFile = button.getAttribute("data-video");
  
      // To‘liq manzil (bu sizning faylingiz qayerda bo‘lsa o‘sha joy)
      var videoSrc = "/storage/homevideos/" + videoFile + "?v=" + new Date().getTime();
  
      videoSource.src = videoSrc;
      myVideo.load();
    });
  
    // Modal yopilganda
    videoModal.addEventListener("hidden.bs.modal", function () {
      myVideo.pause();
      myVideo.currentTime = 0;
      myVideo.load();
    });
  });
  






//Profilni tahrirlashniki

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("editProfileForm").addEventListener("submit", function(event) {
        event.preventDefault(); 

        var name = document.getElementById("editName").value;
        var surname = document.getElementById("editSurname").value;
        var phone = document.getElementById("editPhone").value;
        var password = document.getElementById("editPassword").value;

        if (name && surname && phone && password) {
            alert("✅ Profil yangilandi!\n\n" +
                  "👤 Ism: " + name + "\n" +
                  "👤 Familiya: " + surname + "\n" +
                  "📞 Telefon: " + phone);

            localStorage.setItem("user", JSON.stringify({ name, surname, phone, password }));

        
            var editProfileModal = bootstrap.Modal.getInstance(document.getElementById("editProfileModal"));
            editProfileModal.hide();
        } else {
            alert("⚠ Iltimos, barcha maydonlarni to‘ldiring!");
        }
    });

    var savedUser = JSON.parse(localStorage.getItem("user"));
    if (savedUser) {
        document.getElementById("editName").value = savedUser.name;
        document.getElementById("editSurname").value = savedUser.surname;
        document.getElementById("editPhone").value = savedUser.phone;
        document.getElementById("editPassword").value = savedUser.password;
    }
});




//Logoutniki
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("openLogoutModal").addEventListener("click", function () {
        var logoutModal = new bootstrap.Modal(document.getElementById("logoutModal"));
        logoutModal.show();
    });

    document.getElementById("logoutModal").addEventListener("hidden.bs.modal", function () {
        document.body.classList.remove("modal-open"); 
        let backdrops = document.querySelectorAll(".modal-backdrop");
        backdrops.forEach(backdrop => backdrop.remove()); 
    });
});




document.addEventListener("DOMContentLoaded", function () {
    const chatMessages = document.getElementById("chatMessages");
    const chatInput = document.getElementById("chatInput");
    const sendMessage = document.getElementById("sendMessage");

    sendMessage.addEventListener("click", function () {
        const message = chatInput.value.trim();
        if (message !== "") {
            // Foydalanuvchi xabarini chiqarish
            const userMessage = document.createElement("div");
            userMessage.classList.add("text-end", "mb-2");
            userMessage.innerHTML = `<span class="badge bg-primary p-2">${message}</span>`;
            chatMessages.appendChild(userMessage);

            // Inputni tozalash
            chatInput.value = "";

            // O‘qituvchi javob berishi (statik yoki back-end orqali)
            setTimeout(() => {
                const teacherMessage = document.createElement("div");
                teacherMessage.classList.add("text-start", "mb-2");
                teacherMessage.innerHTML = `<span class="badge bg-secondary p-2">O‘qituvchi javobi...</span>`;
                chatMessages.appendChild(teacherMessage);

                // Scrollni pastga tushirish
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000);
        }
    });

    // Enter tugmasi bosilganda ham xabarni yuborish
    chatInput.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            sendMessage.click();
        }
    });
});





//O'zlashtirishniki

document.addEventListener("DOMContentLoaded", function () {
    let testResults = [];

    function calculateOverallProgress() {
        let totalTests = testResults.length;
        
        if (totalTests === 0) {
            document.getElementById("overallPercentage").innerText = "0%";
            document.getElementById("overallProgress").style.width = "0%";
            document.getElementById("totalTests").innerText = "hali test ishlamadingiz"; 
            return;
        }

        let total = testResults.reduce((sum, value) => sum + value, 0);
        let average = Math.round(total / totalTests);

        document.getElementById("overallPercentage").innerText = average + "%";
        document.getElementById("overallProgress").style.width = average + "%";
        document.getElementById("totalTests").innerText = totalTests + " ta test";
    }

    let achievementsModalEl = document.getElementById("achievementsModal");
    let achievementsModal = new bootstrap.Modal(achievementsModalEl);

    document.getElementById("openAchievements").addEventListener("click", function () {
        calculateOverallProgress();
        achievementsModal.show();
    });

    achievementsModalEl.addEventListener("hidden.bs.modal", function () {
        document.querySelectorAll(".modal-backdrop").forEach(el => el.remove());
        document.body.classList.remove("modal-open");
        document.body.style.paddingRight = "0px";
    });
});





//carddagi videoni modal  oynasi bi
document.addEventListener("DOMContentLoaded", function () {
    var videoModal = document.getElementById("videoModal");
    var videoPlayer = document.getElementById("videoPlayer");

    videoModal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var videoUrl = button.getAttribute("data-video");
        videoPlayer.src = videoUrl;
    });

    videoModal.addEventListener("hidden.bs.modal", function () {
        videoPlayer.src = "";
    });
});







document.getElementById('ageFilter').addEventListener('change', function() {
    let selectedAge = this.value;
    let videoCards = document.querySelectorAll('.video-card');
    
    videoCards.forEach(card => {
        if (selectedAge === 'all' || card.getAttribute('data-age') === selectedAge) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
