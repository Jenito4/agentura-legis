<?php
    $title = "Admin | Agentura Legis";
    include_once("header.php");
?>
 <link rel="stylesheet" href="stylesadmin.css">

<div class="container">
<div class="pagePadding">
  <div class="row">

    <div class="col-sm-12">

        <h1>Nové objednávky</h1>

        <?php
        $sql = "SELECT id_objednavky, cislo_uctu, symbol, nazev, nazev_spolecnosti, datum, status FROM seminar, objednavky
          WHERE status <> 'paid' AND seminar.id_seminare = objednavky.id_seminare
          ORDER BY id_objednavky DESC";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
            echo "<table class='table'>\n
              <tr>
                <th>Číslo účtu</th>
                <th>Variabilní symbol</th>
                <th>Stav</th>
                <th>Seminář</th>
                <th>Datum</th>
                <th>Společnost</th>
              </tr>\n";

              while($row = mysqli_fetch_array($query)){
                if($row["status"] == "new"){
                  ?>
                  <tr class='clickable-row alert alert-success' data-href='objednavka.php?id=<?php echo $row["id_objednavky"] ?>' style="cursor: pointer;">
                <?php
                  } else {
                ?>
                  <tr class='clickable-row alert alert-warning' data-href='objednavka.php?id=<?php echo $row["id_objednavky"] ?>' style="cursor: pointer;">
                <?php
                  }
                ?>

                  <td><?php echo $row["cislo_uctu"]; ?></td>
                  <td><?php echo $row["symbol"]; ?></td>
                  <td>
                    <?php
                      if($row["status"] == "new") {
                        echo "nová";
                      } else {
                        if ($row["status"] == "paid") {
                        echo "zaplacená";
                        } else {
                        echo "hotově";
                        }
                      }

                    ?>
                  </td>
                  <td><?php echo $row["nazev"]; ?></td>
                  <td><?php echo date_format(date_create($row["datum"]), "j. n. Y"); ?></td>
                  <td><?php echo $row["nazev_spolecnosti"]; ?></td>
                </tr>
                <?php
              }

            echo "</table>\n";
          } else {
            echo "Žádné nové objednávky";
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
