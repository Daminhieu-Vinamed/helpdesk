$(document).ready(function () {
  $(document).on('change', '#image', function (e) {
    const file = e.target.files[0];
    if ($('.image-display').length == 0) {
        var grandFatherContent = $('.image-upload').addClass('mb-4');
        grandFatherContent.append(`<button type="button" class="btn btn-danger delete-image"><i class="fas fa-trash-alt"></i></button>
                                  <img class="img-thumbnail image-display">`);
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
    $('#image').val('');
    $('.image-upload').remove();
  });
});