@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section xs-banner-inner-section2 parallax-window" style="background-image:url('{{asset('frontend/assets/images/gallery_bg.jpg')}}'); padding-bottom: 140px; padding-top: 100px;">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Checkout</h2>
		</div>
	</div>
</section>
<!--breadcumb end here-->
<!-- End welcome section -->

<main class="xs-main">
	<!-- contact section -->
	<section class="xs-contact-section-v2 xs-contact-section-v3">
	<div class="container">
		<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="xs-contact-form-wraper login-form-div">
						<h4>Plan Selected : 3 Months Plan</h4>
						<h6 style="text-decoration:underline;color:#fff">Plan Detail</h6>
						<ol class="text-white about-ol-list" style="padding-left:10px">
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</li>
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et dolore magna aliqua</li>
							<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor labore et dolore magna aliqua</li>
						</ol>
						<a href="http://localhost/heritage/public/contact" class="btn btn-outline-primary">Pay Now</a>
					</div><!-- .xs-contact-form-wraper END -->
				</div>
			</div><!-- .row end -->
	</div><!-- .container end -->
	<!-- contact details section -->
</section>	<!-- End contact section -->
</main>
@endsection