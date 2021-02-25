@extends('template.shoes.master')
@section('main-content')
<!-- top Products -->

	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">

						<ul class="slides">
							@foreach($picture as $pic)
								@php
									$url = $pic->url_picture;
									$urlp = 'http://localhost/shop/storage/app/'.$url;
								@endphp
							<li data-thumb="{{$urlp}}">
								<div class="thumb-image"> <img src="{{$urlp}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							@endforeach
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3>{{$product->name_product}}</h3>
				@php
					$discount = $product->discount;
					$price = $product->price_product;
					$total = $price - ($price * $discount/100);
				@endphp
				<p><span class="item_price">${{$total}}</span>
					@if($product->discount != 0)
					<del>${{$product->price_product}}</del>
					@endif
				</p>
				<div class="rating1">

					<ul class="stars" id="stars">
						@foreach($star as $stars)
							@php
							 $vote = $stars->number_vote;
							 $total = $stars->total_vote;
							 $sum = 0;
							@endphp
								@if($total != 0)
									@php
								 		$sum = $vote/$total;
								 	@endphp
								 	<input type="text" id="sum" name="sumvote" value="{{$sum}}" hidden>
									<li><a href="#"><i id="star-0" class="star fa fa-star-o" aria-hidden="true"></i></a></li>
									<li><a href="#"><i id="star-1" class="star fa fa-star-o" aria-hidden="true"></i></a></li>
									<li><a href="#"><i id="star-2" class="star fa fa-star-o" aria-hidden="true"></i></a></li>
									<li><a href="#"><i id="star-3" class="star fa fa-star-o" aria-hidden="true"></i></a></li>
									<li><a href="#"><i id="star-4" class="star fa fa-star-o" aria-hidden="true"></i></a></li>
							 	@else
								 <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								 <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								 <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								 <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
								 <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
							 @endif
						@endforeach
					</ul>
				</div>
				<div class="color-quality">
					<div class="color-quality-right">
						<h5>Quality :</h5>
						@foreach($star as $stars)
						@php
						 $vote = $stars->number_vote;
						 $total = $stars->total_vote;
						@endphp
						@endforeach
						<select id="country1" name="star" onchange="getStar(this, {{$product->id_product}}, {{$vote}}, {{$total}})" class="frm-field required sect">
								<option value="1">1 Star</option>
								<option value="2">2 Star</option>
								<option value="3">3 Star</option>
								<option value="4">4 Star</option>
                <option value="5">5 Star</option>
						</select>
					</div>
				</div>
				<div class="occasional">
					<div class="clearfix"> </div>
				</div>
					<div class="shoe single-item single_page_b">
						<form id="cart" action="" method="get">
							<a href="#"></a>
							<a href="javascript:void(0)" type="submit" onclick="addItem({{$product->id_product}})" name="submit" value="Add to cart" class="button add">Add to cart</a>
						</form>
					</div>
			</div>
			<div class="clearfix"> </div>
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Description</li>
						<li>Reviews</li>
						<li>Information</li>
					</ul>
					<div class="resp-tabs-container">
						<!--/tab_one-->
						<div class="tab1">

							<div class="single_page">
								<h6>Lorem ipsum dolor sit amet</h6>
								<p>{!!$product->des_product!!}</p>
							</div>
						</div>
						<!--//tab_one-->
						<div class="tab2">

							<div class="single_page">
								<div class="bootstrap-tab-text-grids">
									<div id="cmt">
									@foreach($comment as $cmt)
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="">{{$cmt->name}}</a></li>
											</ul>
											<p>{!!$cmt->review!!}</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									@endforeach
									</div>
									<div class="add-review">
										<h4>add a review</h4>
										<form id="commentForm" action="" method="post">
											<input type="text" name="id" value="{{$id}}" hidden>
											<input type="text" name="name" id="name" placeholder="Input your name....." required="Name">
											<input type="email" name="email" placeholder="Input your email....." required="Email">
											<textarea name="message" id="review" required=""></textarea>
											<input type="submit" value="SEND">
										</form>
									</div>
								</div>

							</div>
						</div>
						<div class="tab3">

							<div class="single_page">
								<h6>{{$product->name_product}}</h6>
								<p class="para">{!!$product->info_product!!}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--//tabs-->
			<!-- /new_arrivals -->
			<div class="new_arrivals">
				<h3>Featured Products</h3>
				<!-- /womens -->
				@foreach($feature as $features)
					@php
						$dis = $features->discount;
						$pri = $features->price_product;
						$totalf = $pri - ($pri * $dis/100);
						$pic = 'http://localhost/shop/storage/app/'.$features->picture_product;
					@endphp
				<div class="col-md-3 product-men women_two">
					<div class="product-shoe-info shoe" style="height: 500px">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="{{$pic}}" height="350px" alt="">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="{{ route('shoes.shop.detail', $features->id_product) }}" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product">
								<h4>
									<a href="{{ route('shoes.shop.detail', $features->id_product) }}">{{$features->name_product}}</a>
								</h4>
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<div class="grid-price ">
												<span class="money ">${{$totalf}}.00</span>
											</div>
										</div>
									</div>
									<div class="shoe single-item hvr-outline-out">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="shoe_item" value="{{$features->name_product}}">
											<input type="hidden" name="amount" value="{{$totalf}}">
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
				<!-- //womens -->
				<div class="clearfix"></div>
			</div>
			<!--//new_arrivals-->


		</div>
	</div>
	<!-- //top products -->
