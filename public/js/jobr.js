
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
