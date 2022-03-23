<?php
include_once("../../mysql_connect.php");

$id = (int)$_GET["id"];



$sqlSelect = "SELECT email, nazev FROM objednavky, seminar WHERE id_objednavky = $id AND seminar.id_seminare = objednavky.id_seminare";
if($querySelect = mysqli_query($conn, $sqlSelect)){
  while($row = mysqli_fetch_array($querySelect)){
    $email = $row["email"];
    $nazev = $row["nazev"];
  }
} else {
  echo mysqli_error($conn);
  die();
}

$sql = "DELETE FROM objednavky WHERE id_objednavky = $id";
if($query = mysqli_query($conn, $sql)){

    $to      = $email;
    $subject = 'Storno objednávky - Agentura Legis';
    $message = "<html><body>
      Dobrý den,<br>stornovali jsme vaši objednávku semináře ".$nazev.".<br><br>Agentura Legis
      </body></html>";
    $headers = "From: legis.sumperk@seznam.cz\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    mail($to, $subject, $message, $headers);



  header("location: ../objednavky.php?del=1");
} else {
  echo mysqli_error($conn);
  die();
}
?>
