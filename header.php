<div class="container">
  <div class="row">
    <div class="col-ms">
	<button type="button" onclick="location.href = 'http://localhost/sklep/admin.php';"  class="btn btn-primary btn-primary btn-lg">Panel administratora</button>
    </div>
    <div class="col-lg">
	<button type="button" onclick="location.href = 'http://localhost/sklep/index.php';" class="btn btn-primary btn-primary btn-lg">Logo</button>
    </div>
    <div class="col-lg">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/koszyk.php';" class="btn btn-primary btn-primary btn-lg ">Koszyk </br> ilość przedmiotów : <?php 
    if (isset($_SESSION['chart-num']))
    {
        echo $_SESSION['chart-num'];
    }else{
        echo 0;
    }

    echo " </br>";
    echo "wartosc: ";
    if (isset($_SESSION['chart-val']))
    {
        echo $_SESSION['chart-val'];
    }else{
        echo 0;
    }

     ?></button>
    </div>
	<div class="col-lg">
	<button type="button"  onclick="location.href = 'logout.php';" class="btn btn-primary btn-primary btn-lg ">Wyloguj</button>
    </div>
	<div class="col-lg">
    <?php 
    $id_uzytkownika="";
    if(isset($_SESSION['id'])){
        $id_uzytkownika=$_SESSION['id'];
    }

    ?>
    <a href="moje-dane.php?<?php echo "id=$id_uzytkownika" ?>">
	<button type="button" class="btn btn-primary btn-primary btn-lg">Moje dane</button>
    </a>
    </div>
    <div class="col-lg">
	<button type="button"  onclick="location.href = 'http://localhost/sklep/moje-zamowienia.php';" class="btn btn-primary btn-primary btn-lg">Moje zamówienia</button>
    </div>
  </div>
</div>