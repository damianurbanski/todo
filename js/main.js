$(function(){
"use strict";
if(!window.history){
	alert("Not supported");
}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};



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

						});

	         });


$("body").on("click tap",".show-task-wrapper",function(){
$(".add-task-input-wrapper").toggleClass("hidden");
$(this).toggleClass('hidden');
}).on("click tap",".hide-task-wrapper",function(){
$(".add-task-input-wrapper").addClass("hidden");
$(".show-task-wrapper").toggleClass('hidden');
});






}());
