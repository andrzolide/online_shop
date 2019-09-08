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
		if(isset($_SESSION["chart"])){
			foreach ($_SESSION['chart'] as $key => $value) {
				if($value == $_GET['id_produktu']){
					unset($_SESSION['chart'][$key]);
					if(isset($_SESSION['chart-val'])){
						$_SESSION['chart-val']-=$_GET['cena'];
						if($_SESSION['chart-val']<0){
							$_SESSION['chart-val']=0;
						}
					}
				}
			}
		}

		if(isset($_SESSION["chart-num"])){
			$_SESSION['chart-num']=count($_SESSION['chart']);
		}
		if(isset($_GET['target'])){
			if($_GET['target']=='koszyk'){
				header('Location: ../koszyk.php?info=Pomyślnie usunięto z koszyka'. $kat);
				exit();
		}
	}
		header('Location: ../koszyk.php?info=Pomyślnie usunieto z koszyka');
	}else{
		header('Location: ../koszyk.php?blad=Nie udało się usunąć produktu z koszyka');
	}		



?>
asdf