<?php 
session_start();
if(!isset($_GET['vest_id'])){
  header("Location: WSsveVesti.php");
} else{
  $json_vest = file_get_contents("http://localhost/blog/projekat/webServis/vratiVest.json/".$_GET['vest_id']);
  $vest = json_decode($json_vest);

  $json_komentari = file_get_contents("http://localhost/blog/projekat/webServis/vratiKomentare.json/".$_GET['vest_id']);
  $komentari = json_decode($json_komentari);
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
          <h1 style="color:maroon"><?php echo $vest->Naslov; ?><br><small style="color:maroon"><b>Kategorija: </b><?php echo $vest->Naziv; ?></small></h1>
        </div>
    </div>
  </div>
  <div class="row pretraga_vesti">
    <div class="col-lg-6">
      <h1 style="color: maroon">Vest</h1>
      <p><?php echo $vest->Tekst; ?></p>
      <?php 
                if(!empty($vest->Img)){
                  ?>
                    <p><img src="<?php echo $vest->Img;?>" alt="" class="img-responsive"></p>
                  <?php
                }
             ?>
    </div>
    <div class="col-lg-6">
      <h3 style="color: maroon">Komentari</h3>
      <?php 
        foreach ($komentari as $k) {
          echo "<p>".$k->Komentar."</p>";
          echo "<p>".$k->Username."</p>";
          echo "<hr>";
        }
       ?>
       <div class="well" style="background-color: maroon">
          <textarea name="tekst" id="tekst" cols="30" rows="10" class="form-control" placeholder="Unesite tekst komentara..."></textarea>
        <input type="submit" id="submit" name="submit" class="btn btn-secondary btn-block" onclick = "dodajKomentar();" value="Postavi komentar" style="color: maroon">
       </div>
    </div>
  </div>
  </div>
 


<?php include "includes/footer.php";?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script>
  function Komentar(komentar, vest_id,korisnik_id){
      this.Komentar = komentar;
      this.VestId = vest_id;
      this.KorisnikId = korisnik_id;
  }

  function dodajKomentar(){
  var tekst = $("#tekst").val();
  var vest_id = "<?php echo $_GET['vest_id']; ?>";
  var korisnik_id = "<?php echo $_SESSION['kor_id']; ?>";

  if(tekst.length == 0 || vest_id.length == 0 || korisnik_id.length == 0 ){
    alert("Popunite sva polja!");
  } else{
    var komentar = new Komentar(tekst,vest_id,korisnik_id);
    var json_komentar = JSON.stringify(komentar);
    $.post( "http://localhost/blog/projekat/webServis/dodajKomentar", json_komentar, function( json ) {
        var data = JSON.parse(json);
        alert(data.poruka);
        ocisti();
      });
  }
  }

  function ocisti(){
  $("#tekst").val("");
  }
</script>
</body>
</html>