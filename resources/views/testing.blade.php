<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menkids</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


</head>
<body>

<header class="header">
    <div class="logo">LOGO qo‘yaman</div>

    <nav class="navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.blade.php">Bosh sahifa</a></li>
                <li class="nav-item"><a class="nav-link" href="abacus.blade.php">Abakus</a></li>
                <li class="nav-item"><a class="nav-link" href="motorika.blade.php">Motorika</a></li>
                <li class="nav-item"><a class="nav-link" href="testing.html">Testlar</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">✏️ Profilni tahrirlash</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="#" id="openAchievements">📊 O‘zlashtirish</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" id="openChat" data-bs-toggle="modal" data-bs-target="#chatModal">💬 Chat</a>
                        </li>

                        <li>
                            <a class="dropdown-item text-danger" href="#" id="openLogoutModal">❌ Chiqish</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>


<div class="filter-container">
    <label for="ageFilter">Yoshni tanlang:</label>
    <select id="ageFilter">
        <option value="5">5-7 yosh</option>
        <option value="6">7-10yosh</option>
        <option value="7">10-12 yosh</option>
    </select>
</div>

    <section class="test-section">
        <div class="container">

            <form id="test-form">

                <div class="question">
                    <p>1. 5 + 3 = ?</p>
                    <div class="options">
                        <label><input type="radio" name="question1" value="1"> 6</label><br>
                        <label><input type="radio" name="question1" value="2"> 7</label><br>
                        <label><input type="radio" name="question1" value="3"> 8</label>
                    </div>
                </div>


                <div class="question">
                    <p>2. 10 - 4 = ?</p>
                    <div class="options">
                        <label><input type="radio" name="question2" value="1"> 5</label><br>
                        <label><input type="radio" name="question2" value="2"> 6</label><br>
                        <label><input type="radio" name="question2" value="3"> 7</label>
                    </div>
                </div>


                <div class="question">
                    <p>3. 3 x 2 = ?</p>
                    <div class="options">
                        <label><input type="radio" name="question3" value="1"> 4</label><br>
                        <label><input type="radio" name="question3" value="2"> 5</label><br>
                        <label><input type="radio" name="question3" value="3"> 6</label>
                    </div>
                </div>


                <div class="question">
                    <p>4. 9 ÷ 3 = ?</p>
                    <div class="options">
                        <label><input type="radio" name="question4" value="1"> 2</label><br>
                        <label><input type="radio" name="question4" value="2"> 3</label><br>
                        <label><input type="radio" name="question4" value="3"> 4</label>
                    </div>
                </div>


                <div class="question">
                    <p>5. 6 + 7 = ?</p>
                    <div class="options">
                        <label><input type="radio" name="question5" value="1"> 12</label><br>
                        <label><input type="radio" name="question5" value="2"> 13</label><br>
                        <label><input type="radio" name="question5" value="3"> 14</label>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mt-4">Testni yuborish</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p class="email">Email: example@example.com</p>
            <div class="row"></div>
            <p class="name">Farangiz Masharipova</p>
        </div>
    </footer>














<!-- O‘zlashtirishni modali -->
<div class="modal fade" id="achievementsModal" tabindex="-1" aria-labelledby="achievementsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="achievementsLabel">📊 O‘zlashtirish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <h4>Umumiy o‘zlashtirish darajasi</h4>
                <div class="progress" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" id="overallProgress" style="width: 0%;">
                        <span id="overallPercentage">0%</span>
                    </div>
                </div>
                <p class="mt-3">Siz <strong id="totalTests">0</strong> ta test ishladingiz</p>
            </div>
        </div>
    </div>
</div>





<!-- Profilni tahrirlashni modali -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileLabel">✏️ Profilni tahrirlash</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editProfileForm">
                    <div class="mb-3">
                        <label class="form-label text-start w-100">Ism</label>
                        <input type="text" id="editName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-start w-100">Familiya</label>
                        <input type="text" id="editSurname" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-start w-100">Telefon raqam</label>
                        <input type="tel" id="editPhone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-start w-100">Parol</label>
                        <input type="password" id="editPassword" class="form-control" required>
                    </div>
                    <button type="submit" class="btn custom-btn w-100">Saqlash</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Chat modali -->
<div class="modal fade" id="chatModal" tabindex="-1" aria-labelledby="chatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="chatLabel">💬 O‘qituvchi bilan chat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="chat-box" id="chatBox" style="height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                    <!-- Chat xabarlari shu yerda aks etadi -->
                </div>
                <div class="input-group mt-3">
                    <input type="text" id="chatMessage" class="form-control" placeholder="Xabar yozing...">
                    <button class="btn btn-primary" id="sendMessage">Yuborish</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Log outni modali -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Haqiqatan ham hisobingizdan chiqmoqchimisiz?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn custom-btn" data-bs-dismiss="modal">Bekor qilish</button>
                <a href="logout.php" class="btn btn-danger">Chiqish</a>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
