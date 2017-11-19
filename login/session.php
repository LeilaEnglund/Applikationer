<?php
session_start();
	
    unset($_SESSION["username"]);
    session_destroy();
    header('Location: startpage_login.php');


?>