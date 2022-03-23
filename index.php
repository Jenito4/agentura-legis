<?php
    $title = "Agentura Legis - vzdělávací semináře Šumperk";
    include_once("header.php");

    $sql = "SELECT * FROM seminar LIMIT 1";
    if($query = mysqli_query($conn, $sql)){
        while($row = mysqli_fetch_array($query)){
            echo $row["nazev"];
        }
    } else{
        echo mysqli_error($conn);
    }
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="/carousel/tabule.jpeg" alt="Agentura Legis - semináře Šumperk" class="img-responsive" style="width:35%;">
      </div>

      <div class="item">
        <img src="/carousel/kalkul.jpg" alt="Agentura Legis - semináře Šumperk" class="img-responsive" style="width:35%;">
      </div>
    </div>

    <!-- Left and right -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="container-fluid bg-3">
 <div class="row">
   <div class="pagePadding">
    <h1>Agentura Legis - vzdělávací semináře Šumperk</h1>

    <div class="box">
    <div class="container">
     	<div class="row">

			    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

					<div class="box-part text-center">

                        <i class="fa fa-instagram fa-3x" aria-hidden="true"></i>

						<div class="title">
              <svg class="bi bi-bookmark-check" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.5 2a.5.5 0 0 0-.5.5v11.066l4-2.667 4 2.667V8.5a.5.5 0 0 1 1 0v6.934l-5-3.333-5 3.333V2.5A1.5 1.5 0 0 1 4.5 1h4a.5.5 0 0 1 0 1h-4z"/>
                <path fill-rule="evenodd" d="M15.854 2.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 4.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
              </svg>
							<h2>Semináře</h2>
						</div>

						<div class="text">
							<span class="border-right">Nabízíme profesní vzdělání.</span>
						</div>
					 </div>
				</div>

				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

					<div class="box-part text-center">

					    <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>

						<div class="title">
              <svg class="bi bi-person-check" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM6 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm6.854.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
              </svg>
							<h2>Lektoři</h2>
						</div>

						<div class="text">
							<span>Lidé s praxí a zkušeností.</span>
						</div>
					 </div>
				</div>

				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

					<div class="box-part text-center">

                        <i class="fa fa-facebook fa-3x" aria-hidden="true"></i>

						<div class="title">
              <svg class="bi bi-graph-up" width="5em" height="5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h1v16H0V0zm1 15h15v1H1v-1z"/>
                <path fill-rule="evenodd" d="M14.39 4.312L10.041 9.75 7 6.707l-3.646 3.647-.708-.708L7 5.293 9.959 8.25l3.65-4.563.781.624z"/>
                <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4h-3.5a.5.5 0 0 1-.5-.5z"/>
              </svg>
							<h2>Zaměření</h2>
						</div>

						<div class="text">
							<span>Účetnictví, daně, mzdy, pojištění, personalistika a právo.</span>
						</div>
					 </div>
				</div>
		</div>
    </div>
</div>


    <?php
         $sql = "SELECT * FROM oznameni";
        if($query = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($query) > 0){
              while($row = mysqli_fetch_array($query)){
                  ?>
                  <div class='clickable-row alert alert-danger'>
                    <h2>Oznámení</h2>
                    <hr>
                    <h3 class="alert-heading" style="text-align:center"><?php echo $row["nazev"]; ?></h3>
                    <p style="text-align:center"><?php echo $row["obsah"]; ?></p>
                  </div>
                <?php
              }
          } else {
          }
        } else {
          echo mysqli_error($conn);
        }
     ?>

     <br />

    <div class="pageText">
     <h2>Nejbližší semináře</h2><br>     

       <?php
         $sql="SELECT id_seminare, nazev, cena, datum, foto, mesto FROM seminar, mista WHERE mista.id_mista = seminar.id_mista AND datum >= CURDATE() ORDER BY datum LIMIT 3";

         if($query = mysqli_query($conn, $sql)){
             if(mysqli_num_rows($query) == 0) {
             echo '<div class="col-xs-12 text-center">V současné době nenabízíme nové semináře</div>';
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
                       <figure><img src="/foto_seminare/<?php echo $foto; ?>" class="img-responsive" alt="<?php echo $row["nazev"]; ?> - semináře Šumperk Agentura Legis"></figure>
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

<?php
    include_once("footer.php");
?>

