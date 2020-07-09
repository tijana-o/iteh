<?php 
session_start();
if(!isset($_SESSION['kor_id'])){
  header("Location: login.php");
}
include "konekcija.php";
include "Kategorija.class.php";
include "Vest.class.php";

$sve_kategorije = Kategorija::vratiKategorije();
$sve_vesti = Vest::vratiVesti();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title style="color: white">Blog</title>
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
          <h1 style="color: maroon">Sve vesti <small style="color: maroon"> Pročitaj ili pretraži</small></h1>
        </div>
    </div>
  </div>
  <div class="row pretraga_vesti">
    <div class="col-lg-3">
      <h2 style="color: maroon">Filteri</h2>
        <select class="form-control" name="kategorija" id="kategorija">
          <option value="999">Sve kategorije</option>

            <?php
             for($i=0; $i<count($sve_kategorije); $i++){

          ?>
            <option value="<?php echo $sve_kategorije[$i]->KategorijaId; ?>"><?php echo $sve_kategorije[$i]->Naziv ?></option>

          <?php
            }
          ?>
        </select>
        <br>
        <p style="color: maroon">
          Unesi naslov vesti za pretragu:
        </p>
        <input type="" id="pretraga" name="pretraga" class="form-control" placeholder="Unesi naslov...">
        <br>
        <button onclick="primeniFilter();" class="btn btn-secondary btn-block" style="color:maroon">Primeni filtere</button>
    </div>
    <div class="col-lg-9">
      <h2 style="color: maroon">Vesti</h2>
      <div id="sve_vesti">
        <div class="row">
          <?php for($i=0; $i<count($sve_vesti); $i++){ ?>
          <div class="col-lg-12">
            <h3 style="color: maroon"><?php echo $sve_vesti[$i]->Naslov; ?></h3>
            <p style="color: maroon"><?php echo $sve_vesti[$i]->Tekst; ?></p>
            <?php 
                if(!empty($sve_vesti[$i]->Img)){
                  ?>
                    <img src="<?php echo $sve_vesti[$i]->Img;?>">
                  <?php
                }
             ?>
            <hr>
            </div>

          <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "includes/footer.php";?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script>
  function primeniFilter(){
    var kategorija = $("#kategorija").val();
    var pretraga = $("#pretraga").val();

    $.post( "controller.php?akcija=pretraga", { kategorijaP: kategorija, pretragaP: pretraga })
    .done(function( data ) {
    $("#sve_vesti").html(data);
    });
  }
</script>
</body>
</html>