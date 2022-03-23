<?php
  $title = "Seminář | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }

  $id_seminare = (int)$_GET["id"];

  $id_seminare = (int)$_GET["id"];
  $sql = "SELECT * FROM seminar WHERE id_seminare = $id_seminare";

  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $symbol = $row["symbol"];
      $nazevSeminare = $row["nazev"];
      $datum = $row["datum"];
      $zahajeni = date("H:i", strtotime($row["zahajeni"]));
      $registrace = date("H:i", strtotime($row["registrace"]));
      $ukonceni = date("H:i", strtotime($row["ukonceni"]));
      $popis = $row["popis"];
      $cena = $row["cena"];
      $id_mista = $row["id_mista"];
      $id_lektora = $row["id_lektora"];
    }
  } else {
    echo mysqli_error($conn);
    die();
  }
?>
 <link rel="stylesheet" href="stylesadmin.css">

 <div class="container">


   <div class="pagePadding">
         <h1>Aktualizace semináře</h1>
     <div class="pageText">
       <div class="row">

         <div class="col-lg-8 col-lg-offset-2">
           <form enctype="multipart/form-data" action="/admin/php/aktualizace_seminar.php" method="post">
             <input type="hidden" name="id" value="<?php echo $id_seminare; ?>">
             <fieldset>
               <div class="col-md-12">
                 <label for="SemLector">Přednášející:* </label><br>

                 <select class="form-control" name="SemLector" id="SemLector" placeholder="Vybrat přednášejího" required>
                   <?php
                     $sql = "SELECT id_lektora, jmeno FROM lektori";

                     if($query = mysqli_query($conn, $sql)){
                       while($row = mysqli_fetch_array($query)){
                         if($row["id_lektora"] == $id_lektora){
                           echo "<option value=".$row["id_lektora"]." selected>".$row["jmeno"]."</option>\n";
                         } else {
                           echo "<option value=".$row["id_lektora"].">".$row["jmeno"]."</option>\n";
                         }

                       }
                     } else {
                       echo "ERROR: ".mysqli_error($conn);
                     }

                   ?>
                 </select>
                 <br />

                 <label for="SemName">Název semináře:* </label><br>
                 <input type="text" class="form-control" name="SemName" id="SemName" value="<?php echo $nazevSeminare; ?>" required /><br />
                 <br />

                  <label for="SemAddress">Místo konání:* </label><br>
                 <select class="form-control" name="SemAddress" id="SemAddress" required>
                   <?php
                     $sql = "SELECT id_mista, nazevmista, mesto, ulice, psc FROM mista";

                     if($query = mysqli_query($conn, $sql)){
                       while($row = mysqli_fetch_array($query)){
                         if ($row["id_mista"] == $id_mista){
                           echo "<option value=".$row["id_mista"]." selected>".$row["nazevmista"].", ".$row["mesto"].", ".$row["ulice"].", ".$row["psc"]."</option>\n";
                         } else {
                           echo "<option value=".$row["id_mista"].">".$row["nazevmista"].", ".$row["mesto"].", ".$row["ulice"].", ".$row["psc"]."</option>\n";
                         }

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
                 <input type="date" class="form-control" name="SemDay" id="SemDay" value="<?php echo $datum; ?>" required /><br />
               </div>
               </div>
               <div class="col-md-4">
                 <label for="SemTime">Zahájení:* </label><br>
                 <input type="time" class="form-control" name="SemTime" id="SemTime" value="<?php echo $zahajeni; ?>" required /><br />
               </div>
               <div class="col-md-4">
                 <label for="SemReg">Registrace:* </label><br>
                 <input type="time" class="form-control" name="SemReg" id="SemReg" value="<?php echo $registrace; ?>" required /><br />
               </div>
               <div class="col-md-4">
                 <label for="SemEnd">Ukončení:* </label><br>
                 <input type="time" class="form-control" name="SemEnd" id="SemEnd" value="<?php echo $ukonceni; ?>" required /><br />
               </div>
               <div class="col-md-12">
               <div class="form-group">
                 <label  for="SemText">Popis semináře:* </label><br>
                 <textarea class="form-control" name="SemText" id="SemText"><?php echo $popis; ?></textarea><br />

                 <label for="SemPhoto">Ilustrační foto (nahráním nahradíte stávající foto): </label><br>
                 <input id="SemPhoto" type="file" name="SemPhoto" accept="image/*" class="form-control"><br />
               </div>
               </div>
               <div class="col-md-4">
                 <label for="SemCena">Cena za osobu:* </label><br>
                 <input type="number" class="form-control" name="SemCena" id="SemCena" min=1 max=100000 value="<?php echo $cena; ?>" required /><br />
                 <input class="btn btn-primary" type="submit" value="Aktualizovat" /><br /><br />
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
