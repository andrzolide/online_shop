

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
	<title>Admin- zamówienie</title>
</head>

<body>
<?php
include "header.php"
?>	
	<center><h2>Wszystkie produkty</center></h2>
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produkty</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Procesor</td>
    </tr>
  </tbody>
</table>

<center><label><b>Ustaw status zamówienia</b></label></center>
<div class="col-2 offset-md-5"><select class="form-control m-b" name="status">
                                        <option>Do realizacji</option>
                                        <option>W realizacji</option>
                                        <option>Zrelizowane</option>                                       
                                    </select>
</div>

 <div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/admin-zamowienia.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm offset-4">
	<button type="button" class="btn btn-success">Zapisz</button>
    </div>
    
  </div>
</div>

</body>
</html>
