<?php
  $title = "Vložit nového lektora | Agentura Legis";
  include_once("header.php");
?>

 <link rel="stylesheet" href="stylesadmin.css">
  <div class="container">


    <div class="pagePadding">
          <h1>Vložení lektora</h1>
      <div class="pageText">

          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                  <form action="/admin/php/vloz_lektor_skript.php" method="post">  
                    <fieldset>
                      <div class="col-md-12">
                         <label for="LektorJmeno">Jméno a příjmení lektora:* </label><br>
                        <input type="text" class="form-control" name="LektorJmeno" required /><br />
                          <label  for="LektorPozice">Pozice a publikace:* </label><br>
                          <textarea class="form-control" name="LektorPozice" placeholder="napište pozici a publikaci lektora" style="height:8em;"></textarea><br />
                        </div>
                        </fieldset>
                        <fieldset>
                      <div class="col-md-5">
                        <label for="LektorTelefon">Telefon:* </label><br>
                        <input type="tel" class="form-control" name="LektorTelefon" required/><br />
                      </div>
                      <div class="col-md-7">
                        <label for="LektorEmail">E-mail:* </label><br>
                        <input type="email" class="form-control" name="LektorEmail" required /><br />
                      </div>
                    </fieldset>
                    <div class="col-md-12">
                    <input class="btn btn-primary" type="submit" value="Vložit" /><br /><br />
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  
<?php
    include_once("footer.php");
?>
