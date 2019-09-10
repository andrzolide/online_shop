<?php
  include "includes/czy-zalogowany.php";

$id_zam="";
$id_prod_bez_nr="";
$nr_ser="";
$nazwa_prod="";
$status="";

if(isset($_GET['id_zamowienia'])){$id_zam=$_GET['id_zamowienia'];}
if(isset($_GET['id_prod_bez_nr_ser'])){$id_prod_bez_nr=$_GET['id_prod_bez_nr_ser'];}
if(isset($_GET['nr_ser'])){$nr_ser=$_GET['nr_ser'];}
if(isset($_GET['nazwa_prod'])){$nazwa_prod=$_GET['nazwa_prod'];}
if(isset($_GET['status'])){$status=$_GET['status'];}

$string_pom="id_zamowienia=".$id_zam."&id_prod_bez_nr_ser=".$id_prod_bez_nr."&nr_ser=".$nr_ser."&nazwa_prod=".$nazwa_prod."&status=".$status;


  ?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Sklep - reklamacja</title>
</head>

<body>

<?php
include "header.php"
?>	
  <center>  <h2> Dane reklamacji</h> </center>

  <form action="functions/zloz-reklamacje.php?<?php echo $string_pom ?>" method="post">
  <div class="form-group row">
    <label  class="col-sm-2 col-form-label">Nazwa produktu</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" name="productName" value="<?php echo $nazwa_prod ?>">
    </div>
  </div>
	  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Przyczyna reklamacji i opis</label>
    <div class="col-7">
	 <textarea class="form-control" name="opis" rows="6"></textarea>
    </div>

  </div>

  <div class="container">
  <div class="row">
    <div class="col-sm">
  <button type="button"  onclick="location.href = 'moje-zamowienia.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm">
  <input type="submit" class="btn btn-success" value="Wyślij Reklamację" />
    </div>
    
  </div>
</div>  
</form>



</body>
</html>