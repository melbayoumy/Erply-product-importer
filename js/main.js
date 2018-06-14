new Vue({
	el: "#app",
	data: {
		product: {
			name: "",
			price: "",
			manufacturerName: "",
			length: "",
			width: "",
			height: "",
			netWeight: "",
			grossWeight: "",
			description: "",
			cost: "",
		},
		message: {
			status: "",
			data: ""
		},
		showLoader: false
	},
	methods: {
		addProduct() {
			this.showLoader = true;
			var self = this;
			$.post('api/product.php', this.product)
			.done(response => {
				this.message = JSON.parse(response);
				self.showLoader = false;
			})
			.fail(err => {
				if(err.status === 400)
				{
					this.message = {
						status: "error",
						data: JSON.parse(err.responseText)
					}					
				}
				else
				{
					this.message = {
						status: "error",
						data: "Server error. Please try again later"
					}						
				}
				self.showLoader = false;
			})
		}
	}
})