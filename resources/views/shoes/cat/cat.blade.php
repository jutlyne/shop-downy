@extends('template.shoes.master')
@section('main-content')
<!-- top Products -->
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<!-- tittle heading -->

			<!-- //tittle heading -->
			<!-- product left -->
			<div class="side-bar col-md-3">
				<div class="search-hotel">
					<h3 class="agileits-sear-head">Search Here..</h3>
					<form action="#" method="post">
						<input type="search" placeholder="Product name..." id="search" name="search" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				<!-- price range -->
				<!-- <div class="range">
					<h3 class="agileits-sear-head">Price range</h3>
					<ul class="dropdown-menu6">
						<li>

							<div id="slider-range"></div>
							<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						</li>
					</ul>
				</div> -->
				<!-- //price range -->
				<!--preference -->
				<div class="deal-leftmk left-side">
					<h3 class="agileits-sear-head">Special Deals</h3>
					<div class="special-sec1">
						<div class="col-xs-4 img-deals">
							<img src="{{asset('shoes/images/s4.jpg')}}" alt="">
						</div>
						<div class="col-xs-8 img-deal1">
							<h3>Shuberry Heels</h3>
							<a href="{{ route('shoes.shop.detail', 12) }}">$180.00</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="special-sec1">
						<div class="col-xs-4 img-deals">
							<img src="{{asset('shoes/images/s2.jpg')}}" alt="">
						</div>
						<div class="col-xs-8 img-deal1">
							<h3>Chikku Loafers</h3>
							<a href="{{ route('shoes.shop.detail', 12) }}">$99.00</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="special-sec1">
						<div class="col-xs-4 img-deals">
							<img src="{{asset('shoes/images/s1.jpg')}}" alt="">
						</div>
						<div class="col-xs-8 img-deal1">
							<h3>Bella Toes</h3>
							<a href="{{ route('shoes.shop.detail', 12) }}">$165.00</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="special-sec1">
						<div class="col-xs-4 img-deals">
							<img src="{{asset('shoes/images/s5.jpg')}}" alt="">
						</div>
						<div class="col-xs-8 img-deal1">
							<h3>Red Bellies</h3>
							<a href="{{ route('shoes.shop.detail', 12) }}">$225.00</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="special-sec1">
						<div class="col-xs-4 img-deals">
							<img src="{{asset('shoes/images/s3.jpg')}}" alt="">
						</div>
						<div class="col-xs-8 img-deal1">
							<h3>(SRV) Sneakers</h3>
							<a href="{{ route('shoes.shop.detail', 12) }}">$169.00</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- //product left -->
			<!-- product right -->
			<div class="left-ads-display col-md-9">
				<div class="wrapper_top_shop">
					<div class="col-md-6 shop_left">
						<img src="images/banner3.jpg" alt="">
						<h6>40% off</h6>
					</div>
					<div class="col-md-6 shop_right">
						<img src="images/banner2.jpg" alt="">
						<h6>50% off</h6>
					</div>
					<div class="clearfix"></div>
					<!-- product-sec1 -->
					<div class="product-sec1" id="catproduct">
						<!--mens-->
            @foreach($product as $products)
             @php
              $discount = $products->discount;
              $price = $products->price_product;
              $total = $price - ($price * $discount/100);
							$urlpic = $products->picture_product;
							$urlP = 'http://localhost/shop/storage/app/'.$urlpic;
             @endphp
						<div class="col-md-4 product-men">
							<div class="product-shoe-info shoe" style="height: 500px">
								<div class="men-pro-item">
									<div class="men-thumb-item">
										<img src="{{$urlP}}" alt="" height="350px">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ route('shoes.shop.detail', $products->id_product) }}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
									</div>
									<div class="item-info-product">
										<h4>
											<a href="{{ route('shoes.shop.detail', 12) }}">{{$products->name_product}}</a>
										</h4>
										<div class="info-product-price">
											<div class="grid_meta">
												<div class="product_price">
													<div class="grid-price ">
														<span class="money ">${{$total}}.00</span>
													</div>
												</div>
												<ul class="stars">
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
													<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
												</ul>
											</div>
											<div class="shoe single-item hvr-outline-out">
												<form action="#" method="post">
													<input type="hidden" name="cmd" value="_cart">
													<input type="hidden" name="add" value="1">
													<input type="hidden" name="shoe_item" value="Bella Toes">
													<input type="hidden" name="amount" value="675.00">
													<button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>

													<a href="#" data-toggle="modal" data-target="#myModal1"></a>
												</form>

											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
            @endforeach
						<!-- //mens -->
						<div class="clearfix"></div>

					</div>

					<!-- //product-sec1 -->
					<div class="col-md-6 shop_left shp">
						<img src="{{asset('shoes/images/banner4.jpg')}}" alt="">
						<h6>21% off</h6>
					</div>
					<div class="col-md-6 shop_right shp">
						<img src="{{asset('shoes/images/banner1.jpg')}}" alt="">
						<h6>31% off</h6>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- //top products -->
	<script type="text/javascript">
	$(document).ready(function(){
	  $("#search").keyup(function(){
	    key = $(this).val();
	    $.ajax({
	      url: "/search/"+key,
	      type: 'get',
	      cache: false,
	      data: {
	        'key': key
	      },
	      success: function(data){
	        document.getElementById('catproduct').innerHTML = data.output;
	        //$('.product').html(data.output);
	      }
	    });
	  })
	})
	</script>
@stop
