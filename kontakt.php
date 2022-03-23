<?php
  $title = "Kontakt | Agentura Legis";
  include_once("header.php");
?>
  <div class="container">


    <div class="pagePadding">
          <h1>Kontakt</h1>

          <?php
          if(isset($_GET["ok"])){
          ?>
          <div class="alert alert-success" role="alert">
            Děkujeme za dotaz! Budeme se Vám snažit co nejdříve odpovědět.
          </div>
          <?php
          }
        ?>

      <div class="pageText">
        <div class="row">

            <div class="col-md-5">
              <b>Ing. Markéta Kvapilová</b> <br />
              Telefon: +420 604 603 726<br />
              E-mail: legis.sumperk@seznam.cz<br />
              IČO: 64103323<br />
              <br /><br />
              <b>Adresa:</b> <br />
              Revoluční 1684/34A, 78701 Šumperk<br />
              <br /><br />
              <b>Bankovní údaje: </b><br />
              Číslo účtu: 43-7409620207/0100<br />
              KB Šumperk<br />
              Neplátce DPH<br />
              <br /><br />

            </div>
            <div class="col-md-7">
                <form action="/php/mail.php" method="post">
                  <b>Napište nám!</b> <br />
                  <input type="text" class="form-control" name="jmeno" placeholder="Jméno..." required /><br />
                  <input type="tel" class="form-control" name="telefon" placeholder="Telefon..." required /><br />
                  <input type="email" class="form-control" name="email" placeholder="E-mail..." required /><br />
                  <textarea name="zprava" class="form-control" name="zprava" placeholder="Jaký je váš dotaz?" maxlength="200" style="height:150px;"></textarea><br />
                  <input class="btn btn-primary" type="submit" value="Odeslat" /><br /><br />
                </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>


<?php
  include_once("footer.php");
?>
