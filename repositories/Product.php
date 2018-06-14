<?php

if (session_status() == PHP_SESSION_NONE) session_start();

// include ERPLY API class
include(__DIR__ . '/../vendor/EAPI.class.php');

class Product {
	
	private $name;
	private $groupID = 1;
	private $price;
	private $manufacturerName;
	private $length;
	private $width;
	private $height;
	private $netWeight;
	private $grossWeight;
	private $description; 
	private $cost;
	
	private $api;
	
	public function __construct() {
		// Initialise class
		$this->api = new EAPI();

		// Configuration settings
		$this->api->clientCode = 500278;
		$this->api->username = "mahmoud.elbayoumy@gmail.com";
		$this->api->password = "500278Pass";
		$this->api->url = "https://".$this->api->clientCode.".erply.com/api/";
	}
	
	/////////// Setters
	/**
	* Set name
	*
	* @param string $name
	*
	**/
	public function setName($name) 
	{
		$this->name = $name;
	}

	/**
	* Set groupID
	*
	* @param integer $groupID
	*
	**/	
	public function setGroupID($groupID) 
	{
		$this->groupID = $groupID;
	}
	
	/**
	* Set price
	*
	* @param decimal $price
	*
	**/	
	public function setPrice($price) 
	{
		$this->price = $price;
	}
	
	/**
	* Set manufacturerName
	*
	* @param string $manufacturerName
	*
	**/	
	public function setManufacturerName($manufacturerName) 
	{
		$this->manufacturerName = $manufacturerName;
	}
	
	/**
	* Set length
	*
	* @param integer $length
	*
	**/	
	public function setLength($length) 
	{
		$this->length = $length;
	}
	
	/**
	* Set width
	*
	* @param integer $width
	*
	**/	
	public function setWidth($width) 
	{
		$this->width = $width;
	}
	
	/**
	* Set height
	*
	* @param integer $height
	*
	**/	
	public function setHeight($height) 
	{
		$this->height = $height;
	}
	
	/**
	* Set netWeight
	*
	* @param float $netWeight
	*
	**/	
	public function setNetWeight($netWeight) 
	{
		$this->netWeight = $netWeight;
	}
	
	/**
	* Set grossWeight
	*
	* @param float $grossWeight
	*
	**/	
	public function setGrossWeight($grossWeight) 
	{
		$this->grossWeight = $grossWeight;
	}
	
	/**
	* Set description
	*
	* @param string $description
	*
	**/	
	public function setDescription($description) 
	{
		$this->description = $description;
	}
	
	/**
	* Set cost
	*
	* @param decimal $cost
	*
	**/	
	public function setCost($cost) 
	{
		$this->cost = $cost;
	}
	
	////////////// Getters
	/**
	* Get name
	*
	* @return string
	*
	**/
	public function getName() 
	{
		return $this->name;
	}

	/**
	* Get groupID
	*
	* @return integer
	*
	**/	
	public function getGroupID() 
	{
		return $this->groupID;
	}
	
	/**
	* Get price
	*
	* @return decimal
	*
	**/	
	public function getPrice() 
	{
		return $this->price;
	}
	
	/**
	* Get manufacturerName
	*
	* @return string
	*
	**/	
	public function getManufacturerName() 
	{
		return $this->manufacturerName;
	}
	
	/**
	* Get length
	*
	* @return integer 
	*
	**/	
	public function getLength() 
	{
		return $this->length;
	}
	
	/**
	* Get width
	*
	* @return integer
	*
	**/	
	public function getWidth() 
	{
		return $this->width;
	}
	
	/**
	* Get height
	*
	* @return integer
	*
	**/	
	public function getHeight() 
	{
		return $this->height;
	}
	
	/**
	* Get netWeight
	*
	* @return float
	*
	**/	
	public function getNetWeight() 
	{
		return $this->netWeight;
	}
	
	/**
	* Get grossWeight
	*
	* @return float
	*
	**/	
	public function getGrossWeight() 
	{
		return $this->grossWeight;
	}
	
	/**
	* Get description
	*
	* @return string
	*
	**/	
	public function getDescription() 
	{
		return $this->description;
	}
	
	/**
	* Get cost
	*
	* @return decimal
	*
	**/	
	public function getCost() 
	{
		return $this->cost;
	}
	
	//////// Product management methods
	/**
	* Store new product
	*
	* @params Product $product
	* @return array
	**/
	public function store() {
		// Search for product if exists
		$products = json_decode($this->api->sendRequest("getProducts", ['name' => $this->name]), true);
		if(count($products['records']) > 0)
		{
			return ['status' => 'fail', 'data' => 'Product already exists'];
		}
		
		// Create a new product
		$inputParameters = array(
			'name' => $this->name,
			'groupID' => $this->groupID,
			'price' => $this->price,
			'manufacturerName' => $this->manufacturerName,
			'length' => $this->length,
			'width' => $this->width,
			'height' => $this->height,
			'netWeight' => $this->netWeight,
			'grossWeight' => $this->grossWeight,
			'description' => $this->description,
			'cost' => $this->cost,
		);

		// Save product
		$result = $this->api->sendRequest("saveProduct", $inputParameters );
		
		// Default output format is JSON, so we'll decode it into a PHP array
		$output = json_decode($result, true);
		
		return ['status' => 'success', 'data' => $output];
	}
}

?>
