<?php
include_once("mysql_connect.php");

if(!isset($_GET["id"])){
  header("location: index.php");
  die();
}

$id = (int)$_GET["id"];

$sql = "SELECT s.nazev, s.datum, s.zahajeni, s.registrace, s.ukonceni, s.popis, s.cena,
              l.id_lektora, l.jmeno, l.pozice,
              m.id_mista, m.nazevmista, m.mesto, m.ulice, m.psc, m.popisek
              FROM seminar AS s, mista AS m, lektori AS l
              WHERE s.id_seminare = $id AND l.id_lektora = s.id_lektora AND m.id_mista = s.id_mista";

if($query = mysqli_query($conn, $sql)){
  if(mysqli_num_rows($query) == 0){
    header("location: index.php");
    die();
  }
  while($row = mysqli_fetch_array($query)){
    $nazev = $row["nazev"];
    $datum = date_format(date_create($row["datum"]), "j. n. Y");
    $zahajeni = date_format(date_create($row["zahajeni"]), "H:i");
    $registrace = date_format(date_create($row["registrace"]), "H:i");
    $ukonceni = date_format(date_create($row["ukonceni"]), "H:i");
    $popis = $row["popis"];
    $cena = $row["cena"];
    $id_lektora = $row["id_lektora"];
    $jmeno = $row["jmeno"];
    $pozice = $row["pozice"];
    $id_mista = $row["id_mista"];
    $nazevmista = $row["nazevmista"];
    $mesto = $row["mesto"];
    $ulice = $row["ulice"];
    $psc = $row["psc"];
    $popisek = $row["popisek"];
  }
} else {
  echo mysqli_error($conn);
  die();
}

$title = $nazev." | Agentura Legis";

include_once("header.php");
?>



<div class="container-fluid bg-3">
  <div class="row">
    <div class="pagePadding">

      <div class="col-sm-1"></div>

      <div class="col-sm-5">
        <h1 class="seminarHeading"><?php echo $nazev."\n"; ?></h1>
        <br>
        <div>
          <?php echo $popis."\n"; ?>
        </div>
      </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-4 seminaryDetails">
        <form method="get" action="objednat.php">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="submit" name="submit" value="Objednat" class="btn btn-primary btn-block objednatSeminar">
        </form>
        <br>
        <table class="table">
          <tr class="bolder">
            <td>Cena: </td>
            <td><?php echo $cena; ?> Kč</td>
          </tr>
          <tr class="bolder">
            <td>Datum: </td>
            <td><?php echo $datum; ?></td>
          </tr>
          <tr class="bolder">
            <td>Místo konání: </td>
            <td><?php echo $nazevmista.", ".$mesto.", ".$ulice;; ?><br><span class="popisek"><?php echo "(".$popisek.")"; ?></span></td>
          </tr>
          <tr>
            <td>Registrace: </td>
            <td><?php echo $registrace; ?></td>
          </tr>
          <tr>
            <td>Zahájení: </td>
            <td><?php echo $zahajeni; ?></td>
          </tr>
          <tr>
            <td>Konec: </td>
            <td><?php echo $ukonceni; ?></td>
          </tr>

          <tr>
            <td>Přednášející: </td>
            <td>
              <?php echo $jmeno; ?>
              <ul>
                <li><?php echo $pozice; ?></li>
              </ul>
            </td>
          </tr>
        </table>

      </div>

      <div class="col-sm-1"></div>

    </div>
  </div>
</div>

<br>





<?php
include_once("footer.php");
?>
