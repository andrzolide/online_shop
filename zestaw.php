
<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Zestaw</title>
</head>

<body>
<?php
include "header.php"
?>	

 <center><h2>Dane Zestawu </h2></center>
 <div class="form-group row">
    <label  class="col-sm-2 col-form-label"><b>Nazwa zestawu</b></label>
    <div class="col-sm-3">
	  <input type="text" disabled="" value="Wiedzmin" class="form-control">
    </div>
	
 </div>

 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa elementu</th>
      <th scope="col">Kategoria</th>
      <th scope="col">Cena</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
	 	  <td> Intel Core i5-9400F</td>
      <td>Procesor</td>
      <td>1000</td>
    </tr>
  </tbody>
</table>
 
<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/zestawy.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm">
	<button type="button" class="btn btn-success">Dodaj do koszyka</button>
    </div>
    
  </div>
</div>

</body>
</html>