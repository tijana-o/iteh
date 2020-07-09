<?php
session_start();
if(!isset($_SESSION['kor_id'])){
  header("Location: login.php");
} 
	$sve_vesti_json = file_get_contents("http://localhost/blog/projekat/webServis/vratiVesti.json");
	$sve_vesti= json_decode($sve_vesti_json);

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
					<h1 style="color: maroon">Sve vesti <small style="color: maroon"> sa veb servisa</small></h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<table class="table">
					<thead>
						<tr>
							<th colspan = 1 style="color: maroon;text-align:center">Naslov</th>
							<th colspan = 3 style="color: maroon;text-align:center">Tekst</th>
							<th colspan = 1 style="color: maroon;text-align:center">Kategorija</th>
							<th colspan = 3 style="color: maroon;text-align:center">Slika</th>

						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($sve_vesti as $vest) {
								?>
								<tr>
									<td colspan = 1 style="color: maroon"><?php echo $vest->Naslov; ?></td>
									<td colspan = 3 style="color: maroon"><?php echo $vest->Tekst; ?></td>
									<td colspan = 1 style="color: maroon"><?php echo $vest->Naziv; ?></td>
									<?php if(isset($vest->Img)){ ?>
									<td colspan = 3 style="color: maroon"><img src= "<?php echo $vest->Img; ?> " alt="" style="width:200px; height:auto;"></td>
											<?php } ?>
									<td colspan = 1><a href='http://localhost/blog/projekat/vest.php?vest_id=<?php echo $vest->Id; ?>' role="button" class="btn">Dodaj komentar</a></td>
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