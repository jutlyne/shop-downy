@extends('template.shoes.master')
@section('main-content')

<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>User<span>Profile</span></h3>
				<div class="checkout-right">
					<h4>Your purchase history: </h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th style="width: 30%">Product</th>
								<th>Quality</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody id="cart">
              


						</tbody>
					</table>
				</div>
				<div class="checkout-left">
					<!-- <div class="col-md-4 checkout-left-basket">
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
						<form onSubmit="return false;" action="" method="post" class="form-order-js creditly-card-form agileinfo_form">
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
									<div id="paypal-button-container"></div>
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
@stop
