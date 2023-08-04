/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/ticket.js ***!
  \**************************************/
$(document).ready(function () {
  if ($('.table-ticket').length !== 0) {
    var baseUrl = window.location.origin;
    var tableTicket = $('.table-ticket').DataTable({
      ajax: {
        type: 'get',
        url: baseUrl + '/admin/tickets/get-data'
      },
      columns: [{
        data: 'id',
        name: 'id'
      }, {
        data: 'question',
        name: 'question'
      }, {
        data: 'title',
        name: 'title'
      }, {
        data: 'user_send',
        name: 'user_send'
      }, {
        data: 'user_handler',
        name: 'user_handler'
      }, {
        data: 'status',
        name: 'status'
      }, {
        data: 'action',
        name: 'action'
      }],
      retrieve: true,
      language: {
        emptyTable: 'Danh sách hiện tại đang trống',
        info: "Đang hiển thị mục _PAGE_ trên tổng _PAGES_ mục",
        lengthMenu: "Hiển thị _MENU_ bản ghi trên trang",
        search: "Tìm kiếm bản ghi có dữ liệu _INPUT_ trong danh sách",
        paginate: {
          previous: '<i class="fas fa-chevron-left text-primary"></i>',
          next: '<i class="fas fa-chevron-right text-primary"></i>'
        }
      },
      columnDefs: [{
        targets: [1, 2, 3, 4],
        render: function render(data, type, row) {
          return type === 'display' && data.length > 40 ? data.substr(0, 40) + '…' : data;
        }
      }]
    });
    $(document).on('click', '.delete-ticket', function () {
      var id = $(this).attr('id');
      $.ajax({
        url: baseUrl + "/admin/tickets/delete",
        type: 'DELETE',
        data: {
          id: id
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function success(response) {
          alert(response['error']);
          tableTicket.ajax.reload();
        }
      });
    });
  } else {
    $(document).on('change', '#exampleAvatar', function (e) {
      var file = e.target.files[0];
      var parentContent = $('#exampleInputContent').parent();
      parentContent.attr('class', 'col-sm-6 mb-3 mb-sm-0');
      if ($('.image-display').length == 0) {
        var grandFatherContent = $('#exampleInputContent').parent().parent();
        grandFatherContent.append("<div class=\"col-sm-6 mb-3 mb-sm-0 image-upload\">\n                                                <button type=\"button\" class=\"btn btn-danger delete-image\"><i class=\"fas fa-trash-alt\"></i></button>\n                                                <img class=\"img-thumbnail image-display\">\n                                            </div>");
      }
      if (file) {
        var reader = new FileReader();
        reader.onload = function (event) {
          $('.image-display').attr('src', event.target.result);
        };
        reader.readAsDataURL(file);
      }
    });
    $(document).on('click', '.delete-image', function () {
      $('#exampleAvatar').val('');
      var parentContent = $('#exampleInputContent').parent();
      parentContent.attr('class', 'col-sm-12 mb-3 mb-sm-0');
      if ($('input[name="imageBefore"]').length > 0) {
        $('input[name="imageBefore"]').val('');
      }
      $('.image-upload').remove();
    });
  }
});
/******/ })()
;