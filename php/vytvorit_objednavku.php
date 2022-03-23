<?php
include_once("../mysql_connect.php");

$error = false;

if(isset($_POST["id_seminare"])){
 $id_seminare = mysqli_real_escape_string($conn, $_POST["id_seminare"]);
} else {
  $error = true;
  echo "err id<br>";
}

if(isset($_POST["billingFirstName"]) && strlen(trim($_POST["billingFirstName"])) > 0){
 $billingFirstName = mysqli_real_escape_string($conn, $_POST["billingFirstName"]);
} else {
  $error = true;
  echo "err first name<br>";
}

if(isset($_POST["billingSurname"]) && strlen(trim($_POST["billingFirstName"])) > 0){
  $billingSurname = mysqli_real_escape_string($conn, $_POST["billingSurname"]);
} else {
  $error = true;
  echo "err surname<br>";
}

if(isset($_POST["billingPhone"]) && strlen(trim($_POST["billingPhone"])) >= 9 && strlen(trim($_POST["billingPhone"])) <= 22){
  $billingPhone = mysqli_real_escape_string($conn, $_POST["billingPhone"]);
} else {
  $error = true;
  echo "err phone<br>";
}

if(isset($_POST["billingEmail"]) && filter_var($_POST["billingEmail"], FILTER_VALIDATE_EMAIL)){
  $billingEmail = mysqli_real_escape_string($conn, $_POST["billingEmail"]);
} else {
  $error = true;
  echo "err email<br>";
}

if(isset($_POST["billingCompName"]) && strlen(trim($_POST["billingCompName"])) > 0){
  $billingCompName = mysqli_real_escape_string($conn, $_POST["billingCompName"]);
} else {
  $error = true;
  echo "err compname<br>";
}

if(isset($_POST["billingCompStreet"]) && strlen(trim($_POST["billingCompStreet"])) > 0){
  $billingCompStreet = mysqli_real_escape_string($conn, $_POST["billingCompStreet"]);
} else {
  $error = true;
  echo "err compstreet<br>";
}

if(isset($_POST["billingCompPSC"]) && strlen(trim($_POST["billingCompPSC"])) >= 5){
  $billingCompPSC = mysqli_real_escape_string($conn, $_POST["billingCompPSC"]);
} else {
  $error = true;
  echo "err comppsc<br>";
}

if(isset($_POST["billingCompCity"]) && strlen(trim($_POST["billingCompCity"])) > 0){
  $billingCompCity = mysqli_real_escape_string($conn, $_POST["billingCompCity"]);
} else {
  $error = true;
  echo "err compcity<br>";
}

if(isset($_POST["billingCount"]) && $_POST["billingCount"] > 0){
  $billingCount = mysqli_real_escape_string($conn, $_POST["billingCount"]);
} else {
  $error = true;
  echo "err count<br>";
}

if(isset($_POST["payment"])){
  if($_POST["payment"] == "banka"){
    if(isset($_POST["billingBankAccount"]) && strlen(trim($_POST["billingBankAccount"])) > 2 && strlen(trim($_POST["billingBankAccount"])) <= 40){
      $billingBankAccount = mysqli_real_escape_string($conn, $_POST["billingBankAccount"]);
    } else {
      $error = true;
      echo "err account<br>";
    }
  }
} else {
  $error = true;
  echo "err payment<br>";
}


if(isset($_POST["text"])){
  $text = mysqli_real_escape_string($conn, $_POST["text"]);
} else {
    $text = "";
}



if(!$error){
  if($_POST["payment"] == "banka"){
    $sql = "INSERT INTO objednavky(jmeno, prijmeni, email, telefon, cislo_uctu, nazev_spolecnosti, adresa, mesto, psc, pocet_ucastniku, zprava, id_seminare)
      VALUES('$billingFirstName', '$billingSurname', '$billingEmail', '$billingPhone', '$billingBankAccount', '$billingCompName', '$billingCompStreet', '$billingCompCity', '$billingCompPSC', '$billingCount', '$text', '$id_seminare')";
  } else {
    $sql = "INSERT INTO objednavky(jmeno, prijmeni, email, telefon, nazev_spolecnosti, adresa, mesto, psc, pocet_ucastniku, zprava, id_seminare, status)
      VALUES('$billingFirstName', '$billingSurname', '$billingEmail', '$billingPhone', '$billingCompName', '$billingCompStreet', '$billingCompCity', '$billingCompPSC', '$billingCount', '$text', '$id_seminare', 'on_spot')";

  }

  if($query = mysqli_query($conn, $sql)){
    $id_objednavky = mysqli_insert_id($conn);





// Mailer ---------------------------------------------------------------------------------------
$sqlMailMess = "SELECT nazev, cena, symbol FROM seminar WHERE id_seminare = $id_seminare";

if($queryMail = mysqli_query($conn, $sqlMailMess)){
  while($rowMail = mysqli_fetch_array($queryMail)){
    $nazev = $rowMail["nazev"];
    $cena = $rowMail["cena"];
    $symbol = $rowMail["symbol"];
  }
  $cenaCelkem = (int)$cena * (int)$billingCount;
  $cenaCelkem = strval($cenaCelkem);

if($_POST["payment"] == "hotovost"){
  $mess = "<html><body>Dobrý den,<br>
  potvrzujeme Vaši objednávku semináře ".$nazev.". Více informací na našich stránkách.<br>
  <b>Prosíme, abyste uhradili částku ".$cenaCelkem." Kč hotově u prezence v den konání semináře.</b>
  <br><br>
  Agentura Legis</body></html>";
} else {
  $mess = "<html><body>Dobrý den,<br>
  potvrzujeme Vaši objednávku semináře ".$nazev.". Více informací na našich stránkách.<br>
  <b>Prosíme, abyste uhradili částku ".$cenaCelkem." Kč následovně: </b>
  <br><br>
  Platba z účtu: ".$billingBankAccount."<br>
  <b>Na účet: 43-7409620207 </b><br>
  <b>Kód banky: 0100 </b><br>
  <b>Variabilní symbol: ".$symbol." </b><br>
  <b>Konstantní symbol: 0308 </b><br><br>
  Agentura Legis</body></html>";
}


} else {
  echo mysqli_error($conn);
  die();
}
//------------------------------------------------------------



    $to      = $billingEmail;
    $subject = 'Objednávka - Agentura Legis';

    $message = $mess;

    $headers = "From: legis.sumperk@seznam.cz\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";

    mail($to, $subject, $message, $headers);

    header("location: ../objednavka_hotova.php?id=".$id_objednavky);
    die();
  } else {
    echo mysqli_error($conn);
  }
} else {
    header("location: ../objednat.php?id=".$id_seminare."&err=1");
    die();
}



?>
