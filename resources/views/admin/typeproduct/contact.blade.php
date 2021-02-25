@extends('template.shoes.master')
@section('main-content')
<!-- top Products -->
@if(Session::has('msg'))
<script type="text/javascript">
alert('{{Session::get('msg')}}')
</script>
@endif
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Contact Us</h3>
			<p class="head_para">Add Some Description</p>
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<h6>Please fill this form to contact with us.</h6>
					<form action="{{route('shoes.contact.contact')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="name" placeholder="Name" required="" value="KY">
							<input type="email" name="email" placeholder="Email" required="" value="KY@gmail.com">
						</div>
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="telephone" placeholder="Telephone" required="" value="KY">
							<input type="text" name="subject" placeholder="Subject" required="" value="KY">
						</div>
						<div class="clearfix"> </div>
						<textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Submit">
						<input type="reset" value="Clear">
					</form>
				</div>
				<div class="col-md-5 contact-left">
					<h6>Contact Info</h6>
					<div class="visit">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-home" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Visit us</h4>
							<p>41 Le Thi Tinh, Thanh Khe, Da Nang</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="mail-us">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Mail us</h4>
							<p><a href="mailto:vocaoky290999@gmail.com">vocaoky290999@gmail.com</a></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="call">
						<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
							<span class="fa fa-phone" aria-hidden="true"></span>
						</div>
						<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
							<h4>Call us</h4>
							<p>+84962199575</p>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
				<div class="clearfix"> </div>

			</div>

			<div class="clearfix"></div>

		</div>
	</div>
	<div class="contact-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.077782311941!2d108.178968414643!3d16.061452988885716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219048637fd13%3A0xe0e45e275fc64574!2zNDEgTMOqIFRo4buLIFTDrW5oLCBIw7JhIEtow6osIFRoYW5oIEtow6osIMSQw6AgTuG6tW5nIDU1MDAwMCwgVmlldG5hbQ!5e0!3m2!1sen!2sin!4v1605795553671!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</div>

@stop
