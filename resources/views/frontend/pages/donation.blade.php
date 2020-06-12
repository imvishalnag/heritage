@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/donate.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Donation</h2>
			<p>Give a helping hand for poor people</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{route('frontend.home')}}" class="color-white"> Home /</a> Details</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here-->
<!-- End welcome section -->

<main class="xs-main">
	<!-- blog single post -->
	<div class="xs-content-section-padding xs-blog-single">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<!-- sidebar content -->
					<div class="sidebar sidebar-right">
						<div class="widget widget_categories xs-sidebar-widget">
							<h3 class="widget-title2">Donations and Contributions</h3>
							<ul class="xs-side-bar-list">
								<p class="text-center">The Heritage Foundation provides opportunities for the public to cooperate with the organizations in carrying out various types of work for serving humanity. This cooperation may consist in active participation in the publication activities of the Foundation, or in the contribution to the Funds of the Foundation. Admirers and Readers, who are in sympathy with the objects of the Foundation, are cordially invited to help us by contributing to the Funds, which need their active support</p>
								<p class="text-center"><b>Contact Address</b></p>
							</ul>
							<div class="row text-center">
								<div class="col-md-6">
								<b>Heritage Foundation</b><br>
								K.B. Road, Paltan Bazar, Guwahati – 781008 (Assam)<br>
								Email : ourheritage123@gmail.com<br>
								Phone No. 0361-2636365
							</div>
							<div class="col-md-6">
								<b>Bank account details</b><br>
								Bank Name : Punjab National Bank<br>
								Account No. : 3213 0001 0009 3631<br>
								IFSC No. : PUNB 0321300
							</div>
							</div>
							<p class="pt-2 text-warning">Donations can be deposited in above account and donator should send information by email on our email id.</p>
						</div><!-- widget archives closed -->
					</div><!-- End sidebar content -->
				</div>
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div>	<!-- End blog single post -->
</main>
@endsection