<?php 
  //elementy początkowe

  include "../includes/czy-zalogowany.php";

  require_once "../classes-and-functions.php";

  require_once "../pobierz-dane-do-koszyka.php";

  require_once "../connect.php";
  $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);


  $zapytanie= "";

  if(isset($_SESSION['id'])&&isset($_POST['adres'])){
    $id=$_SESSION['id'];
    $adres=$_POST['adres'];
    $zapytanie = "INSERT INTO zamowienia (id, id_klienta, data, adres_dostawy,status)
      VALUES ('NULL', '$id', CURDATE(), '$adres', 'do-realizacji')";
  }

  if ($polaczenie->query($zapytanie) === TRUE) {
    echo "New record created successfully". "<br>";
  } else {
    echo "Error: " . $zapytanie . "<br>" . $polaczenie->error;
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
      }
    }
  }

  if ($polaczenie->multi_query($zapytanie3) === TRUE) {
    echo "New records created successfully";
  } else {
      echo "Error: " . $zapytanie3 . "<br>" . $polaczenie->error;
  }

  if ($polaczenie->multi_query($zapytanie2) === TRUE) {
    echo "New records updated successfully";
  } else {
      echo "Error: " . $zapytanie2 . "<br>" . $polaczenie->error;
  }

  $polaczenie->close();

  //$zapytanie2 = "UPDATE pr_nr_seryjny SET id_zamowienia='$id_zam', WHERE nr_seryjny IN( ) ";


//   $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Mary', 'Moe', 'mary@example.com');";
// $sql .= "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('Julie', 'Dooley', 'julie@example.com')";

// if ($conn->multi_query($sql) === TRUE) {
//     echo "New records created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();

//header('Location: ../sklep.php?info=Pomyślnie złożono zamówienie');
?>