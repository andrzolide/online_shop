<?php 
  //elementy początkowe

  include "../includes/czy-zalogowany.php";

  require_once "../classes-and-functions.php";

  require_once "../connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  //include klas.


  //zmienne globalne


  //funkcje i klasy lokalne.


  //kod


  $id=$_SESSION['id'];
  $login=$_POST['login'];
  $imie=$_POST['imie'];
  $nazwisko=$_POST['nazwisko'];
  $domyslny_adres=$_POST['domyslny_adres'];
  $email=$_POST['email'];

  $message="";

  $zapytanie= "";
  $zapytanie = "UPDATE klienci SET login='$login', imie='$imie', nazwisko='$nazwisko', domyslny_adres='$domyslny_adres',email='$email'  WHERE id=$id";

  if($rezultat = @$polaczenie->query($zapytanie)){
    echo "Pomyślnie dodano do bazy danych";
    $_SESSION['login']=$login;
    $_SESSION['imie']=$imie;
    $_SESSION['nazwisko']=$nazwisko;
    $_SESSION['domyslny_adres']=$domyslny_adres;
    $_SESSION['email']=$email;
    $message="info=Pomyślnie zapisano dane";
  }
  else{
    $message="blad=Nie udało się zapisać danych";
  }

  header('Location: ../sklep.php?'.$message);
?>