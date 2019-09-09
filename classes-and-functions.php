<?php 

	class Produkt{
		private $id;
		private $cena;
		private $nazwa;
		private $id_kategorii;

		public function __construct($id,$cena,$nazwa,$id_kategorii)
	   	{
	   		$this->id = $id;
	   		$this->cena = $cena;
	      	$this->nazwa = $nazwa;
	      	$this->id_kategorii = $id_kategorii;
	   	}

		public function getId()
	   	{
	     	return $this->id;             
	   	}  
		public function getCena()
	   	{
	     	return $this->cena;             
	   	}  
	   	public function getNazwa()
	   	{
	     	return $this->nazwa;             
	   	}  
	   	public function getIdKategorii()
	   	{
	     	return $this->id_kategorii;             
	   	}  
    }
    
    class Parametr{
		private $id;
		private $nazwa;
		private $id_kategorii;

		public function __construct($id,$nazwa,$id_kategorii)
	   	{
	   		$this->id = $id;
	      	$this->nazwa = $nazwa;
	      	$this->id_kategorii = $id_kategorii;
	   	}

		public function getId()
	   	{
	     	return $this->id;             
	   	}  
	   	public function getNazwa()
	   	{
	     	return $this->nazwa;             
	   	}  
	   	public function getIdKategorii()
	   	{
	     	return $this->id_kategorii;             
	   	}  
	}

	class ProduktKoszyk{
		public $produkt;
		private $ilosc;
		private $ilosc_na_magazynie;
		private $numer_seryjny;

		public function __construct($produkt, $ilosc, $ilosc_na_magazynie, $numer_seryjny)
	   	{
	   		$this->produkt=$produkt;
	   		$this->ilosc=$ilosc;
	   		$this->ilosc_na_magazynie=$ilosc_na_magazynie;
	   		$this->numer_seryjny=$numer_seryjny;
	   	}

		public function getIlosc()
	   	{
	     	return $this->ilosc;             
	   	}  
	   	public function getNumerSeryjny()
	   	{
	     	return $this->numer_seryjny;             
	   	}  
	   	public function getIloscNaMagazynie()
	   	{
	     	return $this->ilosc_na_magazynie;             
	   	}   
	   	public function setNumerSeryjny($numer_seryjny)
	   	{
	     	$this->numer_seryjny=$numer_seryjny;           
	   	}  
	   	public function setIloscNaMagazynie($ilosc_na_magazynie)
	   	{
	     	$this->ilosc_na_magazynie=$ilosc_na_magazynie;           
	   	}  
	}

		class ProduktZamowienie{
		private $id_produktu;
		private $nazwa;
		private $ilosc;
		private $cena;
		private $numer_seryjny;
		private $data;
		private $id_zamowienia;
		private $adres_dostawy;

		public function __construct($id_produktu, $nazwa, $ilosc, $cena, $numer_seryjny, $data, $id_zamowienia, $adres_dostawy)
	   	{
	   		$this->id_produktu=$id_produktu;
	   		$this->nazwa=$nazwa;
	   		$this->ilosc=$ilosc;
	   		$this->cena=$cena;
	   		$this->numer_seryjny=$numer_seryjny;
	   		$this->data=$data;
	   		$this->id_zamowienia=$id_zamowienia;
	   		$this->adres_dostawy=$adres_dostawy;
	   	}

		public function getIdProduktu()
	   	{
	     	return $this->id_produktu;             
	   	}  
	   	public function getNazwa()
	   	{
	     	return $this->nazwa;             
	   	}  
	   	public function getIlosc()
	   	{
	     	return $this->ilosc;             
	   	} 
	   	public function getCena()
	   	{
	     	return $this->cena;             
	   	} 
	   	public function getNumerSeryjny()
	   	{
	     	return $this->numer_seryjny;             
	   	} 
	   	public function getData()
	   	{
	     	return $this->data;             
	   	} 
	   	public function getIdZamowienia()
	   	{
	     	return $this->id_zamowienia;             
	   	} 
	   	public function getAdresDostawy()
	   	{
	     	return $this->adres_dostawy;             
	   	} 


	}

	class Kategoria{
		private $id;
		private $nazwa;
		private $id_ojca;
		public $podkategorie = array();

		public function __construct($id,$nazwa,$id_ojca)
	   	{
	   		$this->id = $id;
	      	$this->nazwa = $nazwa;
	      	$this->id_ojca = $id_ojca;
	   	}

		public function getId()
	   	{
	     	return $this->id;             
	   	}  
	   	public function getNazwa()
	   	{
	     	return $this->nazwa;             
	   	}  
	   	public function getIdOjca()
	   	{
	     	return $this->id_ojca;             
	   	} 
	}

	class Zamowienie{
		private $id;
		private $login;
		private $data;
		private $adres;
		private $status;

		public function __construct($id,$login,$data,$adres,$status)
	   	{
	   		$this->id = $id;
	      	$this->login = $login;
	      	$this->data = $data;
	      	$this->adres = $adres;
	      	$this->status = $status;
	   	}

		public function getId()
	   	{
	     	return $this->id;             
	   	}  
	   	public function getLogin()
	   	{
	     	return $this->login;             
	   	}  
	   	public function getData()
	   	{
	     	return $this->data;             
	   	}  
	   	public function getAdres()
	   	{
	     	return $this->adres;             
	   	}  
	   	public function getStatus()
	   	{
	     	return $this->status;             
	   	} 
	}

	class Zwrot{
		private $id;
		private $login;
		private $zamowienie;
		private $produkt;
		private $opis;
		private $id_produktu;
		private $nr_seryjny;

		public function __construct($id,$login,$zamowienie,$produkt,$opis,$id_produktu,$nr_seryjny)
	   	{
	   		$this->id = $id;
	      	$this->login = $login;
	      	$this->zamowienie = $zamowienie;
	      	$this->produkt = $produkt;
	      	$this->opis = $opis;
	      	$this->id_produktu = $id_produktu;
	      	$this->nr_seryjny = $nr_seryjny;
	   	}

		public function getId()
	   	{
	     	return $this->id;             
	   	}  
	   	public function getLogin()
	   	{
	     	return $this->login;             
	   	}  
	   	public function getZamowienie()
	   	{
	     	return $this->zamowienie;             
	   	}  
	   	public function getProdukt()
	   	{
	     	return $this->produkt;             
	   	}  
	   	public function getOpis()
	   	{
	     	return $this->opis;             
	   	} 
	   	public function getIdProduktu()
	   	{
	     	return $this->id_produktu;             
	   	} 
	   	public function getNrSeryjny()
	   	{
	     	return $this->nr_seryjny;             
	   	} 
	}

?>