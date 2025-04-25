<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>MenKids</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="../assets/css/demo.css"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"/>

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css"/>
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Register Card -->
            <div class="card">
                <div class="card-body">
                <div class="app-brand justify-content-center">
  <div class="app-brand-link d-flex align-items-center gap-1">
    <div class="logo-img">
      <img src="{{ asset('/storage/logo/logo.png') }}" alt="Logo">
    </div>
    <div class="brand-name">
      <span class="letter letter-1">M</span>
      <span class="letter letter-2">e</span>
      <span class="letter letter-3">n</span>
      <span class="letter letter-4">K</span>
      <span class="letter letter-1">i</span>
      <span class="letter letter-2">d</span>
      <span class="letter letter-3">s</span>
    </div>
  </div>
</div>

<style>
  .logo-img img {
    height: 60px;
    width: 60px;
    object-fit: contain;
  }

  .brand-name {
    font-size: 30px;
    font-weight: 800;
    display: flex;
    align-items: center;
    gap: 2px;
    white-space: nowrap;
  }

  .letter-1 {
    color: #FFD700;
  }

  .letter-2 {
    color: #FF4500;
  }

  .letter-3 {
    color: #1E90FF;
  }

  .letter-4 {
    color: #32CD32;
  }

  .app-brand {
    margin-bottom: 20px;
  }
</style>

                    <h4 class="mb-2"></h4>
                    <p class="mb-4"></p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Ismingiz</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter your username"
                                autofocus
                            />
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon Raqam</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">+998</span>
                                <input type="tel" id="phone" class="form-control" name="phone"
                                       pattern="[0-9]{9}" maxlength="9" value="{{ old('phone') }}" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="age_group" class="form-label">Yoshingiz</label>
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
                        <div class="mb-3 text-center">
                            <span>Akkauntingiz bormi?</span>
                            <a href="{{ route('login') }}" class="btn btn-link">Kirish</a>
                        </div>
                        {{--                        <div class="mb-3 form-password-toggle">--}}
                        {{--                            <label class="form-label" for="password">Confirm Password</label>--}}
                        {{--                            <div class="input-group input-group-merge">--}}
                        {{--                                <input--}}
                        {{--                                    type="password"--}}
                        {{--                                    id="password"--}}
                        {{--                                    class="form-control"--}}
                        {{--                                    name="password"--}}
                        {{--                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"--}}
                        {{--                                    aria-describedby="password"--}}
                        {{--                                />--}}
                        {{--                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="mb-3">--}}
                        {{--                            <div class="form-check">--}}
                        {{--                                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms"/>--}}
                        {{--                                <label class="form-check-label" for="terms-conditions">--}}
                        {{--                                    I agree to--}}
                        {{--                                    <a href="javascript:void(0);">privacy policy & terms</a>--}}
                        {{--                                </label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <button class="btn btn-primary d-grid w-100">tizimga kirish</button>
                    </form>


                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>

<!-- / Content -->


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>

