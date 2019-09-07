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
      <th scope="col">Zwroty</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
	  <td><a href= 'http://localhost/sklep/admin-zwrot.php'>Zwrot 1</a></td>
    </tr>
  </tbody>
</table>
 
<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/admin.php';" class="btn btn-secondary ">Powrót</button>
    </div>
   
  </div>
</div>

</body>
</html>