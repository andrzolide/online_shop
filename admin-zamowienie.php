
<?php 
  //elementy początkowe

  include "includes/czy-zalogowany.php";

  require_once "classes-and-functions.php";

  require_once "connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  //include klas.

  //zmienne globalne
  $zamowienia=array();

  $produkty_zamowien=array();

  //funkcje i klasy lokalne.
/*

SELECT produkty.id as 'produkt_id', produkty.cena, pr_bez_nr_seryjnego_zamowienia.ilosc ,  zamowienia.id as 'zamowienie_id', id_klienta,data,adres_dostawy, nazwa FROM zamowienia
LEFT JOIN pr_bez_nr_seryjnego_zamowienia on zamowienia.id=pr_bez_nr_seryjnego_zamowienia.id_zamowienia
JOIN produkty on pr_bez_nr_seryjnego_zamowienia.id_produktu=produkty.id



SELECT produkty.id as 'produkt_id', produkty.cena, zamowienia.id as 'zamowienie_id', id_klienta,data,adres_dostawy, nr_seryjny, nazwa FROM zamowienia 
JOIN pr_nr_seryjny on pr_nr_seryjny.id_zamowienia = zamowienia.id
JOIN produkty on pr_nr_seryjny.id_produktu=produkty.id

*/
  //ZAMOWIENIA:
  $uzytkownik=$_SESSION['id'];
  $zamowienie=$_GET['id'];
  
  $zapytanie1= "";
  $zapytanie1= "
SELECT produkty.id as 'produkt_id', produkty.cena, pr_bez_nr_seryjnego_zamowienia.ilosc ,  zamowienia.id as 'zamowienie_id', id_klienta,data,adres_dostawy, nazwa, zamowienia.status FROM zamowienia
LEFT JOIN pr_bez_nr_seryjnego_zamowienia on zamowienia.id=pr_bez_nr_seryjnego_zamowienia.id_zamowienia
JOIN produkty on pr_bez_nr_seryjnego_zamowienia.id_produktu=produkty.id
  WHERE zamowienia.id=$zamowienie";

  if($rezultat = @$polaczenie->query($zapytanie1))
  {
    if ($rezultat->num_rows > 0) {
        while($row = $rezultat->fetch_assoc()) {
          //array_push($zamowienia, new Zamowienie($row["id"],$row["id_klienta"],$row["data"],$row["adres_dostawy"]));
          //echo "NAZWA PRODUKTU: ". $row["id"] . " ID KATEGORII: " . $row["data"] . "</br>";
          array_push($produkty_zamowien, new ProduktZamowienie($row["produkt_id"],$row["nazwa"],$row["ilosc"],$row["cena"],"",$row["data"],$row["zamowienie_id"],$row["adres_dostawy"],$row["status"]));
        }
    } else {
        //echo "0 results";
    }
  }else{
    echo "Błąd przy wykonywaniu zapytania";
  }

  //PRODUKTY ZMAWOEN

  $zapytanie2= "";
  $zapytanie2= "SELECT produkty.id as 'produkt_id', produkty.cena, zamowienia.id as 'zamowienie_id', id_klienta,data,adres_dostawy, nr_seryjny, nazwa, zamowienia.status FROM zamowienia 
JOIN pr_nr_seryjny on pr_nr_seryjny.id_zamowienia = zamowienia.id
JOIN produkty on pr_nr_seryjny.id_produktu=produkty.id
  WHERE zamowienia.id=$zamowienie";

  if($rezultat = @$polaczenie->query($zapytanie2))
  { 

    if ($rezultat->num_rows > 0) {
        while($row = $rezultat->fetch_assoc()) {
          //array_push($zamowienia, new Zamowienie($row["id"],$row["id_klienta"],$row["data"],$row["adres_dostawy"]));
          //echo "NAZWA PRODUKTU: ". $row["id"] . " ID KATEGORII: " . $row["data"] . "</br>";
          array_push($produkty_zamowien, new ProduktZamowienie($row["produkt_id"],$row["nazwa"],1,$row["cena"],$row["nr_seryjny"],$row["data"],$row["zamowienie_id"],$row["adres_dostawy"],$row["status"]));
        }
    } else {
        //echo "0 results";
    }
  }else{
    echo "Błąd przy wykonywaniu zapytania";
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep- zamówienie</title>
</head>

<body>

	<center><h2>Wszystkie produkty</center></h2>

  <?php
include "info-blad.php"
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nazwa</th>
      <th scope="col">Cena</th>
      <th scope="col">Ilosc</th>
      <th scope="col">Numer seryjny</th>
      <th scope="col">Id zamowienia</th>
      <th scope="col">Data zamowienia</th>
      <th scope="col">Adres dostawy</th>
    </tr>
  </thead>
  <tbody>
    <?php   foreach ($produkty_zamowien as $value) { ?>
    <tr>
      <td><?php echo $value->getNazwa() ?></td>
      <td><?php echo $value->getCena() ?></td>
      <td><?php echo $value->getIlosc() ?></td>
      <td><?php echo $value->getNumerSeryjny() ?></td>
      <td><?php echo $value->getIdZamowienia() ?></td>
      <td><?php echo $value->getData() ?></td>
      <td><?php echo $value->getAdresDostawy() ?></td>

      <?php 
      $id_zam=$value->getIdZamowienia();
      $id_prod_bez_nr=$value->getIdProduktu();
      $nr_ser=$value->getNumerSeryjny();
      $nazwa_prod=$value->getNazwa();
      $string_pom="id_zamowienia=".$id_zam."&id_prod_bez_nr_ser=".$id_prod_bez_nr."&nr_ser=".$nr_ser."&nazwa_prod=".$nazwa_prod;
      //echo $string_pom . "</br>";
       ?>

    </tr>
    <?php } ?>
  </tbody>
</table>

<center><label><b>Ustaw status zamówienia</b></label></center>
  <div class="container">
  <div class="row">
    <div class="col-sm">
    </div>

    <?php if(!empty($produkty_zamowien)){  ?>

      <div class="col-sm">
<?php 

echo '<a href="functions/ustaw-status-zamowienia.php?status=do_realizacji&id_zamowienia='.$produkty_zamowien[0]->getIdZamowienia().'"><button type="button" class="btn btn-primary">Status zamówienia: Do realizacji</button></a>';
 ?>
  
    </div>
  <div class="col-sm">
<?php 
echo '<a href="functions/ustaw-status-zamowienia.php?status=w_trakcie&id_zamowienia='.$produkty_zamowien[0]->getIdZamowienia().'"><button type="button" class="btn btn-primary">Status zamówienia: W trakcie realizacji</button></a>';
 ?>
  
    </div>
    <div class="col-sm">
<?php 
echo '<a href="functions/ustaw-status-zamowienia.php?status=zrealizowane&id_zamowienia='.$produkty_zamowien[0]->getIdZamowienia().'"><button type="button" class="btn btn-primary">Status zamówienia: Zrealizowane</button></a>';
 ?>
    </div>
<?php } ?>
      

    
  </div>

</body>
</html>
