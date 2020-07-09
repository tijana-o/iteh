<?php 
  session_start();
if(!isset($_SESSION['kor_id'])){
  header("Location: login.php");
}
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
          <h1 style="color: maroon">Vesti po kategorijama <small></small></h1>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div id="piechart" style="margin-left: 2.5em;padding: 0 7em 2em 0;border-width: 2px;  "></div>
    </div>
    <div class="col-lg-6">
      <b style="color: maroon">Vaša IP adresa je:</b><span id="vasa_ip"></span>
    </div>
  </div>
</div>

<?php include "includes/footer.php";?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      setTimeout(function(){
        $.get( "http://localhost/blog/projekat/webServis/vratiBrojVestiPoKategorijama.json", function( json ) {
        var data = JSON.parse(json);
        var dt = Array();
        dt.push(['Kategorija','Broj vesti']);
        $.each( data, function( i, val ) {
          dt.push([val.Naziv, parseInt(val.broj_vesti)]);
        });
        var data = google.visualization.arrayToDataTable(dt);

        var options = {
          title: 'Broj vesti po kategorijama'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      });
      },1000);

      $.getJSON( "http://ip.jsontest.com/", function( json ) {
        $("#vasa_ip").html(json.ip);
       });
        
    </script>
</body>
</html>