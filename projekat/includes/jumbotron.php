<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<link rel="stylesheet" href="style.css">
<div class="jumbotron" style="background-image: url(http://www.savetnik.edu.rs/wp-content/uploads/2017/04/pravni-savetnik.jpg); height: 500px">
	<style>
	h1 {color:#FFFFFF;}
</style>
<?php if(isset($_SESSION['kor_username'])){ ?>
<h1 style="color: white"> <?php echo $_SESSION['kor_username']; ?> ,</h1>
<?php  } ?>
<h1 style="color: white">Dobrodošli na sajt pravnog savetnika!</h1>


	<p style="color: white">Pročitajte najnovije vesti.</p>
</div>