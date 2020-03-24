<?PHP 

// set the expiration date to one hour ago
setcookie('id', "", time() - 3600);


header("Location: http://www.eatsmenu.com/index.php?lo=1"); /* Redirect browser to log in page*/

?>