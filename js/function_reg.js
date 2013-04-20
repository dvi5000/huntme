// Page slider function
$(window).load(function() {
	$('.slider').flexslider({
		animation: "slide",
		slideshow: false,
		animationLoop: false, //add "disabled" classes at either end
		controlNav: true,
		manualControls: ".menu li a", //The number of elements in your controlNav should match the number of slides/tabs
		controlsContainer: ".slider-container"
	});
});

$(document).ready(function() {
	$('h1.logo, ul.socmed, .buynow').animate({'top': '0px'},180);
});

// Contact form validation
$(document).ready(function() {
	$("#login_form").validationEngine({
		scroll: false,
		ajaxFormValidation: true,
		ajaxFormValidationMethod: 'post',
		onAjaxFormComplete: ajaxValidationCallback
	});
    $.get('libs/token.php',function(txt){
    		$('form').append('<input type="hidden" name="ts" value="'+txt+'"/>');
        });
});

function ajaxValidationCallback(status, form, json, options){
	if (status === true) {
		form.validationEngine('detach');
		$.post('php/sendReg.php',$('#login_form').serializeArray(),function(data){
	    	if(data.success == true)
	        	{
	        		$('form#login_form').slideUp("fast", function() {				   
	                	$(this).before('<p class="result"><strong>¡Bienvenido a HuntMe!</strong> En poco tiempo comenzarás a recibir ofertas.</p>');
	                });
	            }
	        },'json');
	}
}