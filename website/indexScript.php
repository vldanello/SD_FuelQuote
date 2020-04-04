<?php
session_start();
ini_set("display_errors",E_ALL);
include "Database.php";
extract($_POST);

$db = new Database();

$sql = "SELECT * FROM users WHERE userName = '$userName' AND password = '$password' ";

$db->query($sql);
$result = $db->single();
   
if ($result) {
setcookie('id',$result->id,time()+(60*60),'/');

     header("Location: http://www.eatsmenu.com/dashboard.php"); /* Redirect browser */
} else {
	header("Location: http://www.eatsmenu.com/index.php?wp=1"); /* Wrong password, Go back to the same page  */
    exit();
    }
