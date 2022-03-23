<?php
  $title = "Objednávka | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_objednavky = (int)$_GET["id"];

  $id_objednavky = (int)$_GET["id"];
  $sql = "SELECT * FROM objednavky, seminar WHERE objednavky.id_objednavky = $id_objednavky AND seminar.id_seminare = objednavky.id_seminare";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $cena = $row["cena"];
      $nazevSeminare = $row["nazev"];
      $datum = $row["datum"];
      $symbol = $row["symbol"];
      $zahajeni = $row["zahajeni"];
      $registrace = $row["registrace"];
      $ukonceni = $row["ukonceni"];
      $status = $row["status"];
      $jmeno = $row["jmeno"];
      $prijmeni = $row["prijmeni"];
      $email = $row["email"];
      $telefon = $row["telefon"];
      $nazev_spolecnosti = $row["nazev_spolecnosti"];
      $mesto = $row["mesto"];
      $adresa = $row["adresa"];
      $psc = $row["psc"];
      $pocet_ucastniku = $row["pocet_ucastniku"];
      $cislo_uctu = $row["cislo_uctu"];
      $zprava = $row["zprava"];
    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>
 <link rel="stylesheet" href="stylesadmin.css">

<div class="container">
  <div class="pagePadding">
    <div class="row">
      <div class="col-sm-1">
      </div>

      <div class="col-sm-5">
        <table class="table">
          <tr>
            <td>Jméno a příjmení:</td>
            <td><?php echo $jmeno." ".$prijmeni; ?></td>
          </tr>
          <tr>
            <td>Společnost:</td>
            <td><?php echo $nazev_spolecnosti; ?></td>
          </tr>
          <tr class="bolder">
            <td>Ulice:</td>
            <td><?php echo $adresa; ?></td>
          </tr>
          <tr class="bolder">
            <td>Město:</td>
            <td><?php echo $mesto; ?></td>
          </tr>
          <tr class="bolder">
            <td>PSČ</td>
            <td><?php echo $psc; ?></td>
          </tr>
          <tr class="bolder">
            <td>E-mail:</td>
            <td><?php echo $email; ?></td>
          </tr>
          <tr class="bolder">
            <td>Telefon:</td>
            <td><?php echo $telefon; ?></td>
          </tr>
        </table>

        <?php
          if($status == "new"){
        ?>
        <a href="php/potvrdit_platbu.php?id=<?php echo $id_objednavky; ?>" class="btn btn-success" alt="Potvrdit zaplacení" onclick="return confirm('Potvrdit zplacení této objednávky?')">Potvrdit zaplacení</a>
        &emsp;
        &emsp;
        <?php } ?>
        <a href="php/storno.php?id=<?php echo $id_objednavky; ?>" class="btn btn-danger" alt="Storno objednávky" onclick="return confirm('Stornovat tuto objednávku?')">Storno objednávky</a>
      </div>





      <div class="col-sm-1">
      </div>




      <div class="col-sm-4">
        <table class="table">
          <tr class="bolder">
            <td>Cena celkem: </td>
            <td><?php echo $cena * $pocet_ucastniku; ?> Kč</td>
          </tr>
          <?php
            if($status != "on_spot"){
           ?>
          <tr>
            <td>Bankovní účet:</td>
            <td><?php echo $cislo_uctu; ?></td>
          </tr>
          <tr>
            <td>Variabilní symbol:</td>
            <td><?php echo $symbol; ?></td>
          </tr>
          <?php
           }
           ?>
          <tr>
            <td>Seminář:</td>
            <td><?php echo $nazevSeminare; ?></td>
          </tr>

          <tr>
            <td>Počet účastníků: </td>
            <td><?php echo $pocet_ucastniku; ?></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>
              <?php
                if($status == "new") {
                  echo "nová";
                } else if ($status == "paid") {
                  echo "zaplacená";
                } else {
                  echo "hotově";
                }
              ?>
          </td>
          </tr>
        </table>

        <?php
          if(!empty($zprava)){
        ?>
            <div class="alert alert-info" role="alert">
              <?php echo "<strong>Zpráva: </strong>".$zprava; ?>
            </div>
        <?php
          }
        ?>
      </div>



      <div class="col-sm-1">
    </div>
  </div>
</div>
</div>

<?php
  include_once("footer.php");
?>
