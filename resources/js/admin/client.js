$(document).ready(function () {
    if ($('.table-client').length !== 0) {
        var baseUrl = window.location.origin;
        var tableUser = $('.table-client').DataTable({
            ajax: {
                type: 'get',
                url: baseUrl + '/admin/users/get-data',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'employee_code', name: 'employee_code' },
                { data: 'full_name', name: 'full_name' },
                { data: 'username', name: 'username' },
                { data: 'email', name: 'email' },
                { data: 'role', name: 'role' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ],
            retrieve: true,
            language: {
                emptyTable: 'Danh sách hiện tại đang trống',
                info: "Đang hiển thị mục _PAGE_ trên tổng _PAGES_ mục",
                lengthMenu: "Hiển thị _MENU_ bản ghi trên trang",
                search: "Tìm kiếm bản ghi có dữ liệu _INPUT_ trong danh sách",
                paginate: {
                    previous: '<i class="fas fa-chevron-left text-primary"></i>',
                    next: '<i class="fas fa-chevron-right text-primary"></i>',
                },
            }
        });
    
        $(document).on('click', '.delete-user', function () {
            const id = $(this).attr('id');
            $.ajax({
                url: baseUrl + "/admin/users/delete",
                type:'DELETE',
                data: {
                    id: id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert(response['error']);
                    tableUser.ajax.reload();
                },
            })
        });
    }else {
        $(document).on('change', '#exampleAvatar', function (e) {
            const file = e.target.files[0];
            if ($('.image-display').length == 0) {
                var grandFatherContent = $('#exampleAvatar').parent().parent();
                grandFatherContent.append(`<div class="col-sm-4 mb-3 mb-sm-0 image-upload">
                                                <button type="button" class="btn btn-danger delete-image"><i class="fas fa-trash-alt"></i></button>
                                                <img class="img-thumbnail image-display">
                                            </div>`);
            }
            if (file){
                let reader = new FileReader();
                reader.onload = function(event){
                  $('.image-display').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
        $(document).on('click', '.delete-image', function () {
            $('#exampleAvatar').val('');
            if ($('.imageBeforeCreateUser').length > 0) {
                $('.imageBeforeCreateUser').val('');
            }
            $('.image-upload').remove();
        });
        $(document).on('click', '.edit-password', function () {
            $(this).remove();
            $('.update-password').append(`<input type="password" class="form-control" id="examplePassword" name="password">`);
        });
    }
})