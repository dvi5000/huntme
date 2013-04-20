// Page slider function
$(window).load(function() {
	$('.slider').flexslider({
		animation: "slide",
		slideshow: false,
		animationLoop: false, //add "disabled" classes at either end
		controlNav: true,
		manualControls: ".menu li a", //The number of elements in your controlNav should match the number of slides/tabs
		controlsContainer: ".slider-container",
		after: function() {
			var marg = $('ul.flex-direction-nav li:first-child a').attr('class');
			
			if(marg == 'prev disabled')
		{
			$('h1.logo, ul.menu, ul.socmed, .buynow').animate({'top': '-80px'},180);
		}
			else {
				$('h1.logo, ul.menu, ul.socmed, .buynow').animate({'top': '0px'},180);
			}
		}
	});
});

// Gallery slideshow function - slidesJS
$(function(){
	$('#products').slides({
		preload: true,
		preloadImage: '../images/loading.gif',
		effect: 'slide', //slide or fade
		//crossfade: true,
		//slideSpeed: 200,
		//fadeSpeed: 500,
		generateNextPrev: false, //enable or disable Next-Prev
		generatePagination: false
	});
});

// Team profile toggle function
$(document).ready(function() {
	
	var team_info = $('.team > ul > li > .infoContainer'),
		team_a  = $('.team > ul > li > a');
	 
		team_info.hide();
	 
		team_a.click(function(e) {
			e.preventDefault();
			if(!$(this).hasClass('active')) {
				team_a.removeClass('active');
				team_info.filter(':visible').fadeOut('slow');
				$(this).addClass('active').next().stop(true,true).fadeIn('slow');
			} else {
				$(this).removeClass('active');
				$(this).next().stop(true,true).fadeOut('slow');
			}
	});
});


// Custom Javascript form team page by Shelby Burrus, programming genious ;-P
$(document).click(function(event) { 
	$('.team ul li').each(function()
		{
		if($(event.target).parents().index($(this)) == -1) {
			if($(this).is(":visible")) {
				$(this).children('span').fadeOut('slow')
				$(this).children('a').removeClass('active');
			}
		}
	});
});

// Contact form validation
$(document).ready(function() {
	$("#contactForm").validationEngine({scroll: false});
    $.get('libs/token.php',function(txt){
    		$('form').append('<input type="hidden" name="ts" value="'+txt+'"/>');
        });
                    
    $('#submit').click(function() {
    	if($('#contactForm').validationEngine('validate') == true) {
        	$.post('php/sendform.php',$('#contactForm').serializeArray(),function(data){
        	if(data.success == true)
            	{
            		$('form#contactForm').slideUp("fast", function() {				   
                    	$(this).before('<p class="result"><strong>¡Gracias!</strong> Tu mensaje ha sido enviado. Trataremos de responder a la brevedad.</p>');
                    });
                }
            },'json');
        }
	});
});