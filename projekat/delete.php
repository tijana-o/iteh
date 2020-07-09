<?php 
  session_start();
if(!isset($_SESSION['kor_id']) || $_SESSION['kor_admin'] == 0){
  header("Location: login.php");
}
include "konekcija.php";
include "Vest.class.php";

$sve_vesti = Vest::vratiVesti();
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
          <h1 style="color: maroon">Izbriši vest</h1>
        </div>
    </div>
  </div>
  <div class="row dodaj_vest">
    <div class="col-lg-2 col-xs-12"></div>
    <div class="col-lg-8 col-xs-12">
      <div class="well" style="background-color: maroon">
        <form action="" method="POST">
        <select name="vest" id="vest" class="form-control">
        <option value="">Izaberi vest...</option>
        <?php
            for($i=0; $i<count($sve_vesti); $i++){

              ?>
              <option value="<?php echo $sve_vesti[$i]->Id ?>"><?php echo $sve_vesti[$i]->Naslov ?></option>

              <?php
            }
            ?>
        </select>
        <br>
        <input type="submit" id="submit" name="submit" class="btn btn-secondary btn-block" onclick = "obrisi();" value="Obriši">
        </form>
      </div>
    </div>
    <div class="col-lg-2 col-xs-12"></div>
  </div>
</div>

<?php include "includes/footer.php";?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script>
  function obrisi(){
      var vest_id = $("#vest").val();
      $.get( "controller.php?vest_id="+vest_id+"&akcija=obrisiVest", function( data ) {
      alert(data);
    });
  }
</script>
</body>
</html>