$(function(){
"use strict";
var url = 'modules/delete-project?project-id=';
$(document).on('click tap','.ajax-delete-project',function(e){
  e.preventDefault();
  var trigger = $(e.target);
	if(confirm("Na pewno chcesz usunąć ten projekt?")){
  var uri = url+trigger.attr('data-id');
	$.ajax({
	  type: "GET",
	  url: uri,
	  beforeSend: function() {
	  }
	})
  .done(function( data ) {
        sync();
  });
}
});
}());