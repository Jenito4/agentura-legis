<?php
session_name("legis");
session_start();

if(!isset($_SESSION["legis"])){
  header("location: ../index.php");
  die("Přístup odepřen");
}

include_once("../mysql_connect.php");
?>
<!DOCTYPE html>
<html lang="cz">
<head>
  <title><?php echo $title;?></title>
  <link href="/foto/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>




<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <!-- <a class="navbar-brand" href="index.php">Agentura Legis</a>
      <a class="navbar-brand" href="index.php"><img src="/web/foto/legis.jpg" width="auto" height="50px"></a>     -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Hlavní stránka</a></li>
        <li><a href="objednavky.php">Objednávky</a></li>
        <li><a href="seminare.php">Semináře</a></li>
        <li><a href="lektori.php">Lektoři</a></li>
        <li><a href="mista.php">Místa</a></li>
        <li><a href="oznameni_seznam.php">Oznámení</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Odhlásit se</a></li>
      </ul>
    </div>
  </div>
</nav>
