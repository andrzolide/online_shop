<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep - raporty</title>
</head>

<body>
<?php
include "header.php"
?>	
<center><h2>Stwórz raport </center></h2>
<div class="form-group row">
<label class="col-sm-1 col-form-label">Szukaj w</label>
<div class="col-3">
<div class="dropdown">
<select class="form-control m-b" name="status">
                                        <option>Do realizacji</option>
                                        <option>W realizacji</option>
                                        <option>Zrelizowane</option>                                       
                                    </select>
    </div>

</div>
</div>

<div class="form-group row">
<label class="col-sm-1 col-form-label">Kategoria</label>
<div class="col-3">
<div class="dropdown">
<select class="form-control m-b" name="status">
                                        <option>Procesory</option>
                                        <option>Karty graficzne</option>
                                        <option>Płyty główne</option>                                       
                                    </select>
    </div>

</div>
</div>
<div class="form-group row">
    <label  class="col-sm-1 col-form-label">Od daty</label>
    <div class="col-sm-3">
      <input  class="form-control" type="date"name="city" placeholder="Podaj miasto" value="city">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword" type = "date" class="col-sm-1 col-form-label">Do dnia</label>
    <div class="col-sm-3">
      <input class="form-control" type="date" name="street" placeholder="Podaj ulice" value="street">
    </div>
  </div>




  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'admin.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm">
	<button type="button" onclick="location.href = 'admin-raport.php';" class="btn btn-success">Pokaż raport</button>
    </div>
    
  </div>
</div>

</body>
</html>