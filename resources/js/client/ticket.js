$(document).ready(function () {
  $(document).on('change', '#image', function (e) {
    const file = e.target.files[0];
    if ($('.image-display-create-ticket-client').length === 0) {
      var grandFatherImage = $('.image-upload-create-ticket-client').addClass('mb-4');
      grandFatherImage.append(`<button type="button" class="btn btn-danger delete-image-create-ticket-client">
                                                      <i class="fas fa-trash-alt"></i>
                                                      </button>
                                                      <img class="img-thumbnail image-display-create-ticket-client">`);
    }
    if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          $('.image-display-create-ticket-client').attr('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
  });
  $(document).on('click', '.delete-image-create-ticket-client', function () {
    $('#image').val('');
    $('.image-upload-create-ticket-client').empty();
  });
});