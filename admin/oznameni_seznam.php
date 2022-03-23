<?php
    $title = "Oznámení | Agentura Legis";
    include_once("header.php");
?>
 <link rel="stylesheet" href="stylesadmin.css">

<div class="container">
<div class="pagePadding">
  <div class="row">

    <div class="col-sm-12">

        <h1>Oznámení</h1>
        <a href="vloz_oznameni.php" class="btn btn-primary" alt="Vložit"><span class="glyphicon glyphicon-plus"></span> Přidat nový</a><br><br>
        <?php
        $sql = "SELECT * FROM oznameni";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
            echo "<table class='table'>\n
              <tr>
                <th>Název</th>
                <th>Obsah</th>
              </tr>\n";

              while($row = mysqli_fetch_array($query)){
                  ?>
                  <tr class='clickable-row alert alert-info' data-href='oznameni.php?id=<?php echo $row["id_oznameni"] ?>' style="cursor: pointer;">
              
                  <td><?php echo $row["nazev"]; ?></td>
                  <td><?php echo $row["obsah"]; ?></td>
                </tr>
                <?php
              }

            echo "</table>\n";
          } else {
            echo "Žádná nová oznámení";
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
