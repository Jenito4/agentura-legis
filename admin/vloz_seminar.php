<?php
    $title = "Vložit nový seminář | Agentura Legis";
    include_once("header.php");
?>
       <link rel="stylesheet" href="stylesadmin.css">

        <div class="container">


          <div class="pagePadding">
                <h1>Vložení semináře</h1>
            <div class="pageText">
              <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                  <form enctype="multipart/form-data" action="/admin/php/vloz_seminar_skript.php" method="post">
                    <fieldset>
                      <div class="col-md-12">
                        <label for="SemLector">Přednášející:* </label><br>

                        <select class="form-control" name="SemLector" id="SemLector" placeholder="Vybrat přednášejího" required>
                          <?php
                            $sql = "SELECT id_lektora, jmeno FROM lektori";

                            if($query = mysqli_query($conn, $sql)){
                              while($row = mysqli_fetch_array($query)){
                                echo "<option value=".$row["id_lektora"].">".$row["jmeno"]."</option>\n";
                              }
                            } else {
                              echo "ERROR: ".mysqli_error($conn);
                            }

                          ?>
                        </select>
                        <br />

                        <label for="SemName">Název semináře:* </label><br>
                        <input type="text" class="form-control" name="SemName" id="SemName" required /><br />
                        <br />

                         <label for="SemAddress">Místo konání:* </label><br>
                        <select class="form-control" name="SemAddress" id="SemAddress" required>
                          <?php
                            $sql = "SELECT id_mista, nazevmista, mesto, ulice, psc FROM mista";

                            if($query = mysqli_query($conn, $sql)){
                              while($row = mysqli_fetch_array($query)){
                                echo "<option value=".$row["id_mista"].">".$row["nazevmista"].", ".$row["ulice"].", ".$row["psc"].", ".$row["mesto"]."</option>\n";
                              }
                            } else {
                              echo mysqli_error($conn);
                            }
                          ?>
                        </select>
                        <br />

                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                        <label for="SemDay">Datum:* </label><br>
                        <input type="date" class="form-control" name="SemDay" id="SemDay" required /><br />
                      </div>
                      </div>
                      <div class="col-md-4">
                        <label for="SemTime">Zahájení:* </label><br>
                        <input type="time" class="form-control" name="SemTime" id="SemTime" required /><br />
                      </div>
                      <div class="col-md-4">
                        <label for="SemReg">Registrace:* </label><br>
                        <input type="time" class="form-control" name="SemReg" id="SemReg" required /><br />
                      </div>
                      <div class="col-md-4">
                        <label for="SemEnd">Ukončení:* </label><br>
                        <input type="time" class="form-control" name="SemEnd" id="SemEnd" required /><br />
                      </div>
                      <div class="col-md-12">
                      <div class="form-group">
                        <label  for="SemText">Popis semináře:* </label><br>
                        <textarea class="form-control" name="SemText" id="SemText"></textarea><br />

                        <label for="SemPhoto">Ilustrační foto (nepovinné): </label><br>
                        <input id="SemPhoto" type="file" name="SemPhoto" accept="image/*" class="form-control"><br />
                      </div>
                      </div>
                      <div class="col-md-4">
                        <label for="SemCena">Cena za osobu:* </label><br>
                        <input type="number" class="form-control" name="SemCena" id="SemCena" min=1 max=100000 required /><br />
                        <input class="btn btn-primary" type="submit" value="Vložit" /><br /><br />
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <script type="text/javascript" src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
                <script type="text/javascript">
                        tinymce.init({
                                selector: "textarea[name=SemText]",
                                plugins: [
                                        "advlist autolink lists link preview anchor",
                                        "searchreplace visualblocks code fullscreen",
                                        "insertdatetime table contextmenu paste"
                                ],
                                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                                entities: "160,nbsp",
                                entity_encoding: "named",
                                entity_encoding: "raw"
                        });
                </script>

<?php
    include_once("footer.php");
?>
