<?php
require 'flight/Flight.php';

$json_podaci = file_get_contents('php://input');
Flight::set('json_podaci', $json_podaci);

Flight::route('/', function(){
    echo 'hello world!';
});

Flight::route('GET /vratiBrojVestiPoKategorijama.json', function(){
	include "konekcija.php";

	$sql = "SELECT count(v.Id) as broj_vesti, k.Naziv FROM vesti as v JOIN kategorije as k ON v.KategorijaId=k.KategorijaId GROUP BY v.KategorijaId";
	$q = $mysqli->query($sql);
	$niz=array();

	while($red=$q->fetch_object()){
		$niz[]=$red;
	}
	echo json_encode($niz);
});

Flight::route('GET /vratiVesti.json', function(){
	include "konekcija.php";

	$sql = "SELECT * FROM vesti as v JOIN kategorije as k ON v.KategorijaId = k.KategorijaId";
	$q = $mysqli->query($sql);
	$niz=array();

	while($red=$q->fetch_object()){
		$niz[]=$red;
	}
	echo json_encode($niz);
});



Flight::route('GET /vratiVest.json/@id', function($id){
	include "konekcija.php";

	$sql = "SELECT * FROM vesti as v JOIN kategorije as k ON v.KategorijaId = k.KategorijaId WHERE Id = '$id'";
	$q = $mysqli->query($sql);
	$red=$q->fetch_object();
	echo json_encode($red);
});



Flight::route('GET /vratiKomentare.json/@id', function($id){
	include "konekcija.php";

	$sql = "SELECT * FROM komentari k JOIN korisnici kor ON k.KorisnikId=kor.Id WHERE VestId = '$id'";
	$q = $mysqli->query($sql);
	$niz=array();

	while($red=$q->fetch_object()){
		$niz[]=$red;
	}
	echo json_encode($niz);
});

Flight::route('POST /dodajVest', function(){
	include "konekcija.php";

	$podaci_json = Flight::get('json_podaci');
	$podaci = json_decode($podaci_json);
	if($podaci == null){
		$odgovor['status']=0;
		$odgovor['poruka']= "Nema podataka";
		echo json_encode($odgovor);
		return false;
	}else{
		if(!property_exists($podaci, 'Naslov') || !property_exists($podaci, 'Tekst') || !property_exists($podaci, 'KategorijaId')){
		$odgovor['status']=0;
		$odgovor['poruka']= "Nisu prosledjeni korektni podaci";
		echo json_encode($odgovor);
		return false;
		}else{
			$naslov = $podaci->Naslov;
			$tekst = $podaci->Tekst;
			$kategorija_id = $podaci->KategorijaId;

			$naslov = $mysqli->real_escape_string($naslov);
			$tekst = $mysqli->real_escape_string($tekst);
			$kategorija_id = $mysqli->real_escape_string($kategorija_id);

			$sql = "INSERT INTO vesti (Naslov, Tekst, KategorijaId) VALUES ('".$naslov."', '".$tekst."','".$kategorija_id."')";

			if($q = $mysqli->query($sql)){
			$odgovor['status']=1;
			$odgovor['poruka']= "Vest je uspesno ubacena";
			echo json_encode($odgovor);
			return false;
			}else{
				$odgovor['status']=0;
				$odgovor['poruka']= "Doslo je do greske";
				echo json_encode($odgovor);
				return false;
			}
		}
	}
});

Flight::route('POST /dodajKomentar', function(){
	include "konekcija.php";

	$podaci_json = Flight::get('json_podaci');
	$podaci = json_decode($podaci_json);
	if($podaci == null){
		$odgovor['status']=0;
		$odgovor['poruka']= "Nema podataka";
		echo json_encode($odgovor);
		return false;
	}else{
		if(!property_exists($podaci, 'Komentar') || !property_exists($podaci, 'KorisnikId') || !property_exists($podaci, 'VestId')){
		$odgovor['status']=0;
		$odgovor['poruka']= "Nisu prosledjeni korektni podaci";
		echo json_encode($odgovor);
		return false;
		}else{
			$komentar = $podaci->Komentar;
			$korisnik_id = $podaci->KorisnikId;
			$vest_id = $podaci->VestId;

			$komentar = $mysqli->real_escape_string($komentar);
			$korisnik_id = $mysqli->real_escape_string($korisnik_id);
			$vest_id = $mysqli->real_escape_string($vest_id);

			$sql = "INSERT INTO komentari (Komentar, KorisnikId, VestId) VALUES ('".$komentar."', '".$korisnik_id."','".$vest_id."')";

			if($q = $mysqli->query($sql)){
			$odgovor['status']=1;
			$odgovor['poruka']= "Komentar je uspesno ubacen";
			echo json_encode($odgovor);
			return false;
			}else{
				$odgovor['status']=0;
				$odgovor['poruka']= "Doslo je do greske";
				echo json_encode($odgovor);
				return false;
			}
		}
	}
});

Flight::start();
