<?php
include_once("../../mysql_connect.php");

$error = false;

if(isset($_POST["id"])){
 $id = mysqli_real_escape_string($conn, $_POST["id"]);
} else {
  $error = true;
}


if(isset($_POST["SemLector"])){
 $SemLector = mysqli_real_escape_string($conn, $_POST["SemLector"]);
} else {
  $error = true;
}

if(isset($_POST["SemAddress"])){
 $SemAddress = mysqli_real_escape_string($conn, $_POST["SemAddress"]);
} else {
  $error = true;
}

if(isset($_POST["SemName"]) && strlen(trim($_POST["SemName"])) > 0){
 $SemName = mysqli_real_escape_string($conn, $_POST["SemName"]);
} else {
  $error = true;
}

if(isset($_POST["SemText"]) && strlen(trim($_POST["SemText"])) > 0){
 $SemText = mysqli_real_escape_string($conn, $_POST["SemText"]);
} else {
  $error = true;
}

if(isset($_POST["SemDay"])){
 $SemDay = mysqli_real_escape_string($conn, $_POST["SemDay"]);
} else {
  $error = true;
}

if(isset($_POST["SemTime"])){
 $SemTime = mysqli_real_escape_string($conn, $_POST["SemTime"]);
} else {
  $error = true;
}

if(isset($_POST["SemEnd"])){
 $SemEnd = mysqli_real_escape_string($conn, $_POST["SemEnd"]);
} else {
  $error = true;
}
if(isset($_POST["SemReg"])){
 $SemReg = mysqli_real_escape_string($conn, $_POST["SemReg"]);
} else {
  $error = true;
}

if(isset($_POST["SemCena"])){
 $SemCena = mysqli_real_escape_string($conn, $_POST["SemCena"]);
} else {
  $error = true;
}


// přidání ilustrační fotky
if(!$error && !empty($_FILES['SemPhoto']['name'])){
  if(file_exists("../../foto_seminare/".$_FILES['SemPhoto']['name'])){
      $length = (int)"20";
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      $newName = $randomString."".$_FILES['SemPhoto']['name'];
      $_FILES['SemPhoto']['name'] = $newName;
  }

  $error = addIfPhoto();

}


if(!$error){
  $photoName = "";

  if(!empty($_FILES['SemPhoto']['name'])){
    $photoName = $_FILES['SemPhoto']['name'];
  }

  if(empty($_FILES['SemPhoto']['name'])){
    $sql = "UPDATE seminar SET nazev = '$SemName', datum = '$SemDay', zahajeni = '$SemTime', registrace = '$SemReg', ukonceni = '$SemEnd',
                              popis = '$SemText', cena = $SemCena, id_lektora = '$SemLector', id_mista = '$SemAddress'
                            WHERE id_seminare = $id";
  } else {
    $sql = "UPDATE seminar SET nazev = '$SemName', datum = '$SemDay', zahajeni = '$SemTime', registrace = '$SemReg', ukonceni = '$SemEnd',
                              popis = '$SemText', cena = $SemCena, id_lektora = '$SemLector', id_mista = '$SemAddress', foto = '$photoName'
                            WHERE id_seminare = $id";
  }


  if($query = mysqli_query($conn, $sql)){
    header("location: ../seminar.php?id=".$id);
    die();
  }else{
    echo mysqli_error($conn);
  }
} else {
  header("location: ../aktualizovat_seminar.php?err=1");
  die();
}





function addIfPhoto(){
  $valid_formats = array("jpg", "png", "bmp", "PNG", "JPG", "jpeg", "JPEG");
   $max_file_size = 6000*6000;
   $path =  $_SERVER["DOCUMENT_ROOT"]."/foto_seminare/";

   if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_FILES['SemPhoto']['name'];
     if ($_FILES['SemPhoto']['error'] == 4) {
         continue;
     }
     if ($_FILES['SemPhoto']['error'] == 0) {
         if ($_FILES['SemPhoto']['size'] > $max_file_size) {
             // fotka příliš velká
             continue;
         }
     elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
       // formát není validní
       continue;
     }
         else{
             if(move_uploaded_file($_FILES["SemPhoto"]["tmp_name"], $path.$name))
               return false; //nahráno úspěšně. error = false
         }
     }
   }
   return true; // error = true --> nenahráno
}



?>
