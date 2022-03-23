<?php
  $title = "Semináře | Agentura Legis";
  include_once("header.php");
?>


   <div class="container-fluid bg-3">
    <div class="row">
      <div class="pagePadding">
        <h1>Seznam seminářů</h1>

        <div class="pageText">

          <?php
            $sql="SELECT id_seminare, nazev, cena, datum, foto, mesto FROM seminar, mista WHERE mista.id_mista = seminar.id_mista AND datum >= CURDATE() ORDER BY datum";

            if($query = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($query) == 0) {
             echo '<div class="col-xs-12 text-center">V současné době nenabízíme nové semináře</div><br>';
             }
              while($row = mysqli_fetch_array($query)){
                if(strlen($row["foto"]) > 0){
                  $foto = $row["foto"];
                } else {
                  $foto = "default_seminar.jpg";
                }

                ?>

                <div class="col-sm-4">
                  <a href="seminar.php?id=<?php echo $row["id_seminare"]; ?>" class="productHover">
                    <div class="panel panel-primary">
                      <div class="panel-body">
                          <figure><img src="/foto_seminare/<?php echo $foto; ?>" class="img-responsive" alt="<?php echo $row["nazev"]; ?> semináře Šumperk Agentura Legis"></figure>
                      </div>
                      <div class="panel-footer">
                        <?php echo $row["nazev"]; ?>
                        <div class="priceInProductPrint">
                          <?php echo $row["cena"]." Kč"; ?>
                        </div>
                        <div class="panel-footer-details">

                          <span class="glyphicon glyphicon-calendar"></span>
                          <?php
                            echo date_format(date_create($row["datum"]), "j. n. Y");
                          ?>

                          <span class="glyphicon glyphicon-map-marker"></span>
                          <?php
                            echo $row["mesto"];
                          ?>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>



                <?php
              }
            } else {
              echo mysqli_error($conn);
            }
          ?>



        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include_once("footer.php");
?>
