@extends('admin.layout.master')
@section('title', 'Edit user')
@section('content')
    <div class="container-fluid">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Chỉnh sửa tài khoản</h1>
                            </div>
                            <form class="user" action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleInputEmployeeCode">Mã nhân viên</label>
                                        <input type="text" class="form-control" id="exampleInputEmployeeCode" name="employee_code" value="{{$user->employee_code}}">
                                        @error('employee_code')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleInputUsername">Tên tài khoản</label>
                                        <input type="text" class="form-control" id="exampleInputUsername" name="username" value="{{$user->username}}">
                                        @error('username')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="exampleInputEmail">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="{{$user->email}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleFirstName">Họ</label>
                                        <input type="text" class="form-control" id="exampleFirstName" name="first_name" value="{{$user->first_name}}">
                                        @error('first_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleLastName">Tên</label>
                                        <input type="text" class="form-control" id="exampleLastName" name="last_name" value="{{$user->last_name}}">
                                        @error('last_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleFullName">Họ và tên</label>
                                        <input type="text" class="form-control" id="exampleFullName" name="full_name" value="{{$user->full_name}}">
                                        @error('full_name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="examplePhone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="examplePhone" name="phone" value="{{$user->phone}}">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleBirthday">Ngày sinh</label>
                                        <input type="date" class="form-control" id="exampleBirthday" name="birthday" value="{{date('Y-m-d', strtotime($user->birthday))}}">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleRole">Quyền hạn</label>
                                        <select class="form-control" id="exampleRole" name="role">
                                            <option @selected(true) @disabled(true)>Chọn quyền hạn</option>
                                            <option value="{{config('constants.role.one')}}" {{ $user->role === config('constants.role.one') ? 'selected' : '' }}>Người dùng</option>
                                            <option value="{{config('constants.role.two')}}" {{ $user->role === config('constants.role.two') ? 'selected' : '' }}>Quản trị viên</option>
                                            <option value="{{config('constants.role.three')}}" {{ $user->role === config('constants.role.three') ? 'selected' : '' }}>Quản trị viên cấp cao</option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleStatus">Trạng thái</label>
                                        <select class="form-control" id="exampleStatus" name="status">
                                            <option @selected(true) @disabled(true)>Chọn trạng thái</option>
                                            <option value="{{config('constants.status.one')}}" {{ $user->status === config('constants.status.one') ? 'selected' : '' }}>Mở</option>
                                            <option value="{{config('constants.status.two')}}" {{ $user->status === config('constants.status.two') ? 'selected' : '' }}>Khóa</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-1 mb-3 mb-sm-0">
                                        <label for="exampleApartmentNumber">Số nhà</label>
                                        <input type="text" class="form-control" id="exampleApartmentNumber" name="apartment_number" value="{{$user->apartment_number}}">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleVillage">Đường/Phố/Làng</label>
                                        <input type="text" class="form-control" id="exampleVillage" name="village" value="{{$user->village}}">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleWards">Phường/Xã</label>
                                        <input type="text" class="form-control" id="exampleWards" name="wards" value="{{$user->wards}}">
                                    </div>
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                        <label for="exampleDistrict">Quận/Huyện</label>
                                        <input type="text" class="form-control" id="exampleDistrict" name="district" value="{{$user->district}}">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="exampleCity">Thành Phố</label>
                                        <input type="text" class="form-control" id="exampleCity" name="city" value="{{$user->city}}">
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
                                        <input type="hidden" name="imageBefore" value="{{$user->avatar}}">
                                        <label for="exampleAvatar">hình đại diện</label>
                                        <input type="file" class="form-control" id="exampleAvatar" name="avatar">
                                    </div>
                                    @if (!empty($user->avatar))
                                        <div class="col-sm-4 mb-3 mb-sm-0 image-upload">
                                            <button type="button" class="btn btn-danger delete-image"><i class="fas fa-trash-alt"></i></button>
                                            <img class="img-thumbnail image-display" src="{{ asset($user->avatar) }}">
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Chỉnh sửa</button>
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