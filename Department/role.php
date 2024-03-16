<?php
	session_start();
	if($_SESSION["role"]!="department" && $_SESSION["role"]!="centre")
	{
		    header('Location: https://nivahika.nitc.ac.in/');
	}

?>