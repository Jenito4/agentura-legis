<?php
  $title = "Oznámení | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_oznameni = (int)$_GET["id"];

  $id_oznameni = (int)$_GET["id"];
  $sql = "SELECT * FROM oznameni WHERE oznameni.id_oznameni = $id_oznameni";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $nazev = $row["nazev"];
      $obsah = $row["obsah"];

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
            <td>Název:</td>
            <td><?php echo $nazev; ?></td>
          </tr>
          <tr class="bolder">
            <td>Obsah:</td>
            <td><?php echo $obsah; ?></td>
          </tr>
        </table>

        <a href="aktualizovat_oznameni.php?id=<?php echo $id_oznameni; ?>" class="btn btn-success" alt="Aktualizovat oznámení">Aktualizovat oznámení</a>
        &emsp;
        &emsp;
        <a href="php/smazat_oznameni.php?id=<?php echo $id_oznameni; ?>" class="btn btn-danger" alt="Smazat oznámení" onclick="return confirm('Smaazat toto oznámení?')">Smazat oznámení</a>
              
        
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
