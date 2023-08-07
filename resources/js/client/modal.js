$(document).ready(function () {
    $(document).on('change', '#avatar', function (e) {
      const file = e.target.files[0];
      if ($('.image-display').length == 0) {
          var grandFatherImage = $(this).parent().parent().parent();
          grandFatherImage.append(`<div class="col-lg-4 col-md-6 col-12 image-upload">
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
      $('input[name="imageBefore"]').val('');
      $('.image-upload').remove();
    });
  });