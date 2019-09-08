<?php
	$chart = array();
	$mozna_dodac=false;
	$message="";

	  include "../includes/czy-zalogowany.php";

	  require_once "../classes-and-functions.php";

	  
  require_once "../connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	  require_once "pobierz-wszystkie-produkty.php";

	if (isset($_GET['id_produktu'])&&isset($_GET['cena']))
	{	

		foreach ($produkty as $key => $value) {
		    //echo " selloo". $value->numer_seryjny;
			if($value->produkt->getId()==$_GET['id_produktu']){
				if(!empty($value->getNumerSeryjny())){
			      	if(isset($produkty_z_numerami_seryjnymi_ilosc[$value->produkt->getId()])){
			      		if($produkty_z_numerami_seryjnymi_ilosc[$value->produkt->getId()]>$value->getIlosc()){
			      			$mozna_dodac=true;
			      			break;
			      		}
			        
			      	}
			    }else{
		      		if($value->getIloscNaMagazynie()>$value->getIlosc()){
		      			$mozna_dodac=true;
		      			break;
		      		}
		      	}
			}

		}

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

		if($mozna_dodac==true){
			array_push($_SESSION['chart'], $_GET['id_produktu']);

			$_SESSION['chart-num']=count($_SESSION['chart']);

			$_SESSION['chart-val']+=$_GET['cena'];

			$message="info=Pomyślnie dodano do koszyka";
		}else{
			$message="blad=Niewystarczająca ilość produktów w magazynie";
		}

	}	
	$kat="";		
	if(isset($_GET['kategoria'])) {
		$kat=  "&kategoria=".$_GET['kategoria']; 
	}
	if(isset($_GET['target'])){
		if($_GET['target']=='koszyk'){
			header('Location: ../koszyk.php?'.$message. $kat);
			exit();
		}
	}
	header('Location: ../sklep.php?'.$message. $kat);

?>
asdf