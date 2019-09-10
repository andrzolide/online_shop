<?php 
  include "includes/czy-zalogowany.php";

  require_once "classes-and-functions.php";

  if(!isset($_GET['id_produktu'])){
    header('Location: index.php');
    exit();
  }


  $id_produktu=$_GET['id_produktu'];

  require_once "connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  $parametry=array();

  if($rezultat = @$polaczenie->query("SELECT id_produktu, nazwa, wartosc FROM parametry 
    JOIN parametry_produkty on id_produktu=$id_produktu AND id=id_parametru;
    "))
  {

    if ($rezultat->num_rows > 0) {
      //echo " ------------------KATEGORIE --------------- </br>";
        while($row = $rezultat->fetch_assoc()) {
          array_push($parametry, new Parametr($row['nazwa'],$row['wartosc']));
        }

    } else {
        echo "0 results";
    }
    
  }
  else{
    echo "Błąd przy wykonywaniu zapytania";
  }

 ?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep</title>
</head>

<body>
<body>
<?php
include "header.php"
?>
<?php 
  $nazwa_prod=$_GET['nazwa'];
  $cena_prod=$_GET['cena'];
 ?>


<center><h2>Parametry produktu</center></h2>

<b><p>Nazwa produktu: <?php echo $nazwa_prod; ?></p></b>
<b><p>Cena produktu: <?php echo $cena_prod; ?> zł</p></b>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa parametru</th>
      <th scope="col">Opis właściwości</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($parametry as $value) { ?>
    <tr>
      <th scope="row"></th>
      <td><?php echo $value->getNazwa(); ?></td>
      <td><?php echo $value->getWartosc(); ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>


<div class="col-sm">
	<button type="button"  onclick="location.href = 'sklep.php';" class="btn btn-secondary ">Powrót</button>
    </div>


</body>
</html>