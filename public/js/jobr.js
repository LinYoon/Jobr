
function applyFilter(){
  console.log("neki1");
  $.ajax( {
      type: "GET",
      url: $('#filters').attr('action'),
      data: $('#filters').serialize(),
      success: function( data ) {
        $('#job-list').html(data);
        console.log("neki2");
      }
    } );
}


function changeUserPic(event){
  event.preventDefault();
  $('#pic-input').click();
}

function updatePicPreview(input){
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#pic').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
