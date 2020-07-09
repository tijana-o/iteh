<?php
  session_start();
if(!isset($_SESSION['kor_id']) || $_SESSION['kor_admin'] == 0){
  header("Location: login.php");
}
include "konekcija.php";
include "Kategorija.class.php";
include "Vest.class.php";

$sve_kategorije = Kategorija::vratiKategorije();

if(isset($_POST['submit'])){
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
$kategorija_id = $_POST['kategorija'];
$naslov = $mysqli->real_escape_string($naslov);
$tekst = $mysqli->real_escape_string($tekst);
$kategorija_id = $mysqli->real_escape_string($kategorija_id);


 $target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg2= "Fajl nije slika.";
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    $msg2= "Fajl već postoji.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    $msg2= "Fajl je previše velik.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $msg2= "Samo JPG, JPEG, PNG & GIF fajlovi su dozvoljeni.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $msg2= $msg2 . "-" . "Vaš fajl nije upload-ovan.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $msg2= "Fajl ". basename( $_FILES["fileToUpload"]["name"]). " je uspešno upload-ovan.";
    } else {
        $msg2="Desila se greška prilikom upload-a slike.";
    }
}

if(isset($target_file)){
$nova_vest = new Vest($naslov,$tekst,$kategorija_id,$target_file);
}
else{
  $nova_vest = new Vest($naslov,$tekst,$kategorija_id,"");
}
if($nova_vest->dodajVest()==true){
  $msg = "Uspešno dodata vest!";
}
else{
  $msg = "Greška pri dodavanju vesti!";
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body style="background-color: #ffdd99">
<?php 
  if($_SESSION['kor_admin'] == 0){
    include "includes/navbaruser.php";}
    else{
      include "includes/navbaradmin.php";
    }
   ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <?php include "includes/jumbotron.php"; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
       <div class="page-header">
          <h1 style="color: maroon">Dodaj vest</h1>
        </div>
    </div>
  </div>
  <div class="row dodaj_vest">
    <div class="col-lg-2 col-xs-12"></div>
    <div class="col-lg-8 col-xs-12">
      <div class="well" style="background-color: maroon" >
        
          <?php
          if(isset($msg)){ ?>
            <div class="alert alert-info text-center">
              <?php echo $msg; ?>
              </div>
              <?php } ?>
              <?php
          if(isset($msg2)){ ?>
            <div class="alert alert-info text-center">
              <?php echo $msg2; ?>
              </div>
              <?php } ?>
        <form action="" method="POST" enctype="multipart/form-data">
        <select name="kategorija" id="kategorija" class="form-control">
                  <option value="">Izaberi kategoriju...</option>

          <?php
             for($i=0; $i<count($sve_kategorije); $i++){

          ?>
            <option value="<?php echo $sve_kategorije[$i]->KategorijaId; ?>"><?php echo $sve_kategorije[$i]->Naziv ?></option>

          <?php
            }
          ?>
        </select>
        <input type="text" id="naslov" name="naslov" class="form-control" placeholder="Naslov">
        <textarea name="tekst" id="tekst" cols="30" rows="10" class="form-control" placeholder="Unesite tekst vesti..."></textarea>
        Izaberite sliku:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" id="submit" name="submit" class="btn btn-secondary btn-block" value="Pošalji">
        </form>
      </div>
    </div>
    <div class="col-lg-2 col-xs-12"></div>
  </div>
</div>

<?php include "includes/footer.php";?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>