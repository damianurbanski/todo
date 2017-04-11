$(function(){
"use strict";
var forms = '.ajax-add-task';
var loader = '...';
var url = 'modules/add-task'
$(document).on('submit',forms,function(e){
	e.preventDefault();
	var trigger = $(this);
  	var button = $(this).find('.ajax-submit');
  	var state = $('.ajax-add-task-state');
$.ajax({
  type: "POST",
  url: url,
  data: trigger.serialize(),
  beforeSend: function() {
    button.html('<span class="loader"></span>').addClass('disabled');
  }
})
  .done(function( data ) {
    if ( data=='true') {
		state.addClass('succes');
    
    }
    else if(data=='false'){
    	state.addClass('error');
    }
   button.html('Zapisz').removeClass('disabled');
   sync();
  })
});
}());
