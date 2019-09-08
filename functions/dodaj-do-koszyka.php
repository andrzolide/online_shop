<?php

	session_start();
	
	if (!(isset($_SESSION['zalogowany'])) || !($_SESSION['zalogowany']==true))
	{
		header('Location: sklep.php');
		exit();
	}

	$chart = array();
	if (isset($_GET['id_produktu'])&&isset($_GET['cena']))
	{	

		if (!isset($_SESSION['chart']))
		{	
			$_SESSION['chart'] = array();
		}	
		if (!isset($_SESSION['chart-num']))
		{	
			$_SESSION['chart-num']=0;
		}	
		if (!isset($_SESSION['chart-val']))
		{	
			$_SESSION['chart-val']=0;
		}

		array_push($_SESSION['chart'], $_GET['id_produktu']);

		$_SESSION['chart-num']=count($_SESSION['chart']);

		$_SESSION['chart-val']+=$_GET['cena'];

	}	
	$kat="";		
	if(isset($_GET['kategoria'])) {
		$kat=  "&kategoria=".$_GET['kategoria']; 
	}
	if(isset($_GET['target'])){
		if($_GET['target']=='koszyk'){
			header('Location: ../koszyk.php?info=Pomyślnie dodano do koszyka'. $kat);
			exit();
		}
	}
	header('Location: ../sklep.php?info=Pomyślnie dodano do koszyka'. $kat);

?>
asdf