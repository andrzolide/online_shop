
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

  require_once "connect.php";

  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  $zwroty=array();

  $zapytanie="SELECT zwroty.id , produkty.id as 'id_produktu', pr_nr_seryjny.nr_seryjny, zwroty.id_zamowienia, id_produktu_bez_seryjnego, zwroty.nr_seryjny, powod,login, nazwa, imie ,nazwisko, email, adres_dostawy, zwroty.status FROM zwroty JOIN zamowienia on zamowienia.id = zwroty.id_zamowienia 
JOIN klienci on klienci.id=zamowienia.id_klienta
LEFT JOIN pr_nr_seryjny on pr_nr_seryjny.nr_seryjny= zwroty.nr_seryjny
LEFT JOIN produkty on produkty.id= id_produktu_bez_seryjnego OR produkty.id=pr_nr_seryjny.id_produktu
  WHERE 1
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
            array_push($zwroty, 
              new Zwrot($row["id"],$row["login"],$row["id_zamowienia"],$row["nazwa"],$row["powod"],$row["id_produktu"],$row["nr_seryjny"],$row["imie"],$row["nazwisko"],$row["email"],$row["adres_dostawy"],$row["status"]));
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


<?php
include "info-blad.php"
?>
	
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Login</th>
      <th scope="col">Id zamówienia</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Status</th>
      <th scope="col">Edycja</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($zwroty as  $value) { ?>

<?php 
$params="";

$id=$value->getId();

$params="id_zwrotu=".$id;
echo $value->getStatus();
 ?>
    <tr <?php if($value->getStatus()=="uznany"){echo 'style = "background: green;"';} 
              else if($value->getStatus()=="odrzucony"){echo 'style = "background: red;"';} 

    ?>>
      <th scope="row"><?php echo $value->getId() ?></th>
	   <td><?php echo $value->getLogin() ?></td>
     <td><?php echo $value->getZamowienie() ?></td>
     <td><?php echo $value->getProdukt() ?></td>
     <td><?php echo $value->getStatus() ?></td>
     <td><a href="admin-zwrot.php?<?php echo $params ?>">ZOBACZ</a></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
 


<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'admin.php';" class="btn btn-secondary ">Powrót</button>
    </div>
   
  </div>
</div>

</body>
</html>