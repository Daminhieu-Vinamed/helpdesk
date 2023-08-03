<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <i class="bi-back"></i>
            <span>Helpdesk</span>
        </a>
        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Liên hệ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ticket</a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="topics-listing.html">Danh sách ticket</a></li>

                        <li><a class="dropdown-item" href="contact.html">Tạo ticket</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-none d-lg-block">
                @if (Auth::check())
                    <img class="navbar-icon bi-person smoothscroll" src="{{ empty(Auth::user()->avatar) ? asset('dist/img/undraw_profile.svg') : asset(Auth::user()->avatar) }}">
                @else
                    <a href="{{ route('form.getLogin') }}" class="navbar-icon bi-person smoothscroll"></a>
                @endif
            </div>
        </div>
    </div>
</nav>