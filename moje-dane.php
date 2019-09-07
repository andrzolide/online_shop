<?php 
  //elementy początkowe

  include "includes/czy-zalogowany.php";

  // require_once "classes-and-functions.php";

  // require_once "connect.php";
  // $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  // //include klas.


  // //zmienne globalne


  // //funkcje i klasy lokalne.


  // //kod

  // $zapytanie= "";

  // if(isset($_SESSION['id'])){
  //   $zapytanie= "INSERT adres_docelowy INTO uzytkownicy WHERE id"
  // }
?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep - moje dane</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php
include "header.php"
?>


 <form action="functions/save-user-data.php" method="post">
 
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
      <input  class="form-control" name="surname" placeholder="Podaj imię" value="<?php echo $_SESSION['user']; ?>">
    </div>
	
	<label  class="col-sm-1 col-form-label">Użytkownik</label>
    <div class="col-sm-3">
      <input  class="form-control" name="user" placeholder="Login" value="<?php echo $_SESSION['user']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nazwisko</label>
    <div class="col-sm-3">
      <input  class="form-control"  placeholder="Podaj nazwisko" value="<?php echo $_SESSION['user']; ?> ">


    </div>
	<label  class="col-sm-1 col-form-label">Zmien hasło</label>
    <div class="col-sm-3">
      <input type="password" class="form-control" name="inputPassword" placeholder="Password" value="<?php echo $_SESSION['kamien']; ?>">
    </div>
  </div>

 <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Miasto</label>
    <div class="col-sm-3">
      <input  class="form-control" name="city" placeholder="Podaj miasto" value="<?php echo $_SESSION['drewno']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Ulica</label>
    <div class="col-sm-3">
      <input class="form-control" name="street" placeholder="Podaj ulice" value="<?php echo $_SESSION['zboze']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Kod pocztowy</label>
    <div class="col-sm-3">
      <input class="form-control" name="postalCode" placeholder="Podaj kod pocztowy" value="<?php echo $_SESSION['drewno']; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-3">
      <input class="form-control" name="email" placeholder="Podaj email"value="<?php echo $_SESSION['email']; ?>">
    </div>
  </div>
  <input type="submit" class="btn btn-success" value="Zapisz" />
</form>
<?php echo $_SESSION['adres']; ?>


<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/sklep.php';" class="btn btn-secondary ">Powrót</button>
    </div>

    
  </div>
</div>







</body>
</html>