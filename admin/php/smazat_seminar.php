<?php
include_once("../../mysql_connect.php");

$id = (int)$_GET["id"];

$sql = "DELETE FROM seminar, objednavky WHERE id_seminare = $id AND objednavky.id_seminare = seminar.id_seminare";
if($query = mysqli_query($conn, $sql)){
  header("location: ../seminare.php?del=1");
} else {
  echo mysqli_error($conn);
  die();
}
?>