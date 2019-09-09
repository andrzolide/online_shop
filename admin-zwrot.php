
<?php 
include "includes/czy-admin.php";

require_once "classes-and-functions.php";
/*
SELECT zwroty.id , produkty.id as 'id_produktu', pr_nr_seryjny.nr_seryjny, zwroty.id_zamowienia, id_produktu_bez_seryjnego, zwroty.nr_seryjny, powod,login, nazwa FROM zwroty JOIN zamowienia on zamowienia.id = zwroty.id_zamowienia 
JOIN klienci on klienci.id=zamowienia.id_klienta
LEFT JOIN pr_nr_seryjny on pr_nr_seryjny.nr_seryjny= zwroty.nr_seryjny
LEFT JOIN produkty on produkty.id= id_produktu_bez_seryjnego OR produkty.id=pr_nr_seryjny.id_produktu
  WHERE 1
*/

  $id_zwrotu=0;
  if(isset($_GET['id_zwrotu'])){
    $id_zwrotu=$_GET['id_zwrotu'];
  }

  require_once "connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  $zwrot;

  $zapytanie="SELECT zwroty.id , produkty.id as 'id_produktu', pr_nr_seryjny.nr_seryjny, zwroty.id_zamowienia, id_produktu_bez_seryjnego, zwroty.nr_seryjny, powod,login,imie,nazwisko,email, nazwa , adres_dostawy, zwroty.status FROM zwroty JOIN zamowienia on zamowienia.id = zwroty.id_zamowienia 
JOIN klienci on klienci.id=zamowienia.id_klienta
LEFT JOIN pr_nr_seryjny on pr_nr_seryjny.nr_seryjny= zwroty.nr_seryjny
LEFT JOIN produkty on produkty.id= id_produktu_bez_seryjnego OR produkty.id=pr_nr_seryjny.id_produktu
  WHERE zwroty.id=$id_zwrotu
";
  
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
            if(isset($row['nr_seryjny'])){

            }else{

            }
            
            $zwrot=new Zwrot($row["id"],$row["login"],$row["id_zamowienia"],$row["nazwa"],$row["powod"],$row["id_produktu"],$row["nr_seryjny"],$row["imie"],$row["nazwisko"],$row["email"],$row["adres_dostawy"],$row["status"]);
          }

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
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Osadnicy - gra przeglądarkowa</title>
</head>

<body>
<?php
include "header.php"
?>	
<center>  <h2> Dane zwrotu</h> </center>
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Nazwa produktu</label>
    <div class="col-sm-10">
      <?php echo '<input type="text" readonly class="form-control-plaintext" name="productName" value="'.$zwrot->getProdukt().'">' ?>
      
    </div>
        <label  class="col-sm-2 col-form-label">Id produktu</label>
    <div class="col-sm-10">
      <?php echo '<input type="text" readonly class="form-control-plaintext" name="productName" value="'.$zwrot->getIdProduktu().'">' ?>
      
    </div>
        <label  class="col-sm-2 col-form-label">Numer seryjny</label>
    <div class="col-sm-10">
      <?php 
      if(empty($zwrot->getNrSeryjny())){
        echo "Brak numeru seryjnego dla tego produktu";
      }else{

      echo '<input type="text" readonly class="form-control-plaintext" name="productName" value="'.$zwrot->getNrSeryjny().'">';
      }

       ?>
      
    </div>

  </div>
	  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Przyczyna reklamacji i opis</label>
    <div class="col-7">
	 <textarea class="form-control" readonly name="description" rows="8"><?php echo $zwrot->getOpis() ?></textarea>
    </div>

  </div>

  <div class="form-group row">
 <div class="col-5">
 <label  class="col-5 col-form-label"><center><h3>Dane osobowe</h3></center></label>
    </div>
	<div class="col-5>
 <label  class="col-5 col-form-label"><center><h3>Dane konta</h3></center></label>
    </div>
    
  </div>
 <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Imię</label>
    <div class="col-sm-3">
      <?php echo '<input  class="form-control" readonly name="surname" placeholder="Podaj imię" value="'.$zwrot->getImie().'">' ?>
    </div>
	
	<label  class="col-sm-1 col-form-label">Użytkownik</label>
    <div class="col-sm-3">
      <?php echo '<input  class="form-control" readonly name="surname" placeholder="Uzytkownik" value="'.$zwrot->getLogin().'">' ?>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nazwisko</label>
    <div class="col-sm-3">
      <?php echo '<input  class="form-control" readonly name="surname" placeholder="Nazwisko" value="'.$zwrot->getNazwisko().'">' ?>
    </div>

  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Adres dostawy</label>
    <div class="col-sm-3">
      <?php echo '<input  class="form-control" readonly name="surname" placeholder="Adres" value="'.$zwrot->getAdresDostawy().'">' ?>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-3">
      <?php echo '<input  class="form-control" readonly name="surname" placeholder="Email" value="'.$zwrot->getEmail().'">' ?>
    </div>
  </div>


  <div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'admin.php';" class="btn btn-secondary ">Powrót</button>
    </div>
	<div class="col-sm">
<?php 
echo '<a href="functions/odrzuc-zwrot.php?id_zwrotu='.$zwrot->getId().'"><button type="button" class="btn btn-danger">Odrzuć zwrot</button></a>';
 ?>
  
    </div>
    <div class="col-sm">
<?php 
echo '<a href="functions/akceptuj-zwrot.php?id_zwrotu='.$zwrot->getId().'"><button type="button" class="btn btn-success">Akceptuj zwrot</button></a>';
 ?>
    </div>
    
  </div>
</div>

</body>
</html>