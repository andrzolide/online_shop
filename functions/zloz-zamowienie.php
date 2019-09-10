<?php 
  //elementy początkowe

  include "../includes/czy-zalogowany.php";

  require_once "../classes-and-functions.php";

  require_once "../pobierz-dane-do-koszyka.php";

  require_once "../connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

  
  $message= "";

  $zapytanie= "";

  if(isset($_SESSION['id'])&&isset($_POST['adres'])){
    $id=$_SESSION['id'];
    $adres=$_POST['adres'];
    $zapytanie = "INSERT INTO zamowienia (id, id_klienta, data, adres_dostawy,status)
      VALUES ('NULL', '$id', CURDATE(), '$adres', 'do-realizacji')";
  }

  if ($polaczenie->query($zapytanie) === TRUE) {
    $message= "info=Pomyślnie dodano zamówienie";
  } else {
    echo "Error: " . $zapytanie . "<br>" . $polaczenie->error;
    $message= "blad=Nie udało się dodać zamówienia";
  }



  //zbierz produkty do zamowoenia

  $produkty_do_zamowienia=array();

  if(!empty($produkty_do_wyswietlenia)){
    foreach ($produkty_do_wyswietlenia as $key => $prod_to_disp) {
      if(isset($produkty_z_numerami_seryjnymi_ilosc[$prod_to_disp->produkt->getId()])){
        $ile=$prod_to_disp->getIlosc();
        echo "co? ".$prod_to_disp->produkt->getNazwa()."ile? : ". $ile. "</br>";
        foreach ($produkty as $key => $prod) {
          if($prod->produkt->getId()==$prod_to_disp->produkt->getId()&&$ile>0){
            $ile--;
            array_push($produkty_do_zamowienia, $prod);
            unset($produkty[$key]);
          }
        }
      }else{
        array_push($produkty_do_zamowienia, $prod_to_disp);
      }

    }
  }
  foreach ($produkty_do_zamowienia as $key => $value) {
    echo $value->produkt->getNazwa() ."numer seryjny ".$value->getNumerSeryjny(). "ilosc: " .$value->getIlosc()."</br>";
  }

  //zapytanie do bazy 

  $zapytanie2= "";
  $zapytanie3= "";
  $zapytanie4= "";

  $id_zam=$polaczenie->insert_id;
  echo "id odatniego gowna!!!: ".$id_zam."</br>";

  if(!empty($produkty_do_zamowienia)){
    foreach ($produkty_do_zamowienia as $key => $prod_to_zam) {
      if(isset($produkty_z_numerami_seryjnymi_ilosc[$prod_to_zam->produkt->getId()])){
        //dodaj produkty do bazy z seryjnymi
        //wygeneruj string pomocniczy;
        $nr_ser=$prod_to_zam->getNumerSeryjny();
        $zapytanie2 .= "UPDATE pr_nr_seryjny SET id_zamowienia='$id_zam' WHERE nr_seryjny =$nr_ser;";
      }
      else{
        //dodaj do drugiej bazy.
        $id_prod=$prod_to_zam->produkt->getId();
        $ilosc=$prod_to_zam->getIlosc();
        $zapytanie3.="INSERT INTO pr_bez_nr_seryjnego_zamowienia (id_produktu, ilosc, id_zamowienia)
            VALUES ('$id_prod', '$ilosc', '$id_zam');";
        $nowa_ilosc=$prod_to_zam->getIloscNaMagazynie()-$prod_to_zam->getIlosc();
        echo "nowa ilosc ". $nowa_ilosc. "</br>";
        $zapytanie4.="UPDATE pr_bez_nr_seryjnego SET ilosc_w_magazynie='$nowa_ilosc' WHERE id_produktu =$id_prod;";
      }
    }
  }

  if ($polaczenie->multi_query($zapytanie3) === TRUE) {
  } else {
      echo "Error: " . $zapytanie3 . "<br>" . $polaczenie->error;
  }

  if ($polaczenie->multi_query($zapytanie2) === TRUE) {
  } else {
      echo "Error: " . $zapytanie2 . "<br>" . $polaczenie->error;
  }

  if ($polaczenie->multi_query($zapytanie4) === TRUE) {
  } else {
      echo "Error: " . $zapytanie4 . "<br>" . $polaczenie->error;
  }

  $polaczenie->close();

 $_SESSION['chart'] = array();
 $_SESSION['chart-num'] = 0;
 $_SESSION['chart-val'] = 0;


header('Location: ../sklep.php?'.$message);
?>