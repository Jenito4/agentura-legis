<?php
include_once("../../mysql_connect.php");

$id = (int)$_GET["id"];

$sql = "DELETE FROM lektori WHERE id_lektora = $id";
if($query = mysqli_query($conn, $sql)){
  header("location: ../lektori.php?del=1");
} else {
  echo mysqli_error($conn);
  die();
}
?>