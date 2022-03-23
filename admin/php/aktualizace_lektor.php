<?php
include_once("../../mysql_connect.php");

$error = false;

 if(isset($_POST["id"])){
 $id = mysqli_real_escape_string($conn, $_POST["id"]);
} else {
  $error = true;
}

if(isset($_POST["jmeno"]) && strlen(trim($_POST["jmeno"])) > 0){
 $jmeno = mysqli_real_escape_string($conn, $_POST["jmeno"]);
} else {
  $error = true;
}

if(isset($_POST["pozice"]) && strlen(trim($_POST["pozice"])) > 0){
  $pozice = mysqli_real_escape_string($conn, $_POST["pozice"]);
} else {
  $error = true;
}

if(isset($_POST["telefon"]) && strlen(trim($_POST["telefon"])) >= 9 && strlen(trim($_POST["telefon"])) <= 16){
  $telefon = mysqli_real_escape_string($conn, $_POST["telefon"]);
} else {
  $error = true;
}

if(isset($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
} else {
  $error = true;
}

if(!$error){

$sql= "UPDATE lektori SET jmeno = '$jmeno', pozice = '$pozice', telefon = '$telefon', email = '$email' WHERE id_lektora = $id";

if($query = mysqli_query($conn, $sql)){
    header("location: ../lektor.php?id=".$id);
    die();
  }else{
    echo mysqli_error($conn);
  }
} else {
  header("location: ../aktualizovat_lektor.php?err=1");
  die();
}
?>
