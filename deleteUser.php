<?php
	include_once('db/database_utilities.php');
    //Se borra el usuario con el id enviado desde usuarios, por get
	if(isset($_GET['id'])){
		deleteUser($_GET['id']);
		header("location: index.php");
	}

?>