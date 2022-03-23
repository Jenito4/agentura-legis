<?php
include_once("../../mysql_connect.php");

$error = false;

if(isset($_POST["LektorJmeno"]) && strlen(trim($_POST["LektorJmeno"])) > 0){
 $LektorJmeno = mysqli_real_escape_string($conn, $_POST["LektorJmeno"]);
} else {
  $error = true;
  echo 1;
}

if(isset($_POST["LektorPozice"]) && strlen(trim($_POST["LektorPozice"])) > 0){
  $LektorPozice = mysqli_real_escape_string($conn, $_POST["LektorPozice"]);
} else {
  $error = true;
  echo 3;
}

if(isset($_POST["LektorEmail"]) && filter_var($_POST["LektorEmail"], FILTER_VALIDATE_EMAIL)){
  $LektorEmail = mysqli_real_escape_string($conn, $_POST["LektorEmail"]);
} else {
  $error = true;
  echo 4;
}

if(isset($_POST["LektorTelefon"]) && strlen(trim($_POST["LektorTelefon"])) >= 9 && strlen(trim($_POST["LektorTelefon"])) <= 16){
  $LektorTelefon = mysqli_real_escape_string($conn, $_POST["LektorTelefon"]);
} else {
  $error = true;
  echo 5;
}

if(!$error){
  $sql = "INSERT INTO lektori(jmeno, pozice, email, telefon)
    VALUES('$LektorJmeno', '$LektorPozice', '$LektorEmail', '$LektorTelefon')";

  if($query = mysqli_query($conn, $sql)){
    header("location: ../lektori.php");
    die();
  } else {
    echo mysqli_error($conn);
  }
} else {
  header("location: ../vloz_lektor.php?err=1");
  die();
}
?>
