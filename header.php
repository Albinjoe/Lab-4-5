<DOCTYPE! html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, user-scalable=no">
	   	<link href="css/main.css" type="text/css" rel="stylesheet" />
	   	<script type="text/javascript" src="js/jquery.js"></script>
	   	<script type="text/javascript" src="js/myscripts.js"></script>
	    <title>Lab4</title>
	</head>

	<?php 
		include ("sessionHijacking.php");
	?>

	<body>
		<div id="mainmaster">
			<header>
				<a href="#"><img id="logo" src="img/logo.png"></a>
				<a href="#" class="showmenu"><img id="hamburger" src="img/hamburger.png"></a>
					<nav class="navigation">
						
						<ul>
							<li>
								<a id="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : NULL ?>" href="index.php">HOME</a>
							</li>
							<li>
								<a id="<?php echo ($current_page == 'aboutus.php') ? 'active' : NULL ?>" href="aboutus.php">ABOUT US</a>
							</li>
							<li>
								<a id="<?php echo ($current_page == 'browsbooks.php') ? 'active' : NULL ?>" href="browsbooks.php">BROWS BOOKS</a>
							</li>
							<li>
								<a id="<?php echo ($current_page == 'reservedbooks.php') ? 'active' : NULL ?>" href="reservedbooks.php">MY BOOKS</a>
							</li>
							<li>
								<a id="<?php echo ($current_page == 'gallery.php') ? 'active' : NULL ?>" href="gallery.php">GALLERY</a>
							</li>
							<li>
								<a id="<?php echo ($current_page == 'contactus.php') ? 'active' : NULL ?>" href="contactus.php">CONTACT</a>
							</li>
							
						</ul>		
					</nav>				
			</header>

			<!--How to get the current page?
			#first you assign the URI (which is the end of the URL as we talked on the Lecture 2)
			#You get that by using the superglobal $_SERVER['REQUEST_URI']
			#then you create a new variable $strings which contains every string seperated by a "/" from the $url - hard to follow, ha?
			#now that you have all strings-->
			