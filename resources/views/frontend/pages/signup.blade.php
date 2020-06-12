@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section xs-banner-inner-section2 parallax-window" style="background-image:url('{{asset('frontend/assets/images/gallery_bg.jpg')}}'); padding-bottom: 140px; padding-top: 100px;">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Sign Up</h2>
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
				<div class="col-lg-4 offset-lg-4">
					<div class="xs-contact-form-wraper login-form-div">
						<form action="#" method="POST" id="xs-contact-form" class="signup-form xs-contact-form contact-form-v2">
							<div class="input-group">
								<input type="text" name="username" id="xs-name" class="form-control" placeholder="Enter a Username.....">
							</div><!-- .input-group END -->
							<div class="input-group">
								<input type="text" name="name" id="xs-name" class="form-control" placeholder="Enter Your Name.....">
							</div><!-- .input-group END -->
							<div class="input-group">
								<input type="email" name="name" id="xs-name" class="form-control" placeholder="Enter Your Email.....">
							</div><!-- .input-group END -->
							<div class="input-group">
								<input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Your Number.....">
							</div><!-- .input-group END -->
							<div class="input-group">
								<input type="password" name="email" id="xs-email" class="form-control" placeholder="Enter Password.....">
							</div><!-- .input-group END -->
							<button class="btn btn-success login-btn" type="submit" id="xs-submit">Login</button>
							<div class="text-center mt-4">
								<article class="text-light">Already a member ? <a class="signup-text" href="{{route('member.login')}}"> Sign In</a></article>
							</div>
						</form><!-- .xs-contact-form #xs-contact-form END -->
					</div><!-- .xs-contact-form-wraper END -->
				</div>
			</div><!-- .row end -->
	</div><!-- .container end -->
	<!-- contact details section -->
</section>	<!-- End contact section -->
</main>
@endsection