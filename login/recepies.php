<?php
session_start();
$name=$_SESSION['username'];
?>

<html>
	<head>
	
	<link rel="stylesheet" type="text/css" href="sem1.css"> <!--this linkes the css file-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>Tasty Recipes</title> 
	</head>

<body> <!--the code must be inside the body-->

		<div class="bg2">
				<!--this code represent the navigationbar sorce:xhttps://www.w3schools.com/css/css_navbar.asp -->
				<ul class="navbar">
 	 			<li><a href="sem1.php">Home</a></li>
  				<li><a class="active" href="recepies.php">Recipes</a></li>
  				<li><a href="calendar.php">Calendar</a></li>
<li>
<?php

if (isset($_SESSION['username'])){

echo "<li><a href='session.php'>Sign Out: " . $name . "<a></li>";
}
else
{
  echo '<li><a href="process.php">Sign In</a></li>'; 
}
?>
</li>
				</ul>
					<br>
<div class="div2">
					<h1 class="head">Recipe collection</h1>

					<br>
					<br>

				<a class="style" href="meatballs.php">Meatballs</a>
				<br>
				<br>
				<br>

				<a class="style" href="panncakes.php">Pancakes</a>

		</div>
		</div>
</body>
</html>