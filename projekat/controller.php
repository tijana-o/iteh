<?php 

include "konekcija.php";
include "Kategorija.class.php";
include "Vest.class.php";

if(isset($_GET['akcija']) && $_GET['akcija']=="obrisiVest"){
	$vest_id = $mysqli->real_escape_string($_GET['vest_id']);
	if(Vest::obrisiVest($vest_id)==true){
		echo "Vest je uspešno obrisana!";
	}
	else{
		echo "Greška prilikom brisanja vesti!";
	}
}

if(isset($_GET['akcija']) && $_GET['akcija']=="pretraga"){
	$kategorijaP = $mysqli->real_escape_string($_POST['kategorijaP']);
	$pretragaP = $mysqli->real_escape_string($_POST['pretragaP']);
		$pretraga = Vest::pretraga(trim($kategorijaP),trim($pretragaP));
		?>
		<div class="row">
		<?php for($i=0; $i<count($pretraga);$i++){ ?>
			<div class="col-lg-12">
				<h3><?php echo $pretraga[$i]->Naslov; ?></h3>
				<p><?php echo $pretraga[$i]->Tekst; ?></p>
				<?php 
                if(!empty($pretraga[$i]->Img)){
                  ?>
                    <img src="<?php echo $pretraga[$i]->Img;?>">
                  <?php
                }
             ?>
				<hr>
			</div>
		<?php } ?>
			</div>
			<?php 
	}
 ?>