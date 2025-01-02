<div class="col-sm-12 py-5">
    <div class="container">
        <h2 class="text-center fw-bold py-4">My Order</h2>
        <div style="border-radius:25px;" class="col-sm-12 border">
            <h3 class="text-left"><?php echo $name;?></h3>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var product_id = $(this).data("productid");
            var product_name = $(this).data("productname");
            var product_price = $(this).data("price");
            var discount = $('#discount' + product_id).val();
            var type = $('#type' + product_id).val();
            var quantity = $('#' + product_id).val();
            if(quantity != '' && quantity > 0){
				if((type === "percentage" || type === "amount") && discount == ''){
					alert("Please Enter discount");
				}
				else{
					console.log({
						product_id:product_id, 
						product_name:product_name, 
						product_price:product_price, 
						quantity:quantity,
						discount:discount,
						type:type,
						//total:total
					});
					$.ajax({
						url:"<?php echo base_url(); ?>shopping_cart/add",
						method:"POST",
						data:{
							product_id:product_id, 
							product_name:product_name, 
							product_price:product_price, 
							discount:discount,
							quantity:quantity,
							type:type,
						// total:total
						},
						success:function(data){
							alert("Product Added into Cart");
							$('#cart_details').html(data);
							$('#' + product_id).val('');
						}
					});
				}
               // var discounted_price = product_price - discount;
				//var total = discounted_price * quantity;
                
            }
            else{
                alert("Please Enter quantity");
            }
        });
        $('#cart_details').load("<?php echo base_url(); ?>shopping_cart/load");
        $(document).on('click', '.remove_inventory', function(){
            var row_id = $(this).attr("id");
            if(confirm("Are you sure you want to remove this?")){
                $.ajax({
                    url:"<?php echo base_url(); ?>shopping_cart/remove",
                    method:"POST",
                    data:{row_id:row_id},
                    success:function(data){
                        alert("Product removed from Cart");
                        $('#cart_details').html(data);
                    }
                });
            }
            else{
                return false;
            }
        });
        $(document).on('click', '#clear_cart', function(){
            if(confirm("Are you sure you want to clear cart?")){
                $.ajax({
                    url:"<?php echo base_url(); ?>shopping_cart/clear",
                    success:function(data){
                        alert("Your cart has been clear...");
                        $('#cart_details').html(data);
                    }
                });
            }
            else{
                return false;
            }
        });
		$(document).on('click','#checkoutBtn',function() {			 
			var customer_id = $('.customer_id').text();
			var customer_name = $('.customer_name').text();
			
			var payment = $("#payment").val();
			console.log({
				customer_id:customer_id, 
				customer_name:customer_name, 
				address:address, 
				payment:payment,
				transportation:transportation,
				SendToAppoval:SendToAppoval,
				supervised_by:supervised_by,
				post_date:post_date
				//total:total
			});
			$.ajax({
				method: 'POST',
				data:{
					customer_id:customer_id, 
				customer_name:customer_name, 
				address:address, 
				payment:payment,
				transportation:transportation,
				SendToAppoval:SendToAppoval,
				supervised_by:supervised_by,
				post_date:post_date
					//status:status
				},
				url: "<?php echo base_url(); ?>shopping_cart/checkout",
				success: function (response) {
					alert('Checkout successful!');
					// Optionally, you can redirect to a thank you page or do other actions
					//window.location.href = "<?php echo base_url(); ?>thank_you_page";
				},
				error: function (error) {
					alert('Checkout failed. Please try again.');
				}
			});
		});
    });

</script>