<style media="screen">
  html {
  scroll-behavior: smooth;
  }
	.disable{
		display: none;
	}
</style>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
			var submit = $("input[type='submit']");

			// bắt sự kiện click vào nút Login
			submit.click(function()
			{
					// var username = $("input[name='username']").val();
					// var password = $("input[name='password']").val();
					// Lấy tất cả dữ liệu trong form login
					var data = $('form#commentForm').serialize();
					// Sử dụng $.ajax()
					$.ajax({
					type : 'POST', //kiểu post
					url  : '{{route("shoes.detail.post-comment")}}', //gửi dữ liệu sang trang submit.php
					data : data,
					success :  function(res)
								 {

											if (res.success) {

												$("#cmt").append(`
													<div class="bootstrap-tab-text-grid">
														<div class="bootstrap-tab-text-grid-right">
															<ul>
																<li><a href="">`+ $('#name').val() +`</a></li>
															</ul>
															<p>`+ $('#review').val() +`</p>
														</div>
														<div class="clearfix"> </div>
													</div>
												`);
												document.getElementById("commentForm").reset();
											} // check co thanh congh hay ko

								 }
					});
					return false;
			});
	});
	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	});
	function getStar(object, id, vote, total){
		var st = object.value;
	      $.ajax({
	      url: "/star/"+id,
	      type: 'get',
	      cache: false,
	      data: {id:id, st:st, total:total, vote:vote},//trong data name:value1,name2:value2
	      success: function(data){
	        alertify.success('Success');
					object.classList.add('disable');
	      },
	      error: function (){
	        alert('Có lỗi xảy ra');
	      }
	    });
	    return false;
	}
	$(document).ready(function(){
		var sumvote = document.getElementById('sum').value;
		for(i = 0; i < sumvote; i++){
			var vote = document.getElementById('star-'+ i);
			vote.classList.add('fa-star');
			vote.classList.remove('fa-star-o');
		}
	})
		function item(id, soluong){
			var item = new Object();
			item.id = id;
			item.soluong = soluong;
			return item;
		}
		function getItem(){
			var itemproduct = new Array();
			var itemp = localStorage.getItem('product');
			if(itemp != null)
			 itemproduct = JSON.parse(itemp);
			return itemproduct;
		}
		function saveLocal(listproduct){
			localStorage.setItem(`product`, JSON.stringify(listproduct))
		}
		function addItem(id){
			alertify.success('Success');
			var listproduct = getItem();
			var checkisset = false;
			for(var i = 0; i < listproduct.length; i++){
				var itemgh = listproduct[i];
				if(itemgh.id == id){
					listproduct[i].soluong++;
					checkisset = true;
				}
			}
			if(checkisset == false){
				var itemgiohang = item(id, 1);
				listproduct.push(itemgiohang);
			}
			saveLocal(listproduct);
		}
	// }
</script>

@stop
