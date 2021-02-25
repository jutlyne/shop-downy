@extends('template.shoes.master-slidebar')
@section('main-content')
<!-- /girds_bottom-->
@foreach($item as $items)
	<div class="grids_bottom">
		<div class="style-grids">
			<div class="col-md-6 style-grid style-grid-1">
				<img src="{{$items->picture}}" alt="shoe">
			</div>
		</div>
		<div class="col-md-6 style-grid style-grid-2">
			<div class="style-image-1_info">
				<div class="style-grid-2-text_info">
					<h3>{{$items->name_type_product}}</h3>
					<p>{!!__('messenges.'.$items->des_type)!!}</p>
					<div class="shop-button">
						<a href="{{ route('shoes.cat.cat', $items->id_type_product) }}">{{__('shop')}}</a>
					</div>
				</div>
			</div>
			<div class="style-image-2">
				<img src="{{$items->picture_2}}" alt="shoe">
				<div class="style-grid-2-text">
					<h3>{{__('Air')}}</h3>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div style="height: 10px;"></div>
	<!-- //grids_bottom-->
	<!-- /girds_bottom2-->
	<!-- <div class="grids_sec_2">
		<div class="style-grids_main">
			<div class="col-md-6 grids_sec_2_left">
				<div class="grid_sec_info">
					<div class="style-grid-2-text_info">
						<h3>Sneakers</h3>
						<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur.sed quia non numquam eius modi
							tempora incidunt ut labore .</p>
						<div class="shop-button">
							<a href="{{ route('shoes.shop.cat') }}">Shop Now</a>
						</div>
					</div>
				</div>
				<div class="style-image-2">
					<img src="{{asset('shoes/images/b4.jpg')}}" alt="shoe">
					<div class="style-grid-2-text">
						<h3>Air force</h3>
					</div>
				</div>
			</div>
			<div class="col-md-6 grids_sec_2_left">
				<div class="style-image-2">
					<img src="{{asset('shoes/images/b3.jpg')}}" alt="shoe">
					<div class="style-grid-2-text">
						<h3>Air force</h3>
					</div>
				</div>
				<div class="grid_sec_info last">
					<div class="style-grid-2-text_info">
						<h3>Sneakers</h3>
						<p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur.sed quia non numquam eius modi
							tempora incidunt ut labore .</p>
						<div class="shop-button two">
							<a href="{{ route('shoes.shop.cat') }}">Shop Now</a>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div> -->
@endforeach
	<!-- //grids_bottom2-->
@stop
