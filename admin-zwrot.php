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
      <input type="text" readonly class="form-control-plaintext" name="productName" value="Procesor">
    </div>
  </div>
	  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Przyczyna reklamacji i opis</label>
    <div class="col-7">
	 <textarea class="form-control" readonly name="description" rows="8"></textarea>
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
      <input  class="form-control" readonly name="surname" placeholder="Podaj imię" value="surname">
    </div>
	
	<label  class="col-sm-1 col-form-label">Użytkownik</label>
    <div class="col-sm-3">
      <input  class="form-control" readonly name="inputLogin" placeholder="Login" value="login">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Nazwisko</label>
    <div class="col-sm-3">
      <input  class="form-control"readonly  placeholder="Podaj nazwisko" value="nazwisko">
    </div>
	<label  class="col-sm-1 col-form-label">Zmien hasło</label>
    <div class="col-sm-3">
      <input type="password" class="form-control"readonly name="inputPassword" placeholder="Password" value="password">
    </div>
  </div>

 <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Miasto</label>
    <div class="col-sm-3">
      <input  class="form-control" readonly name="city" placeholder="Podaj miasto" value="city">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Ulica</label>
    <div class="col-sm-3">
      <input class="form-control" readonly name="street" placeholder="Podaj ulice" value="street">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Kod pocztowy</label>
    <div class="col-sm-3">
      <input class="form-control" readonly name="postalCode" placeholder="Podaj kod pocztowy" value="postalCode">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-3">
      <input class="form-control" readonly name="email" placeholder="Podaj email"value="email">
    </div>
  </div>


  <div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/admin-reklamacje.php';" class="btn btn-secondary ">Powrót</button>
    </div>
	<div class="col-sm">
	<button type="button" onclick="location.href = 'http://localhost/sklep/admin-reklamacje.php';" class="btn btn-danger">Odrzuć</button>
    </div>
    <div class="col-sm">
	<button type="button" onclick="location.href = 'http://localhost/sklep/admin-reklamacje.php';" class="btn btn-success">Akceptuj</button>
    </div>
    
  </div>
</div>

</body>
</html>