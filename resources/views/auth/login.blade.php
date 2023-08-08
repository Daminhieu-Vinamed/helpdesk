@extends('auth.master')
@section('title', 'Login')
@section('content')
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                    </div>
                    <form class="user" action="{{ route('form.postLogin') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user"
                                id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Điền địa chỉ E-mail..." name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Mật khẩu" name="password">
                        </div>
                        @if (Session::has('error'))
                            <div class="form-group">
                                <span class="focus-input100 text-center text-danger">{{ Session::get('error') }}</span>
                            </div>
                        @elseif (Session::has('success'))
                            <div class="form-group">
                                <span class="focus-input100 text-center text-success">{{ Session::get('success') }}</span>
                            </div>
					    @endif
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                        {{-- <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a> --}}
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Lấy lại mật khẩu?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('form.getRegister') }}">Tạo tài khoản!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection