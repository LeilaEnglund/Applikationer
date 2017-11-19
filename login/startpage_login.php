<?php
session_start();
$name=$_SESSION['username'];
?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="sem1.css"> <!--this linkes the css file-->
	
		<title>Tasty Recipes</title> 
	</head>
			<body> <!--the code must be inside the body-->

				<!--this code represent the navigationbar sorce:xhttps://www.w3schools.com/css/css_navbar.asp -->
				<div class="bg">
				<ul class="navbar"> <!--the ul tag represents an unordered list-->
 	 			<li><a class="active" href="sem1.php">Home</a></li><!--the li tag represents a list-->
  				<li><a href="recepies.php">Recipes</a></li><!--the a tag represents a link to another page-->
  				<li><a href="calendar.php">Calendar</a></li>
  				
<li>
<?php

if (isset($_SESSION['username'])){

echo '<a href="session.php">Sign Out</a>'.$name;
}

else
{
  echo '<li><a href="process.php">Sign In</a></li>'; 
}
?>
</li>

				</ul>
				<br><!--the br tag makes an line break-->
				
				<!--end of nav. bar-->

					<h1 class="intro">Welcome to My Recipes</h1>
					<p class="intro">The perfect page for finding your favorite recipes</p>
					<br>
					<p class="intro"><b>Have a look at the menu of the month: <a href="calendar.html">Calendar</a></b></p>


				
				</div>
			</body>

</html>