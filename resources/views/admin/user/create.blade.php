@extends('admin.layout.master')
@section('title', 'Create user')
@section('content')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Thêm mới tài khoản</h1>
                            </div>
                            <form class="user" action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleInputEmployeeCode">Mã nhân viên</label>
                                        <input type="text" class="form-control" id="exampleInputEmployeeCode" name="employee_code">
                                        @error('employee_code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleInputUsername">Tên tài khoản</label>
                                        <input type="text" class="form-control" id="exampleInputUsername" name="username">
                                        @error('username')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleInputEmail">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" name="email">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleFirstName">Họ</label>
                                        <input type="text" class="form-control" id="exampleFirstName" name="first_name">
                                        @error('first_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleLastName">Tên</label>
                                        <input type="text" class="form-control" id="exampleLastName" name="last_name">
                                        @error('last_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleFullName">Họ và tên</label>
                                        <input type="text" class="form-control" id="exampleFullName" name="full_name">
                                        @error('full_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="examplePhone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="examplePhone" name="phone">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleBirthday">Ngày sinh</label>
                                        <input type="date" class="form-control" id="exampleBirthday" name="birthday">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleRole">Quyền hạn</label>
                                        <select class="form-control" id="exampleRole" name="role">
                                            <option @selected(true) @disabled(true)>Chọn quyền hạn</option>
                                            <option value="{{config('constants.role.one')}}">Người dùng</option>
                                            <option value="{{config('constants.role.two')}}">Quản trị viên</option>
                                            <option value="{{config('constants.role.three')}}">Quản trị viên cao cấp</option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleStatus">Trạng thái</label>
                                        <select class="form-control" id="exampleStatus" name="status">
                                            <option @selected(true) @disabled(true)>Chọn trạng thái</option>
                                            <option value="{{config('constants.status.one')}}">Mở</option>
                                            <option value="{{config('constants.status.two')}}">Khóa</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-3 mb-sm-0">
                                        <label for="exampleApartmentNumber">Số nhà</label>
                                        <input type="text" class="form-control" id="exampleApartmentNumber" name="apartment_number">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleVillage">Đường/Phố/Làng</label>
                                        <input type="text" class="form-control" id="exampleVillage" name="village">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleWards">Phường/Xã</label>
                                        <input type="text" class="form-control" id="exampleWards" name="wards">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleDistrict">Quận/Huyện</label>
                                        <input type="text" class="form-control" id="exampleDistrict" name="district">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleCity">Thành Phố</label>
                                        <input type="text" class="form-control" id="exampleCity" name="city">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="examplePassword">Mật khẩu</label>
                                        <input type="password" class="form-control" id="examplePassword" name="password">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleAvatar">hình đại diện</label>
                                        <input type="file" class="form-control" id="exampleAvatar" name="avatar">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Thêm mới</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/admin/client.js') }}" type="text/javascript"></script>
@endpush
