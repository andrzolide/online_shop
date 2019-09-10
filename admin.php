<?php 

include "includes/czy-admin.php";


 ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep</title>
</head>

<body>
	<center><h2>Centrum Magazyniera</center></h2>
<div class="container">
<div class="row">
  <div class="col-md-3 offset-md-3 m-4"><button type="button"  onclick="location.href = 'admin-zamowienia.php';" class="btn-warning btn-ms ">Zamówienia</button></div>
</div>
<div class="row">
  <div class="col-md-3 offset-md-3 m-4"><button type="button"  onclick="location.href = 'admin-reklamacje.php';" class=" btn-warning btn-ms ">Reklamacje</button></div>
</div>
<div class="row">
  <div class="col-md-3 offset-md-3 m-4"><button type="button"  onclick="location.href = 'admin-zwroty.php';" class="btn-warning btn-ms ">Zwroty</button></div>
</div>
<div class="row">
  <div class="col-md-3 offset-md-3 m-4"><button type="button"  onclick="location.href = 'admin-raporty.php';" class=" btn-warning btn-ms ">Raporty</button></div>
</div>
<div class="row">
  <div class="col-md-3 offset-md-3 m-4"><button type="button"  onclick="location.href = 'sklep.php';" class=" btn-warning btn-ms ">Powrót</button></div>
</div>
</div>


</body>
</html>