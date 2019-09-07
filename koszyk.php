<?php

	session_start();
	
	if (!(isset($_SESSION['zalogowany'])) || ($_SESSION['zalogowany']==false))
	{
		header('Location: sklep.php');
		exit();
	}

	require_once "classes-and-functions.php";

	function utworz_string_z_produktami($produkty){
		$string="";
		foreach ($produkty as $id){
			if($string != "") { $string = $string . ", "; }
    		$string = $string . $id;
	    }
	    echo "string pomocniczy: " . $string . "</br>";

		return $string;
	}

	require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


	//----------------------------------------------------

	$produkty=array();
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else{
		echo "PRODUKTY: </br>";

		$zapytanie="";

		$string_pomocniczy="";

		if(isset($_SESSION['chart'])){
			$string_pomocniczy = utworz_string_z_produktami($_SESSION['chart']);
		
			$zapytanie="SELECT * FROM produkty WHERE id IN(" . $string_pomocniczy . ");";

			if ($rezultat = @$polaczenie->query($zapytanie)){
				if ($rezultat->num_rows > 0) {
				    while($row = $rezultat->fetch_assoc()) {
				    	$count = count(array_keys($_SESSION['chart'], $row['id']));
				    	array_push($produkty, new ProduktKoszyk(new Produkt($row['id'],$row['cena'],$row['nazwa'],$row['id_kategorii']),$count));
				    }

				} else {
				    echo "0 results";
				}
			}


		}else{
			echo "Brak produktów w koszyku";
		}

	}

  //     foreach ($produkty as  $value) {
  //   echo "id: ". $value->produkt->getNazwa() . " ilosc: ". $value->getIlosc() ;
  //   echo ' <a href = "functions/usun-z-koszyka.php?id_produktu=' .$value->produkt->getId(). '">usun</a> </br>';
  // }


?>




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
	<title>Sklep- koszyk</title>
</head>

<body>
<?php
include "header.php"
?>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Cena</th>
      <th scope="col">Ilość</th>
	  <th scope="col">Usuń</th>

    </tr>
  </thead>
  <tbody>




    <?php   foreach ($produkty as  $value) { ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $value->produkt->getNazwa() ?></td>
      <td><?php echo $value->produkt->getCena() ?></td>
      <td>

	  <div class="center">
      </p><div class="input-group">
          <span class="input-group-btn">
              <button type="button" class="btn btn-danger btn-number btn"  data-type="minus" data-field="quant[2]">
                <span class="glyphicon glyphicon-minus"></span>
              </button>
          </span>
          <input type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number btn" data-type="plus" data-field="quant[2]">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
          </span>
      </div>
	<p></p>
</div>
	  
	  </td>
	  <td><button   type="button" class="btn btn-secondary"> <?php 
    echo ' <a href = "functions/usun-z-koszyka.php?id_produktu=' .$value->produkt->getId(). "&cena=". $value->produkt->getCena() . '">usun</a>';
     ?> </button></td>
    </tr>

    <?php  } ?>
	
  </tbody>
</table>


<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Całkowity koszt zamówienia:</label>
    <div class="col-sm-2">
      <?php 
      $chart_value=0;

      if(isset($_SESSION['chart-val'])){
        $chart_value=$_SESSION['chart-val'];
      }
      echo '<input class="form-control" type="number" placeholder="'.$chart_value.'" readonly>'
       ?>
	  
    </div>
  </div>


<div class="container">
  <div class="row">
    <div class="col-sm">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/sklep.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm">
	<button type="button" onclick="location.href = 'http://localhost/sklep/zamow.php';" class="btn btn-success">Złóż zamówienie</button>
    </div>
    
  </div>
</div>



</body>


</html>

<script>
//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<style>
.center{
width: 100px;
 
}
</style>