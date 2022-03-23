<?php
session_name("legis");
session_start();
include_once("../mysql_connect.php");
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
if(empty($_POST['username']) || empty($_POST['password'])){
$error = "Chybné uživatelské jméno nebo heslo";
}
else
{
//Define $user and $pass
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = hash("sha256", $password);
$query = mysqli_query($conn, "SELECT * FROM uzivatele WHERE password='$password' AND username='$username'");
$rows = mysqli_num_rows($query);
if($rows == 1){
$_SESSION['legis'] = $username;
header("Location: index.php"); // Redirecting to other page
}
else
{
$error = "Chybné uživatelské jméno nebo heslo";
}
mysqli_close($conn); // Closing connection
}
}
?>
