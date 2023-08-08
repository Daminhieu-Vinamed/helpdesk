/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/client/modal.js ***!
  \**************************************/
$(document).ready(function () {
  $(document).on('change', '#avatar', function (e) {
    var file = e.target.files[0];
    if ($('.image-display-update-user-client').length == 0) {
      var grandFatherImage = $(this).parent().parent().parent();
      grandFatherImage.append("<div class=\"col-lg-4 col-md-6 col-12 image-upload-update-user-client\">\n                                  <button type=\"button\" class=\"btn btn-danger delete-image-update-user-client\"><i class=\"fas fa-trash-alt\"></i></button>\n                                  <img class=\"img-thumbnail image-display-update-user-client\">\n                                </div>");
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
  $(document).on('click', '.btn-change-password', function () {
    $grandFatherPassword = $(this).parent().parent();
    $grandFatherPassword.empty();
    $grandFatherPassword.append("<div class=\"form-floating\">\n                                        <input type=\"password\" name=\"password\" class=\"form-control\">\n                                        <label for=\"floatingInput\">M\u1EADt kh\u1EA9u m\u1EDBi</label>\n                                        <span class=\"text-danger password-error\"></span>\n                                    </div>");
    $('.enter-again-password').addClass('col-lg-3 col-md-6 col-12');
    $('.enter-again-password').append("<div class=\"form-floating\">\n                                            <input type=\"password\" name=\"againPassword\" class=\"form-control\">\n                                            <label for=\"floatingInput\">Nh\u1EADp l\u1EA1i m\u1EADt kh\u1EA9u m\u1EDBi</label>\n                                            <span class=\"text-danger again-password-error\"></span>\n                                        </div>");
  });
});
/******/ })()
;