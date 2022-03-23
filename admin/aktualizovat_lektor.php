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
       <form enctype="multipart/form-data" action="/admin/php/aktualizace_lektor.php" method="post">
       <input type="hidden" name="id" value="<?php echo $id_lektora; ?>">
      <div class="col-sm-5">
        <table class="table">
          <tr class="bolder">
            <td>Jméno:</td>
            <td><input name="jmeno" class="form-control" type="text" id="jmeno" value="<?php echo $jmeno; ?>" size="15" required /></td>
          </tr>
          <tr class="bolder">
            <td>Pozice a publikace:</td>
            <td><textarea name="pozice" class="form-control" id="pozice"><?php echo $pozice; ?></textarea></td>
          </tr>
          <tr class="bolder">
            <td>Telefon:</td>
            <td><input name="telefon" class="form-control" type="text" id="telefon" value="<?php echo $telefon; ?>" size="15" required /></td>
          </tr>
          <tr class="bolder">
            <td>E-mail</td>
            <td><input name="email" class="form-control" type="email" id="email" value="<?php echo $email; ?>" size="15" required /></td>
          </tr>
        </table>

        <input class="btn btn-primary" type="submit" value="Aktualizovat" /><br /><br />
        &emsp;
        &emsp;

          <br />
         <br />
      </div>
      </form>
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
