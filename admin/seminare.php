<?php
    $title = "Semináře | Agentura Legis";
    include_once("header.php");
?>
 <link rel="stylesheet" href="stylesadmin.css">

<div class="container">
<div class="pagePadding">
  <div class="row">

    <div class="col-sm-12">

        <h1>Semináře</h1>
        <a href="vloz_seminar.php" class="btn btn-primary" alt="Vložit"><span class="glyphicon glyphicon-plus"></span> Přidat nový</a><br><br>
        <?php
        $sql = "SELECT * FROM seminar, lektori, mista WHERE lektori.id_lektora = seminar.id_lektora AND mista.id_mista = seminar.id_mista";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
            echo "<table class='table'>\n
              <tr>
                <th>Symbol</th>
                <th>Název semináře</th>
                <th>Jméno lektora</th>
                <th>Datum</th>
              </tr>\n";

              while($row = mysqli_fetch_array($query)){
                  ?>
                  <tr class='clickable-row alert alert-info' data-href='seminar.php?id=<?php echo $row["id_seminare"] ?>' style="cursor: pointer;">

                  <td><?php echo $row["symbol"]; ?></td>
                  <td><?php echo $row["nazev"]; ?></td>
                  <td><?php echo $row["jmeno"]; ?></td>
                  <td><?php echo date_format(date_create($row["datum"]), "j. n. Y"); ?></td>
                </tr>
                <?php
              }

            echo "</table>\n";
          } else {
            echo "Žádné nové semináře";
          }
        } else {
          echo mysqli_error($conn);
        }
        ?>

    </div>
  </div>
</div>
</div>


<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>

<?php
    include_once("footer.php");
?>
