  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Sẵn sàng đăng xuất?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn đã sẵn sàng kết thúc phiên hiện tại của mình.</div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
              <a class="btn btn-primary" href="{{ route('logout') }}">Đăng xuất</a>
          </div>
      </div>
  </div>
</div>

 <!-- Profile Modal-->
 <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog modal-xl" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Hồ sơ thông tin tài khoản</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </button>
         </div>
         <div class="modal-body">
                 <div class="form-group row">
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleInputEmployeeCode">Mã nhân viên</label>
                         <input type="text" class="form-control employeeCodeProfile" id="exampleInputEmployeeCode" name="employee_code" value="{{Auth::user()->employee_code}}">
                         <span class="text-danger employee_code-error"></span>
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleInputUsername">Tên tài khoản</label>
                         <input type="text" class="form-control usernameProfile" id="exampleInputUsername" name="username" value="{{Auth::user()->username}}">
                             <span class="text-danger username-error"></span>
                     </div>
                     <div class="col-sm-4 mb-3 mb-sm-0">
                         <label for="exampleInputEmail">Email</label>
                         <input type="email" class="form-control emailProfile" id="exampleInputEmail" name="email" value="{{Auth::user()->email}}">
                             <span class="text-danger email-error"></span>
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleFirstName">Họ</label>
                         <input type="text" class="form-control firstNameProfile" id="exampleFirstName" name="first_name" value="{{Auth::user()->first_name}}">
                         <span class="text-danger first_name-error"></span>
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleLastName">Tên</label>
                         <input type="text" class="form-control lastNameProfile" id="exampleLastName" name="last_name" value="{{Auth::user()->last_name}}">
                         <span class="text-danger last_name-error"></span>
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-3 mb-3 mb-sm-0">
                         <label for="exampleFullName">Họ và tên</label>
                         <input type="text" class="form-control fullNameProfile" id="exampleFullName" name="full_name" value="{{Auth::user()->full_name}}">
                         <span class="text-danger full_name-error"></span>
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="examplePhone">Số điện thoại</label>
                         <input type="text" class="form-control phoneProfile" id="examplePhone" name="phone" value="{{Auth::user()->phone}}">
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleBirthday">Ngày sinh</label>
                         <input type="date" class="form-control birthdayProfile" id="exampleBirthday" name="birthday" value="{{date('Y-m-d', strtotime(Auth::user()->birthday))}}">
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleRole">Quyền hạn</label>
                         <select class="form-control roleProfile" id="exampleRole" name="role">
                             <option @selected(true) @disabled(true)>Chọn quyền hạn</option>
                             <option value="{{config('constants.role.one')}}" {{ Auth::user()->role === config('constants.role.one') ? 'selected' : '' }}>Người dùng</option>
                             <option value="{{config('constants.role.two')}}" {{ Auth::user()->role === config('constants.role.two') ? 'selected' : '' }}>Quản trị viên</option>
                             <option value="{{config('constants.role.three')}}" {{ Auth::user()->role === config('constants.role.three') ? 'selected' : '' }}>Quản trị viên cấp cao</option>
                         </select>
                         <span class="text-danger role-error"></span>
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleStatus">Trạng thái</label>
                         <select class="form-control statusProfile" id="exampleStatus" name="status">
                             <option @selected(true) @disabled(true)>Chọn trạng thái</option>
                             <option value="{{config('constants.status.one')}}" {{ Auth::user()->status === config('constants.status.one') ? 'selected' : '' }}>Mở</option>
                             <option value="{{config('constants.status.two')}}" {{ Auth::user()->status === config('constants.status.two') ? 'selected' : '' }}>Khóa</option>
                         </select>
                         <span class="text-danger status-error"></span>
                     </div>
                     <div class="col-sm-1 mb-3 mb-sm-0">
                        <label for="exampleApartmentNumber">Số nhà</label>
                        <input type="text" class="form-control apartmentNumberProfile" id="exampleApartmentNumber" name="apartment_number" value="{{Auth::user()->apartment_number}}">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleVillage">Đường/Phố/Làng</label>
                         <input type="text" class="form-control villageProfile" id="exampleVillage" name="village" value="{{Auth::user()->village}}">
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleWards">Phường/Xã</label>
                         <input type="text" class="form-control wardsProfile" id="exampleWards" name="wards" value="{{Auth::user()->wards}}">
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleDistrict">Quận/Huyện</label>
                         <input type="text" class="form-control districtProfile" id="exampleDistrict" name="district" value="{{Auth::user()->district}}">
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                         <label for="exampleCity">Thành Phố</label>
                         <input type="text" class="form-control cityProfile" id="exampleCity" name="city" value="{{Auth::user()->city}}">
                     </div>
                     <div class="col-sm-2 mb-3 mb-sm-0">
                        <label for="exampleAvatar">hình đại diện</label>
                        <input type="hidden" class="imageBeforeProfile" name="imageBefore" value="{{Auth::user()->avatar}}">
                        <input type="file" class="form-control avatarProfile" id="avatarNew" name="avatar">
                    </div>
                    @if (!empty(Auth::user()->avatar))
                        <div class="col-sm-2 mb-3 mb-sm-0 image-upload-profile">
                            <button type="button" class="btn btn-danger delete-image-profile"><i class="fas fa-trash-alt"></i></button>
                            <img class="img-thumbnail image-old-display" src="{{ asset(Auth::user()->avatar) }}">
                        </div>
                    @endif
                 </div>
             </form>
         </div>
         <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal" data-toggle="modal" data-target="#changePasswordModal">Đổi mật khẩu</button>
             <button type="button" class="btn btn-primary update-profile-admin">Cập nhật thông tin</button>
         </div>
     </div>
 </div>
</div>

  <!-- Logout Modal-->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0"> 
                    <label for="floatingInput">Mật khẩu cũ</label>
                    <input type="password" name="passwordBefore" class="form-control passwordBeforeProfile">
                    <span class="text-danger passwordBefore-error"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0"> 
                    <label for="floatingInput">Mật khẩu mới</label>
                    <input type="password" name="passwordAfter" class="form-control passwordAfterProfile">
                    <span class="text-danger passwordAfter-error"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0"> 
                    <label for="floatingInput">Nhập lại mật khẩu mới</label>
                    <input type="password" name="againPasswordAfter" class="form-control againPasswordAfterProfile">
                    <span class="text-danger againPasswordAfter-error"></span>
                </div>
            </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary change-password-admin">Cập nhật mật khẩu</button>
          </div>
      </div>
  </div>
</div>