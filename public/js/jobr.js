var relUrl = window.location.pathname;
var splitUrl = relUrl.split("/");

if (splitUrl[splitUrl.length - 1] != "") {
    $(".navbar-default").css("background", "linear-gradient(to right, rgba(33,147,176,1) 0%,rgba(109,213,237,1) 100%)");
    $(".navbar-default").each(function () {
        this.style.setProperty( 'padding-top', '0', 'important' );
        this.style.setProperty( 'height', '70px', 'important' );
    });
}

function applyFilter(){
  $.ajax( {
      type: "GET",
      url: $('#filters').attr('action'),
      data: $('#filters').serialize(),
      success: function( data ) {
        $('#job-list').html(data); 
      }
  });
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

