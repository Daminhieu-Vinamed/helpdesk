/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/admin/question.js ***!
  \****************************************/
$(document).ready(function () {
  var baseUrl = window.location.origin;
  var tableQuestion = $('.table-question').DataTable({
    ajax: {
      type: 'get',
      url: baseUrl + '/admin/questions/get-data'
    },
    columns: [{
      data: 'id',
      name: 'id'
    }, {
      data: 'content',
      name: 'content'
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
    }
  });
  $(document).on('click', '.delete-question', function () {
    var id = $(this).attr('id');
    $.ajax({
      url: baseUrl + "/admin/questions/delete",
      type: 'DELETE',
      data: {
        id: id
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      success: function success(response) {
        alert(response['error']);
        tableQuestion.ajax.reload();
      }
    });
  });
});
/******/ })()
;