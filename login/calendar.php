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
<div class="bg4">
<!--this code represent the navigationbar sorce:xhttps://www.w3schools.com/css/css_navbar.asp -->
				<ul class="navbar">
 	 			<li><a href="sem1.php" >Home</a></li>
  				<li><a href="recepies.php">Recipes</a></li>
  				<li><a class="active" href="calendar.php">Calendar</a></li>
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
	
					<H1 class="head">Menu of the month</H1>

					<br>
					<br>

<!-- this code represent the calendar. 
	 each week is represented in an ul under the class "days".
	 for those days that not belongs to the month there is an different class
	 sorce: https://codepen.io/rashidathompson/pen/dGgOwa -->

<div id="calendar-wrap">
  <header>
    <p class="intro">November 2017</p>
    <br>
  </header>
  <div id="calendar">
    <ul class="weekdays">
      <li>Monday</li>
      <li>Tuesday</li>
      <li>Wednesday</li>
      <li>Thursday</li>
      <li>Friday</li>
      <li>Saturday</li>
      <li>Sunday</li>
    </ul>
    
    <ul class="days">
      <li class="day other-month">
        <div class="date">30</div>
      </li>
       <li class="day other-month">
        <div class="date">31</div>
      </li>
      <li class="day">
        <div class="date">1</div>
      </li>
      <li class="day">
        <div class="date">2</div>
          <div class="event-img">
          	<a href="meatballs.php">
          	<img src="meat.jpg" alt="Meatballs"> <!--image-->
          	</a>
          </div>
      </li>
      <li class="day">
        <div class="date">3</div>
      </li>
      <li class="day">
        <div class="date">4</div>
      </li>
      <li class="day">
        <div class="date">5</div>
      </li>
    </ul><!--week 1-->
    
    <ul class="days">
      <li class="day">
        <div class="date">7</div>
      </li>
      <li class="day">
        <div class="date">8</div>
      </li>
      <li class="day">
        <div class="date">9</div>
      </li>
      <li class="day">
        <div class="date">10</div>
      </li>
      <li class="day">
        <div class="date">11</div>
      </li>
      <li class="day">
        <div class="date">12</div>
      </li>
      <li class="day">
        <div class="date">13</div>
      </li>
    </ul><!--week 2-->
    
     <ul class="days">
      <li class="day">
        <div class="date">14</div>
      </li>
      <li class="day">
        <div class="date">15</div>
      </li>
      <li class="day">
        <div class="date">16</div>
      </li>
      <li class="day">
        <div class="date">17</div>
      </li>
      <li class="day">
        <div class="date">18</div>
          <div class="event-img">
          	<a href="panncakes.php">
          	<img src="pannkakor.jpg" alt="panncakes"> <!--image-->
          	</a>
        </div>
      </li>
      <li class="day">
        <div class="date">19</div>
      </li>
      <li class="day">
        <div class="date">20</div>
      </li>
    </ul><!--week 3-->
    
    <ul class="days">
      <li class="day">
        <div class="date">21</div>
      </li>
      <li class="day">
        <div class="date">22</div>
      </li>
      <li class="day">
        <div class="date">23</div>
      </li>
      <li class="day">
        <div class="date">24</div>
      </li>
      <li class="day">
        <div class="date">25</div>
      </li>
      <li class="day">
        <div class="date">26</div>
      </li>
      <li class="day">
        <div class="date">27</div>
      </li>
    </ul><!--week 4-->
    
    <ul class="days">
      <li class="day">
        <div class="date">28</div>
      </li>
      <li class="day">
        <div class="date">29</div>
      </li>
      <li class="day">
        <div class="date">30</div>
      </li>
    </ul><!--week 5-->
  </div><!--calendar-->
</div><!--wrapper-->

</div>
			</body>

</html>