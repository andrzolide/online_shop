<?php

  include "includes/czy-zalogowany.php";

  require_once "classes-and-functions.php";

  function utworz_string_z_produktami($produkty){
    $string="";
    foreach ($produkty as $id){
      if($string != "") { $string = $string . ", "; }
        $string = $string . $id;
      }
      echo "string pomocniczy: " . $string . "</br>";

    return $string;
  }

  require_once "connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


  //----------------------------------------------------

  $produkty=array();
  
  if ($polaczenie->connect_errno!=0)
  {
    echo "Error: ".$polaczenie->connect_errno;
  }
  else{
    echo "PRODUKTY: </br>";

    $zapytanie="";

    $string_pomocniczy="";

    if(isset($_SESSION['chart'])){
      $string_pomocniczy = utworz_string_z_produktami($_SESSION['chart']);
    
      $zapytanie="SELECT * FROM produkty WHERE id IN(" . $string_pomocniczy . ");";

      if ($rezultat = @$polaczenie->query($zapytanie)){
        if ($rezultat->num_rows > 0) {
            while($row = $rezultat->fetch_assoc()) {
              $count = count(array_keys($_SESSION['chart'], $row['id']));
              array_push($produkty, new ProduktKoszyk(new Produkt($row['id'],$row['cena'],$row['nazwa'],$row['id_kategorii']),$count));
            }

        } else {
            echo "0 results";
        }
      }


    }else{
      echo "Brak produktów w koszyku";
    }

  }

  //     foreach ($produkty as  $value) {
  //   echo "id: ". $value->produkt->getNazwa() . " ilosc: ". $value->getIlosc() ;
  //   echo ' <a href = "functions/usun-z-koszyka.php?id_produktu=' .$value->produkt->getId(). '">usun</a> </br>';
  // }


?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep - zamów</title>
</head>

<body>
<?php
include "header.php"
?>	

<center>  <h2>Dane dostawy</h> </center>

<form action="functions/zloz-zamowienie.php" method="post">

 <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Imię</label>
    <div class="col-sm-3">
      <input  class="form-control" name="adres" placeholder="Podaj imię" value="<?php echo $_SESSION['user']; ?>">
    </div>
	
	<label for="inputPassword" class="col-sm-2 col-form-label">Ulica</label>
    <div class="col-sm-3">
      <input class="form-control" name="street" placeholder="Podaj ulice" value="street">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nazwisko</label>
    <div class="col-sm-3">
      <input  class="form-control"  placeholder="<?php echo $_SESSION['user']; ?>">
    </div>
	<label for="inputPassword" class="col-sm-2 col-form-label">Kod pocztowy</label>
    <div class="col-sm-3">
      <input class="form-control" name="postalCode" placeholder="Podaj kod pocztowy" value="postalCode">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-3">
      <input class="form-control" name="email" placeholder="Podaj email"value="<?php echo $_SESSION['email']; ?>">
    </div>
	<label  class="col-sm-2 col-form-label">Miasto</label>
    <div class="col-sm-3">
      <input  class="form-control" name="city" placeholder="Podaj miasto" value="city">
    </div>
  </div>
<center>  <h2>Podsumowanie zakupów</h> </center>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Cena sztuki</th>
      <th scope="col">Ilosc</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($produkty as  $value) { ?>
    <tr>
      <th scope="row"><?php echo $value->produkt->getId() ?></th>
      <td><?php echo $value->produkt->getNazwa() ?></td>
      <td><?php echo $value->produkt->getCena() ?></td>
       <td><?php echo $value->getIlosc() ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>






<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Całkowity koszt zamówienia:</label>
    <div class="col-sm-2">
	        <?php 
      $chart_value=0;

      if(isset($_SESSION['chart-val'])){
        $chart_value=$_SESSION['chart-val'];
      }
      echo '<input class="form-control" type="number" placeholder="'.$chart_value.'" readonly>'
       ?>
    </div>
  </div>


<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/moje-zamowienia.php';" class="btn btn-secondary ">Anuluj</button>
    </div>
    <div class="col-sm">
	<input type="submit" class="btn btn-success" value="Złóż Zamówienie" />
    </div>
    
  </div>
</div>

</form>

</body>
</html>

