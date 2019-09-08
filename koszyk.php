<?php

  include "includes/czy-zalogowany.php";

  require_once "classes-and-functions.php";

  require_once "pobierz-dane-do-koszyka.php";

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
<?php
include "info-blad.php"
?>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nazwa</th>
      <th scope="col">Cena</th>
      <th scope="col">Ilość</th>
      <th scope="col">Ilość dostępnych</th>
	     <th scope="col">Usuń</th>

    </tr>
  </thead>
  <tbody>




    <?php   foreach ($produkty_do_wyswietlenia as  $value) { ?>
    <tr>
      <th scope="row"><?php echo $value->produkt->getId() ?></th>
      <td><?php echo $value->produkt->getNazwa() ?></td>
      <td><?php echo $value->produkt->getCena() ?></td>
      <td>
        <a style="color:red;" href="functions/usun-z-koszyka.php?id_produktu=<?php echo $value->produkt->getId()."&cena=".$value->produkt->getCena()."&target=koszyk" ?>">usun</a>
        <a style="color:green;" href="functions/dodaj-do-koszyka.php?id_produktu=<?php echo $value->produkt->getId()."&cena=".$value->produkt->getCena()."&target=koszyk" ?>">dodaj</a>
        
	  <div class="center">
      </p><div class="input-group">
        <input type="text" name="quant[2]" class="form-control input-number" value=" <?php echo $value->getIlosc() ?>" min="1" max="100">
   
          
          <span class="input-group-btn">
              <button type="button" class="btn btn-success btn-number btn" data-type="plus" ></button>
          </span>
      </div>
	<p></p>
</div>
	  
	  </td>
    <td>
      
      <?php 
      if(empty($value->getIloscNaMagazynie())){
        echo $produkty_z_numerami_seryjnymi_ilosc[$value->produkt->getId()];
      } else{
        echo $value->getIloscNaMagazynie();
      }
      ?>

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
	<button type="button"  onclick="location.href = 'sklep.php';" class="btn btn-secondary ">Powrót</button>
    </div>
    <div class="col-sm">
	<button type="button" onclick="location.href = 'zamow.php';" class="btn btn-success">Złóż zamówienie</button>
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