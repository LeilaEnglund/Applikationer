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



<?php

if (isset($_SESSION['username'])){

echo "<li><a href='session.php'>Sign Out: " . $name . "<a></li>";
}
else
{
  echo '<li><a href="process.php">Sign In</a></li>'; 
}
?>
 			
</ul>



		<br><!--the br tag makes an line break-->
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				
				
				<!--end of nav. bar-->

					<p class="intro" style="font-size: 40px">Welcome to My Recipes</p>
					<p class="intro">The perfect page for finding your favorite recipes</p>
					<p class="intro"><br></p>
					<p class="intro"><b>Have a look at the menu of the month: <a href="calendar.php">Calendar</a></b></p>

				
				</div>
			</body>

</html>