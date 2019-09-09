<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: sklep.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf8_polish_ci" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
</head>

<body>
	<form action="dodaj_produkt.php" method="post">
<?php
	require_once "connect.php";
	require_once "classes-and-functions.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$zapytanie="";
	$kat = array();

      $zapytanie="SELECT kategorie.nazwa, kategorie.id, kategorie.id_ojca FROM kategorie WHERE kategorie.id_ojca <> 'NULL'";
      if ($rezultat = @$polaczenie->query($zapytanie)){
        if ($rezultat->num_rows > 0) {
            while($row = $rezultat->fetch_assoc()) {
				array_push($kat, new Kategoria($row['id'],$row['nazwa'],$row['id_ojca']));
            }


        }
      }else{
        echo "Blad przy wykonywaniu zapytania";
      }
	  
	  foreach ($kat as $key => $value) {
		  $value->getNazwa();
		  echo '<input type="radio" name="kat" value="'. $value->getId() .'"/> '. $value->getNazwa() .' <br>';
      }
      $polaczenie->close();
	  
?>
<br>
<input type="submit" value="Wybierz" />
</form>

</body>
</html>