<?php 

class Vest{

	private $naslov;
	private $tekst;
	private $kategorija_id;
	private $img;

	public function __construct($naslov,$tekst,$kategorija_id,$img){
		$this->naslov = $naslov;
		$this->tekst = $tekst;
		$this->kategorija_id = $kategorija_id;
		$this->img = $img;

	}

	public function dodajVest(){
		global $mysqli;
		$sql = "INSERT INTO vesti (Naslov,Tekst,KategorijaId,Img) VALUES ('".$this->naslov."', '".$this->tekst."','".$this->kategorija_id."','".$this->img."')";
		if($q=$mysqli->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public function izmeniVest($id){
		global $mysqli;
		$sql = "UPDATE vesti SET KategorijaId='$this->kategorija_id' WHERE Id='$id'";
		if($q=$mysqli->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function obrisiVest($id){
		global $mysqli;
		$sql = "DELETE FROM vesti WHERE Id='$id'";
		if($q=$mysqli->query($sql)){
			return true;
		}
		else{
			return false;
		}
	}

	public static function vratiVesti(){
	global $mysqli;
	$sql = "SELECT * FROM vesti";
	$q=$mysqli->query($sql);
	$niz=[];
	while($red=$q->fetch_object()){
		$niz[]=$red;

			}
	return $niz;
		}



	public static function pretraga($kategorija,$pretraga){
	global $mysqli;

	if($kategorija == 999 && empty($pretraga)){
		$sql = "SELECT * FROM vesti ORDER BY Id DESC";
	}
	else if ($kategorija != 999 && empty($pretraga)) {
		$sql = "SELECT * FROM vesti WHERE KategorijaId = '$kategorija' ORDER BY Id DESC";
	}
	else if ($kategorija == 999 && !empty($pretraga)) {
		$sql = "SELECT * FROM vesti WHERE Naslov LIKE '%$pretraga%' ORDER BY Id DESC";
	}
	else{
		$sql = "SELECT * FROM vesti WHERE KategorijaId = '$kategorija' AND Naslov LIKE '%$pretraga%' ORDER BY Id DESC";
	}
	$q=$mysqli->query($sql);
	$niz=[];
	while($red=$q->fetch_object()){
		$niz[]=$red;

			}
	return $niz;
		}
	}
 ?>