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
  
  $zapytanie1= "";
  $zapytanie1= "
SELECT produkty.id as 'produkt_id', produkty.cena, pr_bez_nr_seryjnego_zamowienia.ilosc ,  zamowienia.id as 'zamowienie_id', id_klienta,data,adres_dostawy, nazwa FROM zamowienia
LEFT JOIN pr_bez_nr_seryjnego_zamowienia on zamowienia.id=pr_bez_nr_seryjnego_zamowienia.id_zamowienia
JOIN produkty on pr_bez_nr_seryjnego_zamowienia.id_produktu=produkty.id
  WHERE id_klienta=$uzytkownik";

  if($rezultat = @$polaczenie->query($zapytanie1))
  {
    if ($rezultat->num_rows > 0) {
        while($row = $rezultat->fetch_assoc()) {
          //array_push($zamowienia, new Zamowienie($row["id"],$row["id_klienta"],$row["data"],$row["adres_dostawy"]));
          //echo "NAZWA PRODUKTU: ". $row["id"] . " ID KATEGORII: " . $row["data"] . "</br>";
          array_push($produkty_zamowien, new ProduktZamowienie($row["produkt_id"],$row["nazwa"],$row["ilosc"],$row["cena"],"",$row["data"],$row["zamowienie_id"],$row["adres_dostawy"]));
        }
    } else {
        echo "0 results";
    }
  }else{
    echo "Błąd przy wykonywaniu zapytania";
  }


  //PRODUKTY ZMAWOEN

  $zapytanie2= "";
  $zapytanie2= "SELECT produkty.id as 'produkt_id', produkty.cena, zamowienia.id as 'zamowienie_id', id_klienta,data,adres_dostawy, nr_seryjny, nazwa FROM zamowienia 
JOIN pr_nr_seryjny on pr_nr_seryjny.id_zamowienia = zamowienia.id
JOIN produkty on pr_nr_seryjny.id_produktu=produkty.id
  WHERE id_klienta=$uzytkownik";

  if($rezultat = @$polaczenie->query($zapytanie2))
  {

    if ($rezultat->num_rows > 0) {
        while($row = $rezultat->fetch_assoc()) {
          //array_push($zamowienia, new Zamowienie($row["id"],$row["id_klienta"],$row["data"],$row["adres_dostawy"]));
          //echo "NAZWA PRODUKTU: ". $row["id"] . " ID KATEGORII: " . $row["data"] . "</br>";
          array_push($produkty_zamowien, new ProduktZamowienie($row["produkt_id"],$row["nazwa"],1,$row["cena"],$row["nr_seryjny"],$row["data"],$row["zamowienie_id"],$row["adres_dostawy"]));
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
      <th scope="col">Nazwa</th>
      <th scope="col">Cena</th>
      <th scope="col">Ilosc</th>
      <th scope="col">Numer seryjny</th>
      <th scope="col">Id zamowienia</th>
      <th scope="col">Data zamowienia</th>
      <th scope="col">Adres dostawy</th>
    <th scope="col">Zwrot</th>
    <th scope="col">Reklamacja</th>
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
      echo $string_pom . "</br>";
       ?>
      <td><a href="zwrot.php?<?php echo $string_pom ?>"><button type="button" class="btn btn-light btn-ms ">Zwróć produkt</button></a></td>
     <td><a href="reklamacja.php?<?php echo $string_pom ?>"><button type="button" class="btn btn-warning btn-ms ">Zgłoś reklamacje</button></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
</body>
</html>