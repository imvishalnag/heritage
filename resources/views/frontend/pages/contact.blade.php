@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section contactus_breadcumb parallax-window" style="background-image:url('{{asset('frontend/assets/images/contact/bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Contact Us</h2>
			<p>Give a helping hand for poor people</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{route('frontend.home')}}" class="color-white"> Home /</a> Contact</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here--><!-- End welcome section -->

<main class="xs-main">
	<!-- contact section -->
	<section class="xs-contact-section-v2">
	<div class="container">
		<div class="xs-contact-container">
			<div class="row">
				<div class="col-lg-6">
					<div class="xs-contact-form-wraper">
						<h4>Drop us a line</h4>
						<form action="#" method="POST" id="xs-contact-form" class="xs-contact-form contact-form-v2">
							<div class="input-group">
								<input type="text" name="name" id="xs-name" class="form-control" placeholder="Enter Your Name.....">
								<div class="input-group-append">
									<div class="input-group-text"><i class="fa fa-user"></i></div>
								</div>
							</div><!-- .input-group END -->
							<div class="input-group">
								<input type="email" name="email" id="xs-email" class="form-control" placeholder="Enter Your Email.....">
								<div class="input-group-append">
									<div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
								</div>
							</div><!-- .input-group END -->
							<div class="input-group massage-group">
								<textarea name="massage" placeholder="Enter Your Message....." id="xs-massage" class="form-control" cols="30" rows="10"></textarea>
								<div class="input-group-append">
									<div class="input-group-text"><i class="fa fa-pencil"></i></div>
								</div>
							</div><!-- .input-group END -->
							<button class="btn btn-success" type="submit" id="xs-submit">submit</button>
						</form><!-- .xs-contact-form #xs-contact-form END -->
					</div><!-- .xs-contact-form-wraper END -->
				</div>
				<div class="col-lg-6">
					<div class="xs-maps-wraper map-wraper-v2">
						<div id="xs-map" class="xs-box-shadow-2">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3580.140350698536!2d91.75417431450506!3d26.19211229704473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a598a301ed1fd%3A0x4d9687a3ed90539!2sHeritage%20Foundation!5e0!3m2!1sen!2sin!4v1586873421606!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
					</div>
				</div>
			
			</div><!-- .row end -->
		</div><!-- .xs-contact-container END -->
	</div><!-- .container end -->
	<!-- contact details section -->
	<section class="xs-contact-details">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-4">
				<div class="xs-contact-details">
					<div class="xs-widnow-wraper">
						<div class="xs-window-top">
							<i class="fa fa-map-marker color-green"></i>
						</div>
					</div>
					<!-- xs-widnow-wraper -->
					<ul class="xs-unorder-list">
					    <li>Regd Office -</li>
					    <li><i class="fa fa-home color-green"></i>Heritage Foundation
K.B. Road, Paltan Bazar,
<br>Guwahati – 781008 (Assam)</li>
<li><i class="fa fa-phone color-green"></i><a href="tel:+91 0361-2636365">+91 0361-2636365</a></li>
<li><i class="fa fa-envelope-o color-green"></i><a href="mailto:ourheritage123@gmail.com">ourheritage123@gmail.com</a></li>
					</ul>
				</div>
				<!-- xs-contact-details -->
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="xs-contact-details">
					<div class="xs-widnow-wraper">
						<div class="xs-window-top">
							<i class="fa fa-map-marker color-green"></i>
						</div>
					</div>
					<!-- xs-widnow-wraper -->
					<ul class="xs-unorder-list">
					    <li>Office Address -</li>
						<li><i class="fa fa-home color-green"></i>Heritage Foundation, Bhuban Road,
Near GMC Office,<br>Ujan Bazar,
Guwahati - 781001</li>
<li><i class="fa fa-phone color-green"></i><a href="tel:+91 0361-2636365">+91 0361-2636365</a></li>
<li><i class="fa fa-envelope-o color-green"></i><a href="mailto:ourheritage123@gmail.com">ourheritage123@gmail.com</a></li>
					</ul>
				</div>
				<!-- xs-contact-details -->
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="xs-contact-details">
					<div class="xs-widnow-wraper">
						<div class="xs-window-top">
							<i class="fa fa-phone color-green"></i>
						</div>
					</div>
					<!-- xs-widnow-wraper -->
					<ul class="xs-unorder-list">
					    <li>Contact:-</li>
						<li><i class="fa fa-user color-green"></i>Shri P. Suryanarayana</li>
<li>Mob- <i class="fa fa-phone color-green"></i><a href="tel:+91 9435199796">+91 9435199796</a></li>
<li><i class="fa fa-user color-green"></i>Shri Mrinmoy Lahkar</li>
<li>Mob- <i class="fa fa-phone color-green"></i><a href="tel:+91 9085954402">+91 9085954402</a></li>
					</ul>
				</div>
				<!-- xs-contact-details -->
			</div>
		</div>
	</div>
</section>	<!-- End contact details section -->
</section>	<!-- End contact section -->
</main>
@endsection