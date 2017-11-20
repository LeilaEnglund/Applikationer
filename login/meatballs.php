<?php
session_start();
require('connect.php');

$name=$_SESSION['username'];
$comment=$_POST['comment'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if($comment != "")
	{

		$insert=mysqli_query($link, "INSERT INTO comment (name,comment, recipe) VALUES ('$name', '$comment', 'meatballs')");

	}	
	else
	{

		echo "Please fill out all the fields";
	}

}

?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" type="text/css" href="sem1.css"> <!--this linkes the css file-->

		<title>Tasty Recipes</title> 
	</head>

			<body> <!--the code must be inside the body-->
		<div class="bg3">
<!--this code represent the navigationbar sorce:xhttps://www.w3schools.com/css/css_navbar.asp -->
				
				<ul class="navbar">
 	 			<li><a href="sem1.php">Home</a></li>
  				<li><a class="active" href="recepies.php">Recipes</a></li>
  				<li><a href="calendar.html">Calendar</a></li>
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
				
<div class="div3">

					<br>
					<br>

					<h2>Meatballs</h2>
						<br>
					<pre>2 tbsp olive oil</pre>
					<pre>150g/5oz onion, finely chopped</pre>
					<pre>1 clove garlic, crushed</pre>
					<pre>900g/2lb freshly minced beef</pre>
					<pre>2 tbsp freshly chopped herbs, such as marjoram, or 1 tbsp rosemary</pre>
					<pre>1 free-range egg, beaten</pre>
					<pre>salt and freshly ground black pepper</pre>
					<pre>3 tbsp olive oil</pre>
						<br>
						<br>

						<h2>Description:</h2>
						<br>
<pre>1. In a medium sized bowl combine ground beef, panko, parsley, allspice,
nutmeg, onion, garlic powder, pepper, salt and egg. Mix until combined.</pre>
						<br>
						<br>
<pre>2. Roll into 12 large meatballs or 20 small meatballs. In a large skillet heat
olive oil and 1 Tablespoon butter. Add the meatballs and cook turning continuously until
brown on each side and cooked throughout. Transfer to a plate and cover with foil.</pre>
						<br>
						<br>
<pre>3. Add 4 Tablespoons butter and flour to skillet and whisk until it turns brown.
Slowly stir in beef broth and heavy cream. Add worchestershire sauce and dijon
mustard and bring to a simmer until sauce starts to thicken. Salt and pepper to taste.</pre>
						<br>
						<br>
<pre>4. Add the meatballs back to the skillet and simmer for another 1-2 minutes.</pre>

						<br>
						<br>
						<img class="pic" src="meat.jpg" alt="meatballs ">
						<br>
						<br>

						<a href="recepies.html">Back to recepies</a>

						<hr>
<br>
<br>
Please wite a comment about this recipe
<br>
<br>


				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

				<table>
					
					<tr><td colspan="4"><h1><u>Comment:</u></h1>

<?php
if (isset($_SESSION['username'])){

echo '
<br>
<textarea name="comment"></textarea>
<br>
<input type="submit" class="btn btn-primary" value="submit"> <br>';
}

else
{
  echo "<b>Login to comment</b>"; 
}


$query = "SELECT * FROM comment WHERE recipe = 'meatballs' ORDER by ID DESC";

$result = mysqli_query($link, $query); 
    
    while ($row = mysqli_fetch_assoc($result)) {
    	echo "<br>";

        printf ("(%s) %s\n", $row["name"], $row["comment"]);

        if (($_SESSION['username']) === $row['name']){


        echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";
       }
    }


?>

</div>	
</div>		
			</body>
</html>