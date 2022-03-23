<?php
include_once("../../mysql_connect.php");

$id = (int)$_GET["id"];

$sql = "UPDATE objednavky SET status = 'paid' WHERE id_objednavky = $id";

if($query = mysqli_query($conn, $sql)){
  $sqlSelect = "SELECT email, nazev FROM objednavky, seminar WHERE id_objednavky = $id AND seminar.id_seminare = objednavky.id_seminare";
  if($querySelect = mysqli_query($conn, $sqlSelect)){
    while($row = mysqli_fetch_array($querySelect)){
      $email = $row["email"];
      $nazev = $row["nazev"];
    }

    $to      = $email;
    $subject = 'Potvrzení platby - Agentura Legis';
    $message = "<html><body>
      Dobrý den,<br>potvrzujeme Vaši platbu za seminář ".$nazev.".<br><br>Agentura Legis
      </body></html>";
    $headers = "From: legis.sumperk@seznam.cz\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    mail($to, $subject, $message, $headers);

  } else {
    echo mysqli_error($conn);
    die();
  }

  header("location: ../objednavka.php?id=".$id);
} else {
  echo mysqli_error($conn);
  die();
}
?>
