@extends('auth.master')
@section('title', 'Register')
@section('content')
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản</h1>
                    </div>
                    <form class="user" action="{{ route('form.postRegister') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="employee_code" placeholder="Mã nhân viên" value="{{ old('employee_code') }}">
                                @error('employee_code')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="full_name" placeholder="Họ và tên" value="{{ old('full_name') }}">
                                @error('full_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" name="first_name" placeholder="Họ" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" name="last_name" placeholder="Tên" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" placeholder="E-mail" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" name="password" placeholder="Mật khẩu">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" name="againPassword" placeholder="Điền lại mật khẩu">
                                @error('againPassword')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        @if (Session::has('success'))
                            <div class="form-group">
                                <span class="focus-input100 text-center text-success">{{ Session::get('success') }}</span>
                            </div>
					    @endif
                        <button type="submit" class="btn btn-primary btn-user btn-block">Đăng ký</button>
                        <hr>
                        {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a> --}}
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Lấy lại mật khẩu?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('form.getLogin') }}">Đăng nhập!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection