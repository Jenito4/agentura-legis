<?php
  $title = "Objednání | Agentura Legis";
  include_once("header.php");

  if(!isset($_GET["id"])){
    header("location: index.php");
    die();
  }
  //$id = mysqli_real_escape_string($conn, $_POST["id"]);
  $id = (int)$_GET["id"];
  $sql = "SELECT nazev, cena FROM seminar WHERE id_seminare = $id";

  $nazev="";
  $cena=0;
  if($query = mysqli_query($conn, $sql)){
    while($row = mysqli_fetch_array($query)){
      $nazev = $row["nazev"];
      $cena = $row["cena"];
    }
  }
  else {
    echo mysql_error();
  }


?>
  <div class="container">


    <div class="pagePadding">
          <h1>Objednat seminář</h1>
      <div class="pageText">
      <?php
        if(isset($_GET["err"])){
        ?>
        <div class="alert alert-danger" role="alert">
          Objednávka se nezdařila. Zkuste to prosím znovu.
        </div>
        <?php
        }
        ?>
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                  <form action="/php/vytvorit_objednavku.php" method="post">
                    <input type="hidden" name="id_seminare" value="<?php echo $id; ?>">
                    <input type="hidden" name="priceOne" value="<?php echo $cena; ?>">
                    <fieldset>
                      <div class="col-md-12">
                       <div class="form-group">
                        <label for="billingFirsSeminary">Seminář: </label><br>
                        <input type="text" class="form-control" name="billingFirsSeminary" value="<?php echo $nazev; ?>" disabled><br />
                        <label for="billingCompNane">Název společnosti: </label><br>
                        <input type="text" class="form-control" name="billingCompName" required /><br />
                       </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <div class="col-md-5">
                        <label for="billingFirstName">Jméno: </label><br>
                        <input type="text" class="form-control" name="billingFirstName" required><br />
                      </div>
                      <div class="col-md-7">
                        <label for="billingSurname">Příjmení: </label><br>
                        <input type="text" class="form-control" name="billingSurname" required /><br />
                      </div>
                    </fieldset>
                    <fieldset>
                      <div class="col-md-5">
                        <label for="billingPhone">Telefon: </label><br>
                        <input type="tel" class="form-control" name="billingPhone" required/><br />
                      </div>
                      <div class="col-md-7">
                        <label for="billingEmail">E-mail: </label><br>
                        <input type="email" class="form-control" name="billingEmail" required /><br />
                      </div>
                    </fieldset>
                    <fieldset>
                      <div class="col-md-12">
                         <label for="billingCompStreet">Adresa společnosti: </label><br>
                        <input type="text" class="form-control" name="billingCompStreet" placeholder="Adresa a číslo popisné..." required/><br />
                        </div>
                        <div class="col-md-5">
                        <label for="billingCompPSC">PSČ: </label><br>
                        <input type="text" class="form-control" name="billingCompPSC" required><br />
                      </div>
                      <div class="col-md-7">
                        <label for="billingCompCity">Město: </label><br>
                        <input type="text" class="form-control" name="billingCompCity" required /><br />
                      </div>
                    </fieldset>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="billingCount">Počet účastníků: </label><br>
                          <input type="number" class="form-control" name="billingCount" id="billingCount" min=1 max=10000 value=1 required /><br />
                        </div>
                     </div>
                     <div class="col-md-7">
                          <label class="radio-inline"><input type="radio" name="payment" id="banka" value="banka" checked>Bankovní převod</label>
                     </div>
                     <div class="col-md-5">
                          <label class="radio-inline"><input type="radio" name="payment" id="hotovost" value="hotovost">Platba hotově</label> <br /><br />
                     </div>
                     <div class="col-md-12">
                        <div class="form-group" id="platba">
                          <label for="billingBankAccount">Číslo účtu, ze kterého bude placeno: </label><br />
                          <input type="text" class="form-control" name="billingBankAccount" id="billingBankAccount" required /><br />
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                          <label  for="billingSurname">Zpráva k objednávce: </label><br>
                          <textarea class="form-control" name="text" placeholder="Máte nějaké přání?" maxlength="200" style="height:8em;"></textarea><br />

                          <div class="col-sm-12 cenaSeminare">
                          <label for="priceFull"> </label>Cena celkem:
                          <strong class="cenaSeminare" id="priceFull">
                              <?php echo $cena; ?> Kč
                            </strong>
                          </div>
                        </div>
                        <div>
                          Odesláním souhlasíte s obchodními podmínkami
                        </div>
                      <!--<div id="platbahotove">
                        Odesláním souhlasíte s obchodními podmínkami
                      </div>-->
                          <br>

                          <input class="btn btn-primary" type="submit" value="Objednat" /><br /><br />
                        </div>

                     </fieldset>
                  </form>
                </div>
            </div>
        </div>
    </div>
  </div>

<script>

const countElement = document.getElementById('billingCount');
countElement.addEventListener('change', (event) => {
  // Součet
  var nUsers = countElement.value;
  var priceOne = <?php echo $cena; ?>;
  var newPrice = priceOne * nUsers;

  document.getElementById('priceFull').innerHTML = newPrice + " Kč";
});


$(document).ready(function(){
  $("input[type='radio']").change(function(){
    if($(this).val()=="banka")
    {
      $('#platba').show();
      $('#billingBankAccount').prop("required", true);

    }
    else {
      $('#platba').hide();
      $('#billingBankAccount').prop("required", false);
    }
  });
});
</script>

<?php
  include_once("footer.php");
?>
