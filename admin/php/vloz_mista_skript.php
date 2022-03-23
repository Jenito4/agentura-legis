<?php
include_once("../../mysql_connect.php");

$error = false;

if(isset($_POST["MistoNazev"]) && strlen(trim($_POST["MistoNazev"])) > 0){
 $MistoNazev = mysqli_real_escape_string($conn, $_POST["MistoNazev"]);
} else {
  $error = true;
}

if(isset($_POST["MistoAdresa"]) && strlen(trim($_POST["MistoAdresa"])) > 0){
 $MistoAdresa = mysqli_real_escape_string($conn, $_POST["MistoAdresa"]);
} else {
  $error = true;
}

if(isset($_POST["MistoPSC"]) && strlen(trim($_POST["MistoPSC"])) > 0){
 $MistoPSC = mysqli_real_escape_string($conn, $_POST["MistoPSC"]);
} else {
  $error = true;
}

if(isset($_POST["MistoMesto"]) && strlen(trim($_POST["MistoMesto"])) > 0){
 $MistoMesto = mysqli_real_escape_string($conn, $_POST["MistoMesto"]);
} else {
  $error = true;
}

if(isset($_POST["MistoPopisek"]) && strlen(trim($_POST["MistoPopisek"])) > 0){
 $MistoPopisek = mysqli_real_escape_string($conn, $_POST["MistoPopisek"]);
} else {
  $error = true;
}


if(!$error){
  $sql = "INSERT INTO mista(nazevmista, mesto, ulice, psc, popisek) VALUES('$MistoNazev', '$MistoMesto', '$MistoAdresa', '$MistoPSC', '$MistoPopisek')";

  if($query = mysqli_query($conn, $sql)){
    header("location: ../mista.php");
    die();
  } else {
    echo mysqli_error($conn);
  }
} else {
  header("location: ../vloz_misto.php?err=1");
  die();
}
?>
