$(function(){
"use strict";
var trigger = '.tasks-icon-done',
url = 'modules/done-task?task-id=';
$(document).on('click tap','.tasks-icon-done',function(e){
  e.preventDefault();
  var trigger = $(e.target),
  uri = url+trigger.attr('data-id');
$.ajax({
  type: "GET",
  url: uri,
  beforeSend: function() {
    trigger.parent().addClass('cross');
  }
})
  .done(function( data ) {
      trigger.parent().fadeOut('slow', function() {
        sync();
      });

  });

});
}());