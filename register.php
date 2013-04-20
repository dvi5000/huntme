<?php require_once 'php/db_conn.php'; $mysqli = getConn(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title class="editable" alt="Page Title">HuntMe</title>
    <!-- Copyright Theme Design by OnePageTheme: http://onepagetheme.com -->
	<!-- Insert META DATA here: description, keywords, author, etc.; remove comment below to use. -->
        <!--
        <meta name="description" content="Insert your description here" />
        <meta name="keywords" content="Insert, your, keywords, here" />
        <meta name="robots" content="all" />
        <meta name="author" content="OnePageTheme" />
        <meta name="owner" content="OnePageTheme" />
        <meta name="copyright" content="Copyright &copy; 2012 OnePageTheme" />
        <meta name="language" content="en-us" />
        <meta name="revisit-after" content="7" />
        <meta name="rating" content="general" />
        <meta name="distribution" content="global" />
        -->
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- We are using 1140 Grid System. For more info: http://cssgrid.net/ -->
    
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" /><![endif]-->
    
    <!-- HTML5 defaults, DO NOT MODIFY --> 
		<link rel="stylesheet" href="css/html5.css" type="text/css" media="screen" />
	<!-- The 1140px Grid (base, load first), DO NOT MODIFY -->
		<link rel="stylesheet" href="css/1140.css" type="text/css" media="screen" />
    <!-- Slider default stylesheet, DO NOT MODIFY -->
		<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />
	<!-- Theme default stylesheet, DO NOT MODIFY -->    
    	<link rel="stylesheet" href="css/theme.css" type="text/css" media="screen" />
    <!-- Use custom.css for your custom theme styling, YOU CAN MODIFY -->
		<link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" />
    <!-- Google Webfonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css' />
    <!-- Contact form validation CSS -->
		<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" />
	<!-- Optional Favicon here; remove comment below to use favicon. -->   	
        <link rel="shortcut icon" href="favicon.ico" />
		<link rel="icon" type="image/x-icon" href="favicon.ico" />
        
    <!-- Do not remove this script -->
    	<script src="js/modernizr-2.6.2.min.js"></script>

</head>

<body>
<!-- Prompt IE 6 users to install Chrome Frame -->
<!--[if lt IE 7]><p class="chromeframe">Estás usando un navegador <strong>no soportado</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> o <a href="http://www.google.com/chromeframe/?redirect=true">instala Google Chrome Frame</a> para mejorar tu experiencia.</p><![endif]-->	

	<!--<div id="bg" class="editable" alt="Background image">
		<img src="images/photos/main.jpg" alt="" />
	</div> #bg .editable -->

	<header>
    	<div class="container editable" alt="Header">
            <h1 class="logo"><a href="index.php"><img class="logo" src="images/logo.png" /></a></h1>
            <ul class="socmed">
                <li id="fb"><a href="http://facebook.com/huntme" target="_blank">facebook</a></li>
                <li id="tw"><a href="http://twitter.com/huntme" target="_blank">twitter</a></li>
            </ul><!-- .socmed -->
        </div><!-- .container editable -->
    </header>

    <section>
        <div class="slider-container">
        	
        	<ul class="menu editable" alt="Menu">
                <li><a>Inicio</a></li>
            </ul><!-- .menu editable -->
            
            <div class="slider">
                <ul class="slides">
                    <li id="slide-one" class="editable">
                        <div class="container ptop">
                            <div class="row">
								<div class="twocol" >
								</div>
								<div class="eightcol" >
									<div class="reg">
	                                	<h1>Cada vez más cerca asdf</h1>
										<p>Ingresa tus datos y pasa a ser parte de HuntMe, la primera red dónde el trabajo te busca a ti.</p> <!-- onsubmit='submitReg()' -->	 									<form method='post' id="login_form" onsubmit='return false' action="php/ajaxValidateSubmit.php">
							                <input type="text" id="name" name="Name" placeholder="NOMBRE" class='validate[required,custom[onlyLetterSp]]' />
											<input type="text" id="lastnames" name="Last" placeholder="APELLIDOS" class='validate[required,custom[onlyLetterSp]]' />
							                <input type="text" id="email" name="Email" placeholder="EMAIL" class='validate[required,custom[email],ajax[ajaxEmailCallPhp]]' />
											<p>Universidad
											<div class="styled-select">
												<select name="uni">
													<?php printOptions(getUnis($mysqli));?>
												</select></p>
											</div>
											<h3>Carrera</h3>
											<select name="career">
												<?php printOptions(getCareers($mysqli));?>
											</select>
											
											<h3>Año de egreso
											<select name="grad_year">
												<?php printYears();?>
											</select>
											</h3>
											<?php printChecks(getExp($mysqli)); $mysqli->close();?>
							                <button type="submit" id="submit_log" class="btn">Enviar</button>
							            </form>
						            	<div class="clear"></div>
									</div>
								</div>
								<div class="twocol" >
								</div>
							</div>
                    	</div><!-- .container -->
                    </li><!-- #slide-one .editable -->
                </ul><!-- .slides -->
            </div><!-- .slider -->
            
        </div><!-- .slider-container -->
    </section>
    
	<section>
		
	</section>

	<!-- Grab Google CDN's jQuery, with a protocol relative URL -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
    <!-- fall back to local if offline -->
		<script>window.jQuery || document.write('<script src="js/jquery-1.8.3.min.js"><\/script>')</script>
    <!-- css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers -->
		<script src="js/css3-mediaqueries.js" type="text/javascript" ></script>
    <!-- Page slider script -->
		<script src="js/jquery.flexslider-min.js" type="text/javascript" ></script>
    <!-- Gallery slideshow script -->
		<script src="js/slides.min.jquery.js" type="text/javascript" ></script>
	<!-- jQuery functions -->
		<script src="js/function_reg.js" type="text/javascript" ></script>
   	<!-- Contact form validation scripts -->
        <script src="js/jquery.validationEngine.js" type="text/javascript"></script>
        <script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>

<!-- Google Analytics tracking code. Change UA-XXXXXXX-X to your site's ID -->
<script type="text/javascript" class="editable" alt="Google Analytics Tracking Code. Replace below with your tracking code">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20712209-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
        
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->    
</body>
</html>