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

		public function __construct($produkt, $ilosc)
	   	{
	   		$this->produkt=$produkt;
	   		$this->ilosc=$ilosc;
	   	}

		public function getIlosc()
	   	{
	     	return $this->ilosc;             
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