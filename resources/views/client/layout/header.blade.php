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
                    <a class="nav-link click-scroll {{ request()->routeIs('client.list') 
                        || request()->routeIs('client.detail') 
                        || request()->routeIs('client.create') ? 'text-white' : '' }}" 
                        href="{{ request()->routeIs('client.list') 
                        || request()->routeIs('client.detail') 
                        || request()->routeIs('client.create') ? route('home', '#section_1') : '#section_1' 
                        }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->routeIs('client.list') 
                        || request()->routeIs('client.detail') 
                        || request()->routeIs('client.create') ? 'text-white' : '' }}" 
                        href="{{ request()->routeIs('client.list') 
                        || request()->routeIs('client.detail') 
                        || request()->routeIs('client.create') ? route('home', '#section_2') : '#section_2' 
                        }}">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ request()->routeIs('client.list') 
                        || request()->routeIs('client.detail') 
                        || request()->routeIs('client.create') ? 'text-white' : '' }}" 
                        href="{{ request()->routeIs('client.list') 
                        || request()->routeIs('client.detail') 
                        || request()->routeIs('client.create') ? route('home', '#section_3') : '#section_3' 
                        }}">Liên hệ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ 
                        request()->routeIs('client.list') || request()->routeIs('client.detail') || request()->routeIs('client.create') ? 'active' : ''
                        }}" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ticket</a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item {{ request()->routeIs('client.list') || request()->routeIs('client.detail') ? 'active' : '' }}" href="{{ route('client.list') }}">Danh sách ticket</a></li>

                        <li><a class="dropdown-item {{ request()->routeIs('client.create') ? 'active' : '' }}" href="{{ route('client.create') }}">Tạo ticket</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-none d-lg-block">
                @if (Auth::check())
                    <img data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="navbar-icon bi-person smoothscroll" src="{{ empty(Auth::user()->avatar) ? asset('dist/img/undraw_profile.svg') : asset(Auth::user()->avatar) }}">
                @else
                    <a href="{{ route('form.getLogin') }}" class="navbar-icon bi-person smoothscroll"></a>
                @endif
            </div>
        </div>
    </div>
</nav>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Thông tin cá nhân</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body row">
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <input type="text" name="employee_code" class="form-control" value="{{Auth::user()->employee_code}}" @disabled(true)>
                    <label for="floatingInput">Mã nhân viên</label>
                    <span class="text-danger employee_code-error"></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name}}">
                    <label for="floatingInput">Họ</label>
                    <span class="text-danger first_name-error"></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}">
                    <label for="floatingInput">Tên</label>
                    <span class="text-danger last_name-error"></span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="full_name" class="form-control" value="{{Auth::user()->full_name}}">
                    <label for="floatingInput">Họ và tên</label>
                    <span class="text-danger full_name-error"></span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}">
                    <label for="floatingInput">Tên tài khoản</label>
                    <span class="text-danger username-error"></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="date" name="birthday" class="form-control" value="{{date('Y-m-d', strtotime(Auth::user()->birthday))}}">
                    <label for="floatingInput">Ngày sinh</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="apartment_number" class="form-control" value="{{Auth::user()->apartment_number}}">
                    <label for="floatingInput">Số nhà</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="village" class="form-control" value="{{Auth::user()->village}}">
                    <label for="floatingInput">Đường/Phố/Làng</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="wards" class="form-control" value="{{Auth::user()->wards}}">
                    <label for="floatingInput">Phường/Xã</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="district" class="form-control" value="{{Auth::user()->district}}">
                    <label for="floatingInput">Quận/Huyện</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="city" class="form-control" value="{{Auth::user()->city}}">
                    <label for="floatingInput">Thành Phố</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="hidden" name="imageBefore" value="{{Auth::user()->avatar}}">
                    <input type="file" name="avatar" id="avatar" class="form-control">
                    <label for="floatingInput">Ảnh đại diện</label>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                    <label for="floatingInput">Số điện thoại</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                    <label for="floatingInput">E-mail</label>
                    <span class="text-danger email-error"></span>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-12"> 
                <div class="form-floating">
                    <input type="password" name="password" class="form-control">
                    <label for="floatingInput">Mật khẩu</label>
                    <span class="text-danger password-error"></span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 image-upload">
                <button type="button" class="btn btn-danger delete-image"><i class="fas fa-trash-alt"></i></button>
                <img class="img-thumbnail image-display" src="{{ asset(Auth::user()->avatar) }}">
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('logout') }}" class="btn btn-logout">Đăng xuất</a>
            <button type="button" class="custom-btn update-user-client">Cập nhật</button>
        </div>
      </div>
    </div>
</div>