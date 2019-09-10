<?php 
include "../includes/czy-admin.php";

require_once "../connect.php";

$message="";
  	if(isset($_GET['id_zamowienia'])&&isset($_GET['status'])){
    	$id_zamowienia=$_GET['id_zamowienia'];

    	$status;
    	if($_GET['status']=='zrealizowane'){
    		$status="zrealizowane";
    	}
    	if($_GET['status']=='w_trakcie'){
    		$status="w-trakcie";
    	}
    	if($_GET['status']=='do_realizacji'){
    		$status="do-realizacji";
    	}

		$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


		
		$zapytanie="UPDATE `zamowienia` SET status = '$status' WHERE id = $id_zamowienia";

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
echo $message;
header('Location: ../admin-zamowienia.php?'.$message);

 ?>