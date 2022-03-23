<?php
  $title = "Seminář | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_seminare = (int)$_GET["id"];

  $id_seminare = (int)$_GET["id"];
  $sql = "SELECT * FROM seminar, lektori, mista WHERE seminar.id_seminare = $id_seminare AND lektori.id_lektora = seminar.id_lektora AND mista.id_mista = seminar.id_mista";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $symbol = $row["symbol"];
      $nazevSeminare = $row["nazev"];
      $jmeno = $row["jmeno"];
      $nazevmista = $row["nazevmista"];
      $mesto = $row["mesto"];
      $ulice = $row["ulice"];
      $psc = $row["psc"];
      $datum = date_format(date_create($row["datum"]), "j. n. Y");
      $zahajeni = $row["zahajeni"];
      $registrace = $row["registrace"];
      $ukonceni = $row["ukonceni"];
      $popis = $row["popis"];
      $cena = $row["cena"];

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
            <td>Variabilní symbol:</td>
            <td><?php echo $symbol; ?></td>
          </tr>
          <tr>
            <td>Seminář:</td>
            <td><?php echo $nazevSeminare; ?></td>
          </tr>
          <tr>
            <td>Jméno a příjmení:</td>
            <td><?php echo $jmeno; ?></td>
          </tr>
          <tr class="bolder">
            <td>Místo konání:</td>
            <td><?php echo $nazevmista; ?></td>
          </tr>
          <tr class="bolder">
            <td>Ulice:</td>
            <td><?php echo $ulice; ?></td>
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
            <td>Cena: </td>
            <td><?php echo $cena; ?> Kč</td>
          </tr>
          <tr class="bolder">
            <td>Datum: </td>
            <td><?php echo $datum; ?></td>
          </tr>
          <tr class="bolder">
            <td>Registrace: </td>
            <td><?php echo date("G:i",strtotime($registrace)); ?></td>
          </tr>
          <tr class="bolder">
            <td>Zahájení: </td>
            <td><?php echo date("G:i",strtotime($zahajeni)); ?></td>
          </tr>
          <tr class="bolder">
            <td>Ukončení: </td>
            <td><?php echo date("G:i",strtotime($ukonceni)); ?></td>
          </tr>
        </table>

        <a href="aktualizovat_seminar.php?id=<?php echo $id_seminare; ?>" class="btn btn-success" alt="Aktualizovat seminář">Aktualizovat seminář</a>
        &emsp;
        &emsp;

        <?php
          $sql = "SELECT COUNT(id_objednavky) AS pocet FROM objednavky WHERE id_seminare = $id_seminare";
          if($q = mysqli_query($conn, $sql)){
            while($r = mysqli_fetch_array($q)){
              $pocet = $r["pocet"];
            }
            if($pocet == 0) {
              ?>
              <a href="php/smazat_seminar.php?id=<?php echo $id_seminare; ?>" class="btn btn-danger" alt="Smazat seminář" onclick="return confirm('Smaazat tento seminář?')">Smazat seminář</a>
              <?php
            }
          } else {
            echo mysqli_error($conn);
          }
        ?>

        <br />
        <br />
      </div>

      <div class="col-sm-1">
      </div>

      <div class="col-sm-4">

        <?php
          if(!empty($popis)){
        ?>
            <div class="alert alert-info" role="alert">
              <?php echo "<strong>Program: </strong>".$popis; ?>
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
