<!doctype html>
<html>
<head>
    <title>ERPLY Product Importer</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="https://erply.com/wp-content/themes/Erply2.0/favicon-new.ico" />
	
	<!-- Bootstrap CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">	

	<!-- Font Awesome CDN -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
	<div id="app" class="container py-5">
		<!-- Loader -->
		<div v-if="showLoader" style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; background: rgba(0,0,0,0.5); z-index: 100; text-align: center; padding-top: 40vh;">
			<i class="fas fa-spinner fa-pulse fa-5x text-white"></i>
		</div>
	
	
		<!-- Main content -->
		<p><img src="https://erply.com/wp-content/themes/Erply3.5/img/erply-point-of-sale.jpg"><span class="lead">product importer</span></p>
		<form @submit.prevent="addProduct" method="POST" class="border rounded p-3 my-3 text-center">
		
			<input v-model="product.name" type="text" class="form-group form-control form-control-sm" name="name" placeholder="Name" required>
			<input v-model="product.manufacturerName" type="text" class="form-group form-control form-control-sm" name="manufacturerName" placeholder="Manufacturer Name">
			
			<div class="form-group form-row px-1">
				<input v-model="product.price" type="number" min="1" step="1" class="col form-control form-control-sm" name="price" placeholder="Price (&euro;)">
				<input v-model="product.cost" type="number" min="1" step="1"  class="col form-control form-control-sm" name="cost" placeholder="Cost (&euro;)">
			</div>
			
			<div class="form-group form-row px-1">
				<input v-model="product.netWeight" type="number" min="1" step="1"  class="col form-control form-control-sm" name="netWeight" placeholder="Net Weight (kg)">
				<input v-model="product.grossWeight" type="number" min="1" step="1"  class="col form-control form-control-sm" name="grossWeight" placeholder="Gross Weight (kg)">
			</div>
			<div class="form-group form-row px-1">
				<input v-model="product.length" type="number" min="1" step="1"  class="col form-control form-control-sm" name="length" placeholder="Length (mm)">
				<input v-model="product.width" type="number" min="1" step="1"  class="col form-control form-control-sm" name="width" placeholder="Width (mm)">
				<input v-model="product.height" type="number" min="1" step="1"  class="col form-control form-control-sm" name="height" placeholder="Height (mm)">
			</div>			
			
			<textarea v-model="product.description" class="form-group form-control form-control-sm" name="description" placeholder="Description" style="resize: none" rows="2"></textarea>

			<!-- messages -->
			<p v-if="message.status !== ''" class="small alert mb-2" :class="[message.status === 'success' ? 'alert-success' : 'alert-danger']">
				{{ message.data }}
			</p>
			
			<input type="submit" class="btn btn-sm btn-primary" name="addProduct" value="Add product"/>
		</form>
	</div>
	
	<!-- VueJs CDN -->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>
	
	<!-- jQuery CDN, will be used in Ajax calls -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<!-- main js file -->
	<script src="js/main.js"></script>
</body>
</html>
