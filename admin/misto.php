<?php
  $title = "Místo | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_mista = (int)$_GET["id"];

  $id_mista = (int)$_GET["id"];
  $sql = "SELECT * FROM mista WHERE mista.id_mista = $id_mista";
  $count = "SELECT COUNT(id_seminare) FROM seminar WHERE id_mista = $id_mista";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
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
?>
 <link rel="stylesheet" href="stylesadmin.css">

<div class="container">
  <div class="pagePadding">
    <div class="row">
      <div class="col-sm-1">
      </div>

      <div class="col-sm-5">
        <table class="table">
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
            <td>Popisek</td>
            <td><?php echo $popisek; ?></td>
          </tr>
        </table>

        <a href="aktualizovat_misto.php?id=<?php echo $id_mista; ?>" class="btn btn-success" alt="Aktualizovat místo">Aktualizovat místo</a>
        &emsp;
        &emsp;
        
        <?php
          $sql = "SELECT COUNT(id_seminare) AS pocet FROM seminar WHERE id_mista = $id_mista";
          if($q = mysqli_query($conn, $sql)){
            while($r = mysqli_fetch_array($q)){
              $pocet = $r["pocet"];
            }
            if($pocet == 0) {
              ?>
              <a href="php/smazat_misto.php?id=<?php echo $id_mista; ?>" class="btn btn-danger" alt="Smazat místo" onclick="return confirm('Smaazat toto místo?')">Smazat místo</a>
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
