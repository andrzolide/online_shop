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

  $zapytanie= "";

  $user=$_POST['user'];
  $id=$_SESSION['id'];
  $email=$_POST['email'];
  echo $id;
  echo $user;

  $zapytanie = "UPDATE uzytkownicy SET user='$user', email='$email'  WHERE id=$id";



  if($rezultat = @$polaczenie->query($zapytanie)){
    echo "Pomyślnie dodano do bazy danych";
    $_SESSION['user']=$user;
    $_SESSION['email']=$email;
  }
  else{
    echo "Błąd przy wykonywaniu zapytania";
  }

  header('Location: ../moje-dane.php');
?>