<?php
  $title = "Lektor | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_laktora = (int)$_GET["id"];

  $id_lektora = (int)$_GET["id"];
  $sql = "SELECT * FROM lektori WHERE lektori.id_lektora = $id_lektora";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $jmeno = $row["jmeno"];
      $pozice = $row["pozice"];
      $telefon = $row["telefon"];
      $email = $row["email"];

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

      <div class="col-sm-6">
        <table class="table">
          <tr>
            <td>Jméno:</td>
            <td><?php echo $jmeno; ?></td>
          </tr>
          <tr>
            <td>Pozice a publikace:</td>
            <td><?php echo $pozice; ?></td>
          </tr>
          <tr class="bolder">
            <td>Telefon:</td>
            <td><?php echo $telefon; ?></td>
          </tr>
          <tr class="bolder">
            <td>E-mail</td>
            <td><?php echo $email; ?></td>
          </tr>
        </table>

        <a href="/admin/aktualizovat_lektor.php?id=<?php echo $id_lektora; ?>" class="btn btn-success" alt="Aktualizovat lektora">Aktualizovat lektora</a>
        &emsp;
        &emsp;
        <?php
          $sql = "SELECT COUNT(id_seminare) AS pocet FROM seminar WHERE id_lektora = $id_lektora";
          if($q = mysqli_query($conn, $sql)){
            while($r = mysqli_fetch_array($q)){
              $pocet = $r["pocet"];
            }
            if($pocet == 0) {
              ?>
              <a href="php/smazat_lektor.php?id=<?php echo $id_lektora; ?>" class="btn btn-danger" alt="Smazat lektora" onclick="return confirm('Smaazat tohoto lektora?')">Smazat lektora</a>
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

        <table class="table">
          <tr>
          </tr>
        </table>

      </div>



      <div class="col-sm-1">
    </div>
  </div>
</div>
</div>

<?php
  include_once("footer.php");
?>
