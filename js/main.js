$(function(){
"use strict";


				var trigger = {}
	         $("body").on("click", ".submenu-toggle" , function(e){
	        	e.preventDefault();
	        	var input = $(this).siblings('input');
	        	trigger = $(this);
	        	var targetMenu = $(this).attr("submenu-target");
	        	$(targetMenu)
				    	.css({
				    	left: trigger.offset().left,
				    	top: trigger.offset().top+trigger.outerHeight()
						})
						.toggleClass("active")
						.on("click tap","[submenu-value]",function(e){

								var value = $(this).attr("submenu-value");
							trigger.siblings("[submenu-val-holder]").attr("value",value);
							trigger.alterClass('priority-*');
							trigger.addClass('priority-'+value);
							$(targetMenu).removeClass("active");
						});

	         });


$('#sidebar-toggle').on('tap click', function(){
$('#profile-sidebar').toggleClass('active');
});

$('.icon-cancel').on('tap click', function(){
$('#profile-sidebar').toggleClass('active');
});



}());
