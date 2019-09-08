<?php 

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}

	if (isset($_SESSION['funkcja']))
	{
		if(!($_SESSION['funkcja']=='magazynier'||$_SESSION['funkcja']=='klient')){
			header('Location: index.php');
			exit();
		}

	}else{
		header('Location: index.php');
		exit();
	}

?>