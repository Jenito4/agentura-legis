<?php
  $title = "Objedávka dokončena | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

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
    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>

      <div class="container-fluid bg-3">
    <div class="row">
      <div class="pagePadding">
        <h1>Objednávka dokončena</h1>

        <div class="pageText">
           <?php
            if($status != "on_spot"){ 
           ?>
            <div class="col-xs-12 text-center">Prosíme, abyste provedli platbu převodem.</div><br /><br />
           <?php
           } else {
           ?>
            <div class="col-xs-12 text-center">Prosíme, abyste uhradili částku hotově u prezence v den konání semináře.</div><br /><br />
           <?php
           }
           ?>
          <div class="col-sm-1">
          </div>

          <div class="col-sm-5">
            <table class="table">
              <tr class="bolder">
                <td>Cena celkem: </td>
                <td><?php echo $cena * $pocet_ucastniku; ?> Kč</td>
              </tr>
              <?php
                if($status != "on_spot"){ 
              ?>
              <tr class="bolder">
                <td>Plaťte z účtu:</td>
                <td><?php echo $cislo_uctu; ?></td>
              </tr>
              <tr class="bolder">
                <td>Na účet:</td>
                <td>43-7409620207</td>
              </tr>
              <tr class="bolder">
                <td>Kód banky:</td>
                <td>0100</td>
              </tr>
              <tr class="bolder">
                <td>Variabilní symbol:</td>
                <td><?php echo $symbol; ?></td>
              </tr>
              <tr class="bolder">
                <td>Konstantní symbol:</td>
                <td>0308</td>
              </tr>
              <?php
              }
              ?>
            </table>
          </div>


          <div class="col-sm-1">
          </div>

          <div class="col-sm-4">
            <table class="table">
              <tr>
                <td>Počet účastníků: </td>
                <td><?php echo $pocet_ucastniku; ?></td>
              </tr>
              <tr>
                <td>Seminář: </td>
                <td><?php echo $nazevSeminare; ?></td>
              </tr>
              <tr>
                <td>Datum: </td>
                <td><?php echo date_format(date_create($datum), "j. n. Y"); ?></td>
              </tr>
              <tr>
                <td>Registrace: </td>
                <td><?php echo date("G:i",strtotime($registrace)); ?></td>
              </tr>
              <tr>
                <td>Zahájení: </td>
                <td><?php echo date("G:i",strtotime($zahajeni)); ?></td>
              </tr>
              <tr>
                <td>Konec: </td>
                <td><?php echo date("G:i",strtotime($ukonceni)); ?></td>
              </tr>
            </table>
          </div>



          <div class="col-sm-1">
          </div>

          </div>
        </div>




      </div>
    </div>
</div>
<?php
  include_once("footer.php");
?>
