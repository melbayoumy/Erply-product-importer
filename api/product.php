<?php

require_once('../repositories/Product.php');

// Allow Ajax calls only
notAjaxRequest();

// Assessing coming request	
switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
			if(!$_POST['name']) 
			{
				http_response_code(400);
				die(json_encode("Product name is missing"));				
			}
			
			$product = new Product();
			$product->setName($_POST['name']);
			$product->setPrice($_POST['price']);
			$product->setManufacturerName($_POST['manufacturerName']);
			$product->setLength($_POST['length']);
			$product->setWidth($_POST['width']);
			$product->setHeight($_POST['height']);
			$product->setNetWeight($_POST['netWeight']);
			$product->setGrossWeight($_POST['grossWeight']);
			$product->setDescription($_POST['description']);
			$product->setCost($_POST['cost']);
			
			// Store new product
			$newProduct = $product->store();
			
			if($newProduct['status'] === "fail") 
			{
				http_response_code(208);
				die(json_encode($newProduct));
			}
			
			http_response_code(201);
			die(json_encode(['status' => 'success', 'data' => 'Product created successfully']));
        break;

    default:
        http_response_code(404);
		die(json_encode("Not found"));
}

/**
* Check if request is not Ajax
**/
function notAjaxRequest() {
	if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        http_response_code(403);
		die(json_encode("Not allowed"));
	}
}
?>