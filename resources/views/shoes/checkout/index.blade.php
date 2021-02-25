@extends('template.shoes.master')
@section('main-content')

<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Check<span>out</span></h3>
				<div class="checkout-right">
					<h4>Your shopping cart contains: </h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th style="width: 30%">Product</th>
								<th>Quality</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody id="cart">



						</tbody>
					</table>
				</div>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<h4>Continue to basket</h4>
						<ul>
							<div id="price">

							</div>
							<div>
								<li>Total <i>-</i><span id="tongtien"></span></li>
							</div>
						</ul>
					</div>
					<div class="col-md-8 address_form">
						<h4>Add a new Details</h4>
						<form onSubmit="return false;" action="{{ route('shoes.check.payment')}}" method="post" class="form-order-js creditly-card-form agileinfo_form">
							@csrf
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div id="idsanpham">

									</div>
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Full name: </label>
											<input   class="billing-address-name form-control" type="text" required name="fullname" placeholder="Full name">
										</div>
										<div class="card_number_grids">
											<div class="card_number_grid_left">
												<div class="controls">
													<label class="control-label">Mobile number:</label>
													<input    class="form-control" type="text" name="phone" required placeholder="Mobile number">
												</div>
											</div>
											<div class="card_number_grids">
												<div class="card_number_grid_left">
													<div class="controls">
														<label class="control-label">Email:</label>
														<input    class="form-control" type="text" name="email" required placeholder="Your Email">
													</div>
												</div>
											<div class="card_number_grid_right">
												<div class="controls">
													<label class="control-label">Landmark: </label>
													<input   class="form-control" name="land" type="text" required placeholder="Landmark">
												</div>
											</div>
											<div class="clear"> </div>
										</div>
										<div class="controls">
											<label class="control-label">Town/City: </label>
											<input    class="form-control" type="text" name="city" required placeholder="Town/City">
										</div>
										<div class="controls">
											<label class="control-label">Address type: </label>
											<select class="form-control option-w3ls" name="adtype">
													<option value="office">Office</option>
													<option value="home">Home</option>
													<option value="commercial">Commercial</option>
											</select>
										</div>
									</div>
									<div id="paypal-button-container" style="width: 100%"></div>
									<!-- <button class="submit check_out">Delivery to this Address</button> -->
								</div>
							</section>
						</form>
            <div class="checkout-right-basket">
						</div>
					</div>

					<div class="clearfix"> </div>

					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<input type="text" hidden id="sum" name="" value="">
		<script src="https://www.paypal.com/sdk/js?client-id=Aa8ZMQ959kPBV_aazpg1LLjyZIyrkFHLvIfF7st-a2ok0Q2YRmbpSXn3mlSA2fFRJbWuWYo_KdIUeNEX"></script>
		<!-- //top products -->
		<script type="text/javascript">
			getProduct();
				// $(function() {
				//
				// 	$('.form-order-js').submit(function() {
				// 		var data = $(this).serializeArray(); // convert form to array
				// 		data.push({name: "carts", value: localStorage.getItem('product')});
				//
				// 		$.ajax({
				//       url: "/check/cart/submit",
				//       type: 'post',
				//       cache: false,
				//       data: data,//trong data name:value1,name2:value2
				//       success: function(data){
				// 				if (data.success) {
				// 					alert('Dat hang thanh cong');
				// 					localStorage.removeItem('product');
				// 					window.location.reload();
				// 				}else{
				// 					alert('Error');
				// 				}
				//       }
				//     });
				// 	});
				// });
			function coverprice(json, soluong){
				var html = '<li>'+ json.name_product +' <i>-</i> '+ soluong +' <i>-</i> <span>$'+ (json.price_product * soluong) +'.00 </span></li>';
		 		return html;
			}
			function covers(json, soluong, index){
				var html =  '   <tr class="rem1">  '  +
		 '   								<td class="invert-image"><a href="single.html"><img src="http://localhost/shop/storage/app/'+ json.picture_product +'" alt=" " class="img-responsive"></a></td>  '  +
		 '   								<td class="invert">  '  +
		 '   									<div class="quantity" bis_skin_checked="1">  '  +
		 '   										<div class="quantity-select" bis_skin_checked="1">  '  +
		 '   											<div class="entry value" bis_skin_checked="1"><span>'+ soluong +'</span></div>  '  +
		 '   										</div>  '  +
		 '   									</div>  '  +
		 '   								</td>  '  +
		 '   								<td class="invert">' + json.name_product + '</td>  '  +
		 '     '  +
		 '   								<td class="invert">$'+ json.price_product +'.00</td>  '  +
		 '   								<td class="invert">  '  +
		 '   									<div class="rem" bis_skin_checked="1">  '  +
		 '   										<a href="javascript:void(0)" class="close1" onclick ="removeItem('+ index +')" bis_skin_checked="1"> </a>  '  +
		 '   									</div>  '  +
		 '     '  +
		 '   								</td>  '  +
		 '  							</tr>  ';
		 		 return html;
			}
			function getItemtoLocal(){
				var itemproduct = new Array();
				var itemp = localStorage.getItem('product');
				if(itemp != null)
				 itemproduct = JSON.parse(itemp);
				return itemproduct;
			}
			function getProduct(){
				var product = [];
				var soluong = [];
				var listsp = getItemInLocal();
				for(var i = 0; i < listsp.length; i++){
					product.push(listsp[i].id);
					soluong.push(listsp[i].soluong);
				}
				loadsp(product, soluong);
			}
			function getItemInLocal(){
				//1. load JSON
				var jsonItem = localStorage.getItem('product');
				//2. chuyen json thanh doi tuong obj
				var listsp = JSON.parse(jsonItem);
				return listsp
			}
			$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			function loadsp(id, soluong){
			      $.ajax({
			      url: "/check/cart",
			      type: 'post',
			      cache: false,
			      data: {
							"_token": "{{ csrf_token() }}",
							'ids':id,
							'soluong': soluong
						},//trong data name:value1,name2:value2
			      success: function(data){
							var sum = 0;
							var i = 0;
							data.forEach(function(value, index){
								html = covers(value, soluong[i], index);
								htmlprice = coverprice(value, soluong[i]);
								sum = sum + (value.price_product * soluong[i]);
								tongtien = '$' +sum+ '.00';
								document.querySelector('#price').innerHTML += htmlprice;
								document.querySelector('#tongtien').innerHTML = tongtien;
								document.querySelector('#cart').innerHTML += html;
								document.querySelector('#sum').value = sum;
								i++;
							});

			      },
			      error: function (){
							console.log(id);
			      }
			    });
			    return false;
			}
			function removeItem(id){
				var listsp = getItemInLocal();
				listsp.splice(id, 1);
				localStorage.setItem('product', JSON.stringify(listsp));
				document.querySelector('#price').innerHTML = '';
				document.querySelector('#tongtien').innerHTML = '';
				document.querySelector('#cart').innerHTML = '';
				getProduct();
			}
			// Render the PayPal button into #paypal-button-container
			paypal.Buttons({
				// var total = document.getElementById("sum").value;
					// Set up the transaction
					createOrder: function(data, actions) {
						var total = document.getElementById("sum").value;
							return actions.order.create({
									purchase_units: [{
											amount: {
													value: total
											}
									}]
							});
					},

					// Finalize the transaction
					onApprove: function(data, actions) {
							return actions.order.capture().then(function(details) {
									// Show a success message to the buyer
									alertify.success('Transaction completed by ' + details.payer.name.given_name + '!');

									$(function() {

											var data = $('.form-order-js').serializeArray(); // convert form to array
											data.push({name: "carts", value: localStorage.getItem('product')});

											$.ajax({
									      url: "/check/cart/submit",
									      type: 'post',
									      cache: false,
									      data: data,//trong data name:value1,name2:value2
									      success: function(data){
													if (data.success) {
														localStorage.removeItem('product');
														window.location.reload();
													}else{
														alert('Error');
													}
									      }
										});
									});
							});
					}


			}).render('#paypal-button-container');
		</script>
@stop
