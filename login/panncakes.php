<?php
session_start();
require('connect.php');

$name=$_SESSION['username'];
$comment=$_POST['comment'];


if($_SERVER["REQUEST_METHOD"] == "POST"){
	if($comment != "")
	{

		$insert=mysqli_query($link, "INSERT INTO comment (name,comment, recipe) VALUES ('$name', '$comment', 'pancakes')");

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
<div class="div3">
						<br>
						<br>
						<h2>Pancakes</h2>
						<br>

					<pre>100g plain flour</pre>
					<pre>2 eggs</pre>
					<pre>300ml semi-skimmed milk</pre>
					<pre>1 tbsp sunflower oil or vegetable, plus extra for frying</pre>
					<pre>pinch salt</pre>
						
						<br>
						<br>
						<h2>Description:</h2>
						<br>
<pre>1. Put the flour and a pinch of salt into a large mixing bowl. 
Make a well in the centre and crack the eggs into the middle. 
Pour in about 50ml milk and 1 tbsp oil. Start whisking from the centre, 
gradually drawing the flour into the eggs, milk and oil. 
Once all the flour is incorporated, beat until you have a smooth, thick paste. 
Add a little more milk if it is too stiff to beat.</pre>
						<br>
						<br>
<pre>2. Add a good splash of milk and whisk to loosen the thick batter. 
While still whisking, pour in a steady stream of the remaining milk. 
Continue pouring and whisking until you have a batter that is the 
consistency of slightly thick single cream.</pre>
						<br>
						<br>
<pre>3. Heat the pan over a moderate heat, then wipe it with oiled kitchen paper. 
Ladle some batter into the pan, tilting the pan to move the mixture around for a thin and even layer. 
Quickly pour any excess batter into a jug, return the pan to the heat, then leave to cook, undisturbed, 
for about 30 secs. Pour the excess batter from the jug back into the mixing bowl. 
If the pan is the right temperature, the pancake should turn golden underneath 
after about 30 secs and will be ready to turn.</pre>
						<br>
						<br>
<pre>4. Hold the pan handle, ease a palette knife under the pancake, 
then quickly lift and flip it over. Make sure the pancake is lying flat 
against the base of the pan with no folds, then cook for another 30 secs 
before turning out onto a warm plate. Continue with the rest of the batter, 
serving them as you cook or stack onto a plate. You can freeze the 
pancakes for 1 month, wrapped in cling film or make them up to a day ahead.</pre>
						<br>
						<br>
						<img class="pic" src="pannkakor.jpg" alt="pancakes">

						<br>
						<br>
<a href="recepies.html">Back to recipes</a>
<hr>
<br>
<br>
Please wite a comment about this recipe
<br>
<br>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

				<table>
					
					<tr><td colspan="2"><h1><u>Comment:</u></h1>

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


$query = "SELECT * FROM comment WHERE recipe = 'pancakes' ORDER by ID DESC";

$result = mysqli_query($link, $query); 
    
    while ($row = mysqli_fetch_assoc($result)) {
    	echo "<br>";

        printf ("(%s) %s\n", $row["name"], $row["comment"]);

        if (($_SESSION['username']) === $row['name']){


        echo "<a href='delete_pancakes.php?id=" . $row['id'] . "'>Delete</a>";
       }
    }

?>
</td>
</tr>
</table>
</form>
</div>
</div>
		
			</body>
</html>