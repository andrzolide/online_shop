<?php 
  //elementy początkowe

  include "includes/czy-zalogowany.php";

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
      <input  class="form-control" name="imie" placeholder="Podaj imię" value="<?php echo $_SESSION['imie']; ?>">
    </div>
	
	<label  class="col-sm-1 col-form-label">Nazwisko</label>
    <div class="col-sm-3">
      <input  class="form-control" name="nazwisko" placeholder="Login" value="<?php echo $_SESSION['nazwisko']; ?>">
    </div>
  </div>



 <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Login</label>
    <div class="col-sm-3">
      <input  class="form-control" name="login" placeholder="Podaj miasto" value="<?php echo $_SESSION['login']; ?>">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Domyślny adres</label>
    <div class="col-sm-3">
      <input class="form-control" name="domyslny_adres" placeholder="Podaj adres"value="<?php echo $_SESSION['domyslny_adres']; ?>">
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


<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'sklep.php';" class="btn btn-secondary ">Powrót</button>
    </div>

    
  </div>
</div>







</body>
</html>