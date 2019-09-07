<?php 
  //elementy początkowe

  include "includes/czy-zalogowany.php";

  require_once "classes-and-functions.php";

  require_once "connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  //include klas.


  //zmienne globalne
  $zamowienia=array();

  //funkcje i klasy lokalne.


  //kod

  $zapytanie= "";

  $zapytanie= "SELECT * FROM zamowienia";

  if($rezultat = @$polaczenie->query($zapytanie))
  {

    if ($rezultat->num_rows > 0) {
      //echo " ------------------ZAMOWIENIA--------------- </br>";

        while($row = $rezultat->fetch_assoc()) {
          array_push($zamowienia, new Zamowienie($row["id"],$row["id_klienta"],$row["data"],$row["adres"]));
          //echo "NAZWA PRODUKTU: ". $row["id"] . " ID KATEGORII: " . $row["data"] . "</br>";
        }
    } else {
        echo "0 results";
    }

  }else{
    echo "Błąd przy wykonywaniu zapytania";
  }


  

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
</head>

<body>

<?php
include "header.php"
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa </th>
      <th scope="col">Data</th>
	  <th scope="col">Zwrot</th>
	  <th scope="col">Reklamacja</th>
    </tr>
  </thead>
  <tbody>
    <?php   foreach ($zamowienia as $value) { ?>
    <tr>
      <th scope="row"><?php echo $value->getId() ?></th>
      <td>Procek</td>
      <td><?php echo $value->getData() ?></td>
      <td><button type="button"  onclick="location.href = 'http://localhost/sklep/zwrot.php';" class="btn btn-light btn-ms ">Zwróć produkt</button></td>
	  <td><button type="button"  onclick="location.href = 'http://localhost/sklep/reklamacja.php';" class="btn btn-warning btn-ms ">Zgłoś reklamacje</button></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
	
	


</body>
</html>