/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/js/client/modal-profile.js ***!
  \**********************************************/
$(document).ready(function () {
  var baseUrl = window.location.origin;
  $(document).on('change', '#avatar', function (e) {
    var file = e.target.files[0];
    if ($('.image-display-update-user-client').length == 0) {
      var grandFatherImage = $(this).parent().parent().parent();
      grandFatherImage.append("<div class=\"col-lg-3 col-md-6 col-12 image-upload-update-user-client\">\n                                    <button type=\"button\" class=\"btn btn-danger delete-image-update-user-client\"><i class=\"fas fa-trash-alt\"></i></button>\n                                    <img class=\"img-thumbnail image-display-update-user-client\">\n                                </div>");
    }
    if (file) {
      var reader = new FileReader();
      reader.onload = function (event) {
        $('.image-display-update-user-client').attr('src', event.target.result);
      };
      reader.readAsDataURL(file);
    }
  });
  $(document).on('click', '.delete-image-update-user-client', function () {
    $('input[name="imageBefore"]').val('');
    $('#avatar').val('');
    $('.image-upload-update-user-client').remove();
  });
  $(document).on('click', '.update-profile-client', function () {
    formData = new FormData();
    formData.append('employee_code', $('input[name="employee_code"]').val());
    formData.append('first_name', $('input[name="first_name"]').val());
    formData.append('last_name', $('input[name="last_name"]').val());
    formData.append('full_name', $('input[name="full_name"]').val());
    formData.append('username', $('input[name="username"]').val());
    formData.append('birthday', $('input[name="birthday"]').val());
    formData.append('apartment_number', $('input[name="apartment_number"]').val());
    formData.append('village', $('input[name="village"]').val());
    formData.append('wards', $('input[name="wards"]').val());
    formData.append('district', $('input[name="district"]').val());
    formData.append('city', $('input[name="city"]').val());
    formData.append('imageBefore', $('input[name="imageBefore"]').val());
    formData.append('avatar', $('input[name="avatar"]')[0].files[0]);
    formData.append('phone', $('input[name="phone"]').val());
    formData.append('email', $('input[name="email"]').val());
    $.ajax({
      url: baseUrl + "/user/update-profile",
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
      }
    });
  });
  $(document).on('click', '.change-password-client', function () {
    var passwordBefore = $('input[name="passwordBefore"]').val();
    var passwordAfter = $('input[name="passwordAfter"]').val();
    var againPasswordAfter = $('input[name="againPasswordAfter"]').val();
    $.ajax({
      url: baseUrl + "/user/change-password",
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