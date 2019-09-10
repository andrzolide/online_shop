

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Sklep-raport</title>
</head>

<body>

<?php
include "header.php"
?>	
<center><h2>Wynik Raportu</center></h2>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Cena</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Procesor</td>
      <td>1000</td>
	  <td>10.04.2019</td>
    </tr>
  </tbody>
</table>
	


<div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'admin.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    
  </div>
</div>

</body>
</html>