<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep - zwrot</title>
</head>

<body>

<?php
include "header.php"
?>	
  <center>  <h2> Dane zwrotu</h> </center>
  <form action="productBack.php" method="post">

  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Nazwa produktu</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" name="productName" value="Procesor">
    </div>
  </div>
	  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Przyczyna zwrotu i opis</label>
    <div class="col-7">
	 <textarea class="form-control" name="description" rows="12"></textarea>
    </div>

  </div>

</form>

	<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/moje-zamowienia.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm">
	<button type="button"onclick="location.href = 'http://localhost/sklep/moje-zamowienia.php';" class="btn btn-success">Wyślij zgłoszenie</button>
    </div>
    
  </div>
</div>


</body>
</html>