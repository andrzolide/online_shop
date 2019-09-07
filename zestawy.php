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
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"> Nazwa zestawu</th>
      <th scope="col">Łączna cena</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><a href="http://localhost/sklep/zestaw.php">Wiedzmin</a></td>
      <td>4000</td>
      <td><button   type="button" class="btn btn-success"> <a href="/link/to/page2">Dodaj do koszyka</a> </button></td>
    </tr>
  </tbody>
</table>
	

<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/sklep.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm">
	<button type="button" class="btn btn-success">Wyślij zgłoszenie</button>
    </div>
    
  </div>
</div>	

</body>
</html>