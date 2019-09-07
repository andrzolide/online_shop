<?php 
  //elementy początkowe

  include "../includes/czy-zalogowany.php";

  // require_once "classes-and-functions.php";

  require_once "../connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  // //include klas.


  // //zmienne globalne


  // //funkcje i klasy lokalne.


  // //kod

  $zapytanie= "";

  if(isset($_SESSION['id'])&&isset($_POST['adres'])){
    $id=$_SESSION['id'];
    $adres=$_POST['adres'];
    $zapytanie = "INSERT INTO zamowienia (id, id_klienta, data, adres)
      VALUES ('NULL', '$id', CURDATE(), '$adres')";
  }

  if ($polaczenie->query($zapytanie) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
header('Location: ../sklep.php?info=Pomyślnie złożono zamówienie');
?>