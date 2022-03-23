<?php
    $title = "Lektoři | Agentura Legis";
    include_once("header.php");
?>
 <link rel="stylesheet" href="stylesadmin.css">

<div class="container">
<div class="pagePadding">
  <div class="row">

    <div class="col-sm-14">

        <h1>Lektoři</h1>
        <a href="vloz_lektor.php" class="btn btn-primary" alt="Vložit"><span class="glyphicon glyphicon-plus"></span> Přidat nový</a><br><br>
        <?php
        $sql = "SELECT * FROM lektori";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
            echo "<table class='table'>\n
              <tr>
                <th>Jméno</th>
                <th>Telefon</th>
                <th>E-mail</th>
              </tr>\n";

              while($row = mysqli_fetch_array($query)){
                  ?>
                  <tr class='clickable-row alert alert-info' data-href='lektor.php?id=<?php echo $row["id_lektora"] ?>' style="cursor: pointer;">

                  <td><?php echo $row["jmeno"]; ?></td>
                  <td><?php echo $row["telefon"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                </tr>
                <?php
              }

            echo "</table>\n";
          } else {
            echo "Žádní noví lektoři";
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
