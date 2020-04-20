<?PHP
session_start();

$_SESSION['test'] = 1;

echo $_SESSION['test'];