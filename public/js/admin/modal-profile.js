/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/admin/modal-profile.js ***!
  \*********************************************/
$(document).ready(function () {
  var baseUrl = window.location.origin;
  $(document).on('click', '#changePasswordProfile', function () {
    var passwordNewProfile = $('.passwordNewProfile');
    var againPasswordProfile = $('.againPasswordProfile');
    passwordNewProfile.empty();
    passwordNewProfile.append("<label for=\"changePasswordProfile\">M\u1EADt kh\u1EA9u kh\u1EA9u m\u1EDBi</label>\n                                    <input type=\"password\" class=\"form-control passwordProfile\" id=\"examplePassword\" name=\"password\">\n                                    <span class=\"text-danger password-error\"></span>");
    againPasswordProfile.append("<label for=\"examplePassword\">Nh\u1EADp l\u1EA1i m\u1EADt kh\u1EA9u m\u1EDBi</label>\n                                    <input type=\"password\" class=\"form-control againPasswordProfile\" id=\"examplePassword\" name=\"againPassword\">\n                                    <span class=\"text-danger again-password-error\"></span>");
    againPasswordProfile.addClass('col-sm-2 mb-3 mb-sm-0');
  });
  $(document).on('change', '#avatarNew', function (e) {
    var file = e.target.files[0];
    if ($('.image-old-display').length == 0) {
      var grandFatherContent = $('#avatarNew').parent().parent();
      grandFatherContent.append("<div class=\"col-sm-4 mb-3 mb-sm-0 image-upload-profile\">\n                                            <button type=\"button\" class=\"btn btn-danger delete-image-profile\"><i class=\"fas fa-trash-alt\"></i></button>\n                                            <img class=\"img-thumbnail image-old-display\">\n                                        </div>");
    }
    if (file) {
      var reader = new FileReader();
      reader.onload = function (event) {
        $('.image-old-display').attr('src', event.target.result);
      };
      reader.readAsDataURL(file);
    }
  });
  $(document).on('click', '.delete-image-profile', function () {
    $('#avatarNew').val('');
    if ($('.imageBeforeProfile').length > 0) {
      $('.imageBeforeProfile').val('');
    }
    $('.image-upload-profile').remove();
  });
  $(document).on('click', '.update-profile-admin', function () {
    formData = new FormData();
    formData.append('employee_code', $('.employeeCodeProfile').val());
    formData.append('username', $('.usernameProfile').val());
    formData.append('email', $('.emailProfile').val());
    formData.append('first_name', $('.firstNameProfile').val());
    formData.append('last_name', $('.lastNameProfile').val());
    formData.append('full_name', $('.fullNameProfile').val());
    formData.append('phone', $('.phoneProfile').val());
    formData.append('birthday', $('.birthdayProfile').val());
    formData.append('role', $('.roleProfile').val());
    formData.append('status', $('.statusProfile').val());
    formData.append('apartment_number', $('.apartmentNumberProfile').val());
    formData.append('village', $('.villageProfile').val());
    formData.append('wards', $('.wardsProfile').val());
    formData.append('district', $('.districtProfile').val());
    formData.append('city', $('.cityProfile').val());
    formData.append('imageBefore', $('.imageBeforeProfile').val());
    formData.append('avatar', $('.avatarProfile')[0].files[0]);
    $.ajax({
      url: baseUrl + "/admin/profile/update",
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(response) {
        alert('Cập nhật thông tin tài khoản thành công !');
        window.location.reload();
      },
      error: function error(response) {
        var error = response.responseJSON.errors;
        error.employee_code ? $('.employee_code-error').text(error.employee_code[0]) : $('.employee_code-error').text('');
        error.username ? $('.username-error').text(error.username[0]) : $('.username-error').text('');
        error.email ? $('.email-error').text(error.email[0]) : $('.email-error').text('');
        error.first_name ? $('.first_name-error').text(error.first_name[0]) : $('.first_name-error').text('');
        error.last_name ? $('.last_name-error').text(error.last_name[0]) : $('.last_name-error').text('');
        error.full_name ? $('.full_name-error').text(error.full_name[0]) : $('.full_name-error').text('');
        error.role ? $('.role-error').text(error.role[0]) : $('.role-error').text('');
        error.status ? $('.status-error').text(error.status[0]) : $('.status-error').text('');
      }
    });
  });
  $(document).on('click', '.change-password-admin', function () {
    var passwordBefore = $('.passwordBeforeProfile').val();
    var passwordAfter = $('.passwordAfterProfile').val();
    var againPasswordAfter = $('.againPasswordAfterProfile').val();
    $.ajax({
      url: baseUrl + "/admin/profile/change-password",
      type: 'POST',
      data: {
        passwordBefore: passwordBefore,
        passwordAfter: passwordAfter,
        againPasswordAfter: againPasswordAfter
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(response) {
        alert('Thay đổi mật khẩu thành công !');
        window.location.reload();
      },
      error: function error(response) {
        var error = response.responseJSON.errors;
        error.passwordBefore ? $('.passwordBefore-error').text(error.passwordBefore[0]) : $('.passwordBefore-error').text('');
        error.passwordAfter ? $('.passwordAfter-error').text(error.passwordAfter[0]) : $('.passwordAfter-error').text('');
        error.againPasswordAfter ? $('.againPasswordAfter-error').text(error.againPasswordAfter[0]) : $('.againPasswordAfter-error').text('');
      }
    });
  });
});
/******/ })()
;