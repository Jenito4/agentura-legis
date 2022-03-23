<!DOCTYPE html>
<html lang="cs">
<head>
  <title><?php echo $title;?></title>
  <link rel="shortcut icon" href="https://agentura-legis.cz/foto/favicon.ico">
  <link rel="apple-touch-icon-precomposed" href="https://agentura-legis.cz/foto/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="57×57" href="https://agentura-legis.cz/foto/favicon.ico"="">
  <link rel="apple-touch-icon-precomposed" sizes="72×72" href="https://agentura-legis.cz/foto/favicon.ico"="">
  <link rel="apple-touch-icon-precomposed" sizes="114×114" href="https://agentura-legis.cz/foto/favicon.ico"="">
  <meta charset="utf-8">
  <meta name="robots" content="all">
  <meta name="description" content="Agentura Legis, agentura poskytující semináře pro vzdělávání dospělých v okolí Šumperka.">
  <meta name="keywords" content="agentura legis, legis, legis šumperk, semináře šumperk, semináře">
  <meta name="author" content="Jan Mašlej">

  <meta property="og:title" content="Agentura Legis | Vzdělávací semináře Šumperk" />
  <meta property="og:description" content="vzdělávací agentura zaměřená na profesionální vzdělávání dospělých." />
  <meta property="og:site_name" content="Agentura Legis | Vzdělávací semináře Šumperk" />
  <meta property="og:image" content="http://agentura-legis.cz/foto/ostro.jpg" />
  <meta property="og:type" content="website" />
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="/styles.css">

</head>
<body>

<?php
include_once("mysql_connect.php");
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/index.php"><img src="/foto/legis.jpg" width="auto" alt="Agentura Legis - semináře Šumperk" height="51px"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/onas.php">O nás</a></li>
        <li><a href="/seminare.php">Seznam seminářů</a></li>
        <li><a href="/kontakt.php">Kontakt</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/admin/prihlaseni.php"><span class="glyphicon glyphicon-log-in"></span> Přihlášení</a></li>
      </ul>
    </div>
  </div>
</nav>
