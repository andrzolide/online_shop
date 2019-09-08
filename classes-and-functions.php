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
		private $id_klienta;
		private $data;
		private $adres;

		public function __construct($id,$id_klienta,$data,$adres)
	   	{
	   		$this->id = $id;
	      	$this->id_klienta = $id_klienta;
	      	$this->data = $data;
	      	$this->adres = $adres;
	   	}

		public function getId()
	   	{
	     	return $this->id;             
	   	}  
	   	public function getIdKlienta()
	   	{
	     	return $this->id_klienta;             
	   	}  
	   	public function getData()
	   	{
	     	return $this->data;             
	   	}  
	   	public function getAdres()
	   	{
	     	return $this->adres;             
	   	}  
	}

?>