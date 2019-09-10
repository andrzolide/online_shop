    <?php 
    $id_uzytkownika="";
    if(isset($_SESSION['id'])){
        $id_uzytkownika=$_SESSION['id'];
    }



    ?>


<nav style="margin-bottom:30px;" class="navbar navbar-expand-lg navbar-light bg-light">
  <?php 
    if(isset($_SESSION['funkcja'])){
        if($_SESSION['funkcja']=='magazynier'){
?>
  <a class="navbar-brand" href="admin.php">Panel menagera</a>
  <?php  
        }
    }
?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="sklep.php">Strona główna <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="koszyk.php">Mój koszyk [<?php 
    if (isset($_SESSION['chart-num']))
    {
        echo $_SESSION['chart-num'];
    }else{
        echo 0;
    }?>]</a>       
      </li>
      <li class="nav-item">
        <a class="nav-link" href="moje-dane.php?<?php echo "id=$id_uzytkownika" ?>">Moje dane</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="moje-zamowienia.php">Zamówienia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Wyloguj</a>
      </li>
    </ul>
    <span class="navbar-text">
      Witaj <?php echo $_SESSION['imie'] ?>
    </span>
  </div>
</nav>

</div>
