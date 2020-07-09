<?php 
	session_start();
if(!isset($_SESSION['kor_id'])){
  header("Location: login.php");
}
	$xml=simplexml_load_file("https://vasadvokat.com/feed/") or die("Error: Cannot create object");
	
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
   ?>	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php include "includes/jumbotron.php"; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="page-header">
					<h1 style="color: maroon">Vaš advokat <small style="color: maroon"> -portal za pružanje pravne pomoći</small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<table class="table">
					<thead>
						<tr>
							<th style="color: maroon">Naslov</th>
							<th style="color: maroon">Tekst</th>
							<th style="color: maroon">Link</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($xml->channel->item as $i) {
								?>
								<tr>
									<td style="color: maroon"><?php echo $i->title; ?></td>
									<td style="color: maroon"><?php echo $i->description;?></td>
									<td><a target ="_blank" href="<?php echo $i->link; ?>">Pročitaj vest</a></td>
								</tr>
								<?php
							}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php include "includes/footer.php";?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>