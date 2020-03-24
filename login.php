<?php
session_start();
ini_set("display_errors",E_ALL);
include "Database.php";
extract($_POST);
$db = new Database();
$sql = "SELECT * FROM users WHERE userName = '$userName'";
$db->query($sql);
$result = $db->single();


	if($result){
		header("Location: http://www.eatsmenu.com/registration.php?ue=1");
	}

    if ($password == $passwordConfirm ) {
		
		

		$sql = "INSERT INTO users (userName,password) VALUES ('$userName', '$password') ";
		$db->query($sql);
		$db->execute();
		
		
		setcookie('id',$db->lastInsertId,time()+(60*60),'/');
		
		header("Location: http://www.eatsmenu.com/profile.php"); /* Redirect browser */
		exit();
	} else {
		header("Location: http://www.eatsmenu.com/registration.php?nm=1"); /* Redirect browser */
		exit();
	}

