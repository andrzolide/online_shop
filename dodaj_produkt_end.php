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
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];
    $kat = $_POST['kat'];
    $id_produktu = "";

    $zapytanie = "INSERT INTO `produkty` (`id`, `nazwa`, `cena`, `id_kategorii`) VALUES (NULL, '$nazwa', '$cena', '$kat')";
          
    echo "$zapytanie ";

    if ($polaczenie->query($zapytanie) === TRUE)
    {
        echo "New record created successfully". "<br>";
    }
      else 
    {
        echo "Error". "<br>";
    }

    $zapytanie = "SELECT produkty.id FROM produkty WHERE produkty.nazwa = '$nazwa' AND produkty.cena = $cena AND produkty.id_kategorii = $kat";
    if ($rezultat = @$polaczenie->query($zapytanie))
    {
        $wiersz = $rezultat->fetch_assoc();
        $id_produktu = $wiersz['id'];
    }
      else 
    {
        echo "Error id_produktu". "<br>";
    }
    echo "$id_produktu ";
    echo '<br />';
    echo '<br />';

    foreach ($_POST['param'] as $key => $value) 
    {
        $naz = $value;
        echo "$value ";
        echo "$key ";
        $zapytanie = "INSERT INTO `parametry_produkty` (`id_parametru`, `id_produktu`, `wartosc`) VALUES ($key, $id_produktu, '$value')";
        echo "$zapytanie ";
        echo '<br />';
        if ($polaczenie->query($zapytanie) === TRUE)
        {
            echo "New record created successfully". "<br>";
        }
          else 
        {
            echo "Error". "<br>";
        }
        echo '<br />';
    }
    $polaczenie->close();
?>

<form action="index.php" method="post">
		<input type="submit" value="BACK" />
	
</form>

</body>
</html>