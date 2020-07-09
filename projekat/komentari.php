<?php 
  session_start();
if(!isset($_SESSION['kor_id']) || $_SESSION['kor_admin'] == 0){
  header("Location: login.php");
}
include "konekcija.php";
  $sql = "SELECT * FROM komentari as k JOIN vesti as v ON k.VestId = v.Id JOIN korisnici as kor ON k.KorisnikId = kor.Id JOIN kategorije as ka ON ka.KategorijaId = v.KategorijaId";
  $q = $mysqli->query($sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
          <h1 style="color: maroon">Svi komentari <small style="color:maroon"> Pročitaj ili pretraži sve komentare</small></h1>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table">
        <thead>
          <tr>
            <th>Komentar</th>
            <th>Vest</th>
            <th>Kategorija</th>
            <th>Korisnik</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            while($red = $q->fetch_object()){
              ?>
              <tr>
                <td><?php echo $red->Komentar ?></td>
                <td><?php echo $red->Naslov ?></td>
                <td><?php echo $red->Naziv ?></td>
                <td><?php echo $red->Username ?></td>
              </tr>
              <?php
            }
           ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include "includes/footer.php";?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready( function () {
    $('table').DataTable();
} );
</script>
</body>
</html>