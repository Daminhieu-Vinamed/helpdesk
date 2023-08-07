$(document).ready(function () {
    var baseUrl = window.location.origin;
    $(document).on('click', '.update-user-client', function () {
        formData = new FormData();
        formData.append('id', $('input[name="id"]').val());
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
        formData.append('password', $('input[name="password"]').val());
        $.ajax({
            url: baseUrl + "/user/update",
            type:'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert('Cập nhật thông tin tài khoản thành công !');
            },
            error: function (response) {
                var error = response.responseJSON.errors;
                error.employee_code ? $('.employee_code-error').text(error.employee_code[0]) : $('.employee_code-error').text('');
                error.username ? $('.username-error').text(error.username[0]) : $('.username-error').text('');
                error.email ? $('.email-error').text(error.email[0]) : $('.email-error').text('');
                error.first_name ? $('.first_name-error').text(error.first_name[0]) : $('.first_name-error').text('');
                error.last_name ? $('.last_name-error').text(error.last_name[0]) : $('.last_name-error').text('');
                error.full_name ? $('.full_name-error').text(error.full_name[0]) : $('.full_name-error').text('');
                error.password ? $('.password-error').text(error.password[0]) : $('.password-error').text('');
            }
        })
    });
});