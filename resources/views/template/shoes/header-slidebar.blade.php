<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Downy Shoes an Ecommerce Category Bootstrap Responsive Website Template | Home :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Downy Shoes Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //custom-theme -->
	<link href="{{asset('shoes/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{asset('shoes/css/shop.css')}}" type="text/css" media="screen" property="" />
	<link href="{{asset('shoes/css/style7.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{asset('shoes/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="{{asset('shoes/css/font-awesome.css')}}" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
	<!-- banner -->
	<div class="banner_top innerpage" id="home">
		<div class="wrapper_top_w3layouts">

			<div class="header_agileits">
				<div class="logo">
					<h1>
						<a class="navbar-brand" href=""><span>Downy</span> <i>Shoes</i></a>
						<a href="{{route('language.index',['vi'])}}" style="margin-left:7px; text-align: center" class="navbar-brand">VI</a>
						<a href="{{route('language.index',['en'])}}" style="margin-left:7px; text-align: center" class="navbar-brand">EN</a>
					</h1>
				</div>
				<div class="overlay overlay-contentpush">
					<button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

					<nav>
						<ul>
							<li><a href="{{ route('shoes.index.index') }}" class="active">Home</a></li>
							<li><a href="{{ route('shoes.shop.about') }}">About</a></li>
							<li><a href="{{ route('shoes.shop.cat') }}">Shop Now</a></li>
							<li><a href="{{ route('shoes.contact.contact') }}">Contact</a></li>
							@if(isset($isAdmin))
								@if($isAdmin == true)
								<li><a href="{{ route('admin.index.index') }}">Dashboard</a></li>
								@else
								<li><a href="{{ route('admin.index.index') }}">Dashboard</a></li>
								@endif
							@else
							<li><a href="{{ route('admin.index.index') }}">Login</a></li>
							@endif
						</ul>
					</nav>
				</div>
				<div class="mobile-nav-button">
					<button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
				<!-- cart details -->
				<div class="top_nav_right">
					<div class="shoecart shoecart2 cart cart box_1">
							<button class="top_shoe_cart" type="submit" name="submit" value=""><a href="{{route('shoes.check.index')}}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></button>
					</div>

				</div>
				<!-- //cart details -->
				<!-- search -->
				<!-- //search -->
				<div class="clearfix"></div>
			</div>
      <!-- /slider -->
      <div class="slider">
      	<div class="callbacks_container">
      		<ul class="rslides callbacks callbacks1" id="slider4">

      			<li>
      				<div class="banner-top2">
      					<div class="banner-info-wthree">
      						<h3>Nike</h3>
      						<p>See how good they feel.</p>

      					</div>

      				</div>
      			</li>
      			<li>
      				<div class="banner-top3">
      					<div class="banner-info-wthree">
      						<h3>Heels</h3>
      						<p>For All Walks of Life.</p>

      					</div>

      				</div>
      			</li>
      			<li>
      				<div class="banner-top">
      					<div class="banner-info-wthree">
      						<h3>Sneakers</h3>
      						<p>See how good they feel.</p>

      					</div>

      				</div>
      			</li>
      			<li>
      				<div class="banner-top1">
      					<div class="banner-info-wthree">
      						<h3>Adidas</h3>
      						<p>For All Walks of Life.</p>

      					</div>

      				</div>
      			</li>
      		</ul>
      	</div>
      	<div class="clearfix"> </div>
      </div>
      <!-- //slider -->

			<ul class="top_icons">
				<li><a href="#"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
				<li><a href="#"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>

			</ul>
		</div>
	</div>
	<!-- //banner -->
