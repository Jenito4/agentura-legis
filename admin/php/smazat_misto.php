<?php
include_once("../../mysql_connect.php");

$id = (int)$_GET["id"];

$sql = "DELETE FROM mista WHERE id_mista = $id";
if($query = mysqli_query($conn, $sql)){
  header("location: ../mista.php?del=1");
} else {
  echo mysqli_error($conn);
  die();
}
?>