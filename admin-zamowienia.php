<?php 

include "includes/czy-admin.php";

require_once "classes-and-functions.php";
/*
SELECT zamowienia.id, id_klienta,data,adres_dostawy,status,login FROM zamowienia
JOIN klienci on zamowienia.id_klienta = klienci.id
WHERE 1

*/

  require_once "connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  $zamowienia=array();

  $zapytanie="SELECT zamowienia.id, id_klienta,data,adres_dostawy,status,login FROM zamowienia
JOIN klienci on zamowienia.id_klienta = klienci.id
WHERE 1";
  
  if ($polaczenie->connect_errno!=0)
  {
    echo "Error: ".$polaczenie->connect_errno;
  }
  else
  {
    if($rezultat = @$polaczenie->query($zapytanie))
    {

      if ($rezultat->num_rows > 0) {
          while($row = $rezultat->fetch_assoc()) {
            array_push($zamowienia, new Zamowienie($row["id"],$row["login"],$row["data"],$row["adres_dostawy"],$row["status"]));
          }
          // foreach ($kategorie as $kat){
          //  echo $kat->getNazwa() . " ---- id kategorii: " . $kat->getId();
          //  echo "</br>";
          //  foreach ($kat->podkategorie as $podkat) {
          //    echo "-----".$podkat->getNazwa() . " ---- id kategorii: " . $podkat->getId();
          //    echo "</br>";
          //  }
          // }

      } else {
          echo "0 results";
      }
      
    }
    else{
      echo "Błąd przy wykonywaniu zapytania";
    }
  }
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<meta charset="utf-8" />	
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin- zamówienia</title>
</head>

<body>
<body>

<center><h2>Zamówienia</h2></center>

<label>Pokaż wyniki o statusie</label>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   Status
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Do realizacji</a>
    <a class="dropdown-item" href="#">W realizacji</a>
    <a class="dropdown-item" href="#">Zrealizowany</a>
  </div>
</div>


 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Login użytkownika</th>
      <th scope="col">Data</th>
      <th scope="col">Adres dostawy</th>
      <th scope="col">Status</th>
      <th scope="col">Edytuj</th>
    </tr>
  </thead>
  <tbody>
    
    <?php foreach ($zamowienia as $value) { ?>
      
    <tr>
      <th scope="row"><?php echo $value->getId() ?></th>
	   <td><?php echo $value->getLogin() ?></td>
      <td><?php echo $value->getData() ?></td>
      <td><?php echo $value->getAdres() ?></td>
      <td><?php echo $value->getStatus() ?></td>
      <td><a href= 'admin-zamowienie.php?id=<?php echo $value->getId() ?>'>EDYTUJ</a></td>
    </tr>
    
  <?php } ?>
  </tbody>
</table>
 
<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/admin.php';" class="btn btn-secondary ">Powrót</button>
    </div>
   
  </div>
</div>
	

</body>
</html>