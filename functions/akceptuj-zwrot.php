<?php 
include "../includes/czy-admin.php";

require_once "../connect.php";

$message="";
  	if(isset($_GET['id_zwrotu'])){
    	$id_zwrotu=$_GET['id_zwrotu'];

    	

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

		$status="uznany";
		$zapytanie="UPDATE zwroty SET status = '$status' WHERE id = $id_zwrotu";

		  if ($polaczenie->connect_errno!=0)
		  {
		    $message="blad=Nie udało się zaakceptować zrwotu";
		  }
		  else
		  {
		  if ($polaczenie->query($zapytanie) === TRUE) {
		  	$message="info=Pomyślnie zaakceptowano zwrot";
		  } else {
		  	$message="blad=Nie udało się zaakceptować zrwotu";
		  }
		  }
	}
  	else{
  		$message="blad=Nie udało się zaakceptować zrwotu";
  	}

header('Location: ../admin-zwroty.php?'.$message);

 ?>