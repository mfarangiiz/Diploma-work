<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
    <div class="sidebar-logo">
  <img src="{{ asset('/storage/logo/logo.png') }}" alt="Logo">
  <span class="sidebar-brand-name">
    <span class="letter letter-1">M</span>
    <span class="letter letter-2">e</span>
    <span class="letter letter-3">n</span>
    <span class="letter letter-4">K</span>
    <span class="letter letter-1">i</span>
    <span class="letter letter-2">d</span>
    <span class="letter letter-3">s</span>
  </span>
</div>

<style>
.sidebar-logo {
  display: flex;
  align-items: center;
  padding: 0 !important;
  margin: 0 !important;
  gap: 6px; /* oraliq juda uzoq edi, 6px qildik */
  margin-left: 0 !important;
}

.sidebar-logo img {
  height: 65px;
  width: 65px;
  object-fit: contain;
  margin: 0 !important;
  padding: 0 !important;
}

.sidebar-brand-name {
  font-size: 28px;
  font-weight: 700;
  display: flex;
  gap: 1px;
  align-items: center;
  white-space: nowrap;
  margin: 0 !important;
  padding: 0 !important;
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

/* Kichik ekranlar uchun logo nomini yashirish */
@media (max-width: 768px) {
  .sidebar-brand-name {
    display: none;
  }
}
</style>

           

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        @role('admin')

        <li class="menu-item  @if(request()->routeIs('dashboard')) active @endif">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-item @if(request()->routeIs('homepage')) active @endif">
            <a href="{{route('homepage')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-menu "></i>
                <div data-i18n="Analytics">Bosh sahifa</div>
            </a>
        </li>
        <li class="menu-item @if(request()->routeIs('teachers.index')) active @endif">
            <a href="{{route('teachers.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">O`qituvchilar</div>
            </a>
        </li>
        @endrole
        <li class="menu-item @if(request()->routeIs('users.index')) active @endif">
            <a href="{{route('users.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Foydalanuvchilar</div>
            </a>
        </li>
        <li class="menu-item @if(request()->routeIs('abakus.index')) active @endif">
            <a href="{{route('abakus.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-book-alt"></i>
                <div data-i18n="Analytics">abakus</div>
            </a>
        </li>
        <li class="menu-item @if(request()->routeIs('motorika.index')) active @endif">
            <a href="{{route('motorika.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-book"></i>
                <div data-i18n="Analytics">Motorika</div>
            </a>
        </li>
        <li class="menu-item @if(request()->routeIs('test.index')) active @endif">
            <a href="{{route('test.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-test-tube"></i>
                <div data-i18n="Analytics">Test</div>
            </a>
        </li>
        <!-- Layouts -->
    </ul>
</aside>
