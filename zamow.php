<?php

  include "includes/czy-zalogowany.php";

  require_once "classes-and-functions.php";

  require_once "pobierz-dane-do-koszyka.php";

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
      <input  class="form-control" name="adres" placeholder="Podaj imię" value="">
    </div>
	
	<label for="inputPassword" class="col-sm-2 col-form-label">Adres dostawy</label>
    <div class="col-sm-3">
      <input class="form-control" name="adres" placeholder="Podaj ulice" value="<?php echo $_SESSION['domyslny_adres'] ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nazwisko</label>
    <div class="col-sm-3">
      <input  class="form-control"  placeholder="Podaj nazwisko">
    </div>

  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-3">
      <input class="form-control" name="email" placeholder="Podaj email"value="">
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
    <?php foreach ($produkty_do_wyswietlenia as  $value) { ?>
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

