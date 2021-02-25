@extends('template.shoes.master')
@section('main-content')
<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Pay<span>ment</span></h3>
				<!--/tabs-->
				<div class="responsive_tabs">
					<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Paypal Account</li>
						</ul>
						<div class="resp-tabs-container">
							<!--/tab_one-->
							<!--//tab_one-->
							<div class="tab4">
								<div class="pay_info">
									<div class="col-md-12 tab-grid" style="text-align: center">
										<img class="pp-img" src="{{asset('shoes/images/paypal.png')}}" alt="Image Alternative text" title="Image Title">
										<p>Important: You will be redirected to PayPal's website to securely complete your payment.</p><a class="btn btn-primary"><div id="paypal-button-container"></div></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--//tabs-->
			</div>

		</div>
		<!-- //payment -->

		<div class="clearfix"></div>
	</div>
	<!-- //top products -->
	<!-- Include the PayPal JavaScript SDK -->
	<script src="https://www.paypal.com/sdk/js?client-id=Aa8ZMQ959kPBV_aazpg1LLjyZIyrkFHLvIfF7st-a2ok0Q2YRmbpSXn3mlSA2fFRJbWuWYo_KdIUeNEX"></script>

	<script>
			// Render the PayPal button into #paypal-button-container
			paypal.Buttons({

					// Set up the transaction
					createOrder: function(data, actions) {
							return actions.order.create({
									purchase_units: [{
											amount: {
													value: '1000'
											}
									}]
							});
					},

					// Finalize the transaction
					onApprove: function(data, actions) {
							return actions.order.capture().then(function(details) {
									// Show a success message to the buyer
									alert('Transaction completed by ' + details.payer.name.given_name + '!');
							});
					}


			}).render('#paypal-button-container');


			///form ajax
				function() {
					var data = $('.form-order-js').serializeArray(); // convert form to array
					data.push({name: "carts", value: localStorage.getItem('product')});
					$.ajax({
						url: "/check/cart/submit",
						type: 'post',
						cache: false,
						data: data,//trong data name:value1,name2:value2
						success: function(data){
							if (data.success) {
								alert('Dat hang thanh cong');
								localStorage.removeItem('product');
								window.location.reload();
							}else{
								alert('Error');
							}
						}
					});
				};
	</script>

@stop
