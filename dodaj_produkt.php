
 
 
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
<?php
    require_once "connect.php";
	require_once "classes-and-functions.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
	
	$zapytanie="";
    $params = array();

    $selected = $_POST['kat'];
    echo $selected;

    $zapytanie="SELECT * FROM `parametry` WHERE parametry.id_kategorii = $selected ";

    if ($rezultat = @$polaczenie->query($zapytanie))
    {
        if ($rezultat->num_rows > 0)
        {
            while($row = $rezultat->fetch_assoc()) 
            {
                array_push($params, new Parametr($row['id'],$row['nazwa'],$row['id_kategorii']));
            }
        }
    }
    else
    {
        echo "Blad przy wykonywaniu zapytania";
    }
    $polaczenie->close();
?>

<form action="dodaj_produkt_end.php" method="post">

<?php
    echo 'Kategoria: <input type="text" name="kat" /> <br />';
    echo 'Nazwa: <input type="text" name="nazwa" /> <br />';
    echo 'Cena: <input type="text" name="cena" /> <br />';
    echo '<br />';
    echo '<br />';

    foreach ($params as $key => $value) 
    {
        $naz = $value->getNazwa();
        // $value->getNazwa();
        echo "$naz ";
        echo '<input type="text" name="param['. $value->getId() .']" /> <br />';
    }
    echo '<input type="submit" value="Dodaj" />';
?>

</form>


</body>
</html>