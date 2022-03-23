<?php
include_once("../../mysql_connect.php");

$error = false;

 if(isset($_POST["id"])){
 $id = mysqli_real_escape_string($conn, $_POST["id"]);
} else {
  $error = true;
}

if(isset($_POST["ulice"]) && strlen(trim($_POST["nazevmista"])) > 0){
 $nazevmista = mysqli_real_escape_string($conn, $_POST["nazevmista"]);
} else {
  $error = true;
}

if(isset($_POST["ulice"]) && strlen(trim($_POST["ulice"])) > 0){
 $ulice = mysqli_real_escape_string($conn, $_POST["ulice"]);
} else {
  $error = true;
}

if(isset($_POST["mesto"]) && strlen(trim($_POST["mesto"])) > 0){
  $mesto = mysqli_real_escape_string($conn, $_POST["mesto"]);
} else {
  $error = true;
}

if(isset($_POST["psc"]) && strlen(trim($_POST["psc"])) == 5){
  $psc = mysqli_real_escape_string($conn, $_POST["psc"]);
} else {
  $error = true;
}

if(isset($_POST["popisek"]) && strlen(trim($_POST["popisek"])) > 0){
  $popisek = mysqli_real_escape_string($conn, $_POST["popisek"]);
} else {
  $error = true;
}


if(!$error){

$sql= "UPDATE mista SET nazevmista = '$nazevmista', mesto = '$mesto', ulice = '$ulice', psc = '$psc', popisek = '$popisek' WHERE id_mista = $id";

if($query = mysqli_query($conn, $sql)){
    header("location: ../misto.php?id=".$id);
    die();
  }else{
    echo mysqli_error($conn);
  }
} else {
  header("location: ../aktualizovat_misto.php?err=1");
  die();
}
?>
