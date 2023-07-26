<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand">
            <a href="index.html" class="d-inline-flex align-items-center">
                <img src="../../../assets/images/logo_icon.svg" alt="">
                <img src="../../../assets/images/logo_text_light.svg" class="d-none d-sm-inline-block h-16px ms-3" alt="">
            </a>
        </div>

        <div class="d-lg-none ms-2">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-mobile" aria-expanded="false">
                <i class="ph-squares-four"></i>
            </button>
        </div>

        <ul class="nav gap-sm-2 order-1 order-lg-2 ms-auto">
            <li class="nav-item nav-item-dropdown-lg dropdown">
                <a href="#" class="navbar-nav-link align-items-center rounded p-1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="status-indicator-container">
                        {{-- <img src="../../../assets/images/demo/users/face11.jpg" class="w-32px h-32px rounded" alt=""> --}}
                        <div class="rounded h-32px w-32px bg-primary text-white text-center">
                            SA
                        </div>
                    </div>

                    <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">Profile</a>
                    <a href="#" class="dropdown-item">Change Password</a>

                    <div class="dropdown-divider"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="ph-sign-out me-2"></i>
                            Logout
                        </a>
                    </form>

                </div>
            </li>
        </ul>
    </div>
</div>

