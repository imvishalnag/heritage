@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/event/bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Membership</h2>
			<p>Select your membership plan</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{route('frontend.home')}}" class="color-white"> Home /</a> Details</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here-->
<!-- End welcome section -->

<section class="xs-section-padding membership">
	<div class="container">
			
		<div class="row mb-2">
			<div class="col-lg-4 col-md-6 col-xs-6">
				<div class="xs-box-shadow xs-single-journal xs-mb-30">
					<div class="entry-thumbnail ">
						<h4> 3 Months plan</h4>
						<div class="post-author">
							<span class="xs-round-avatar">
								<p>₹500</p>
							</span>
						</div>
					</div><!-- .xs-item-header END -->
					<span class="xs-separetor"></span>
					<div class="post-meta meta-style-color cust1">
						<p class="mb-0">Publishing useful literatures on indigenous traditions and spiritual Knowledge of different ethnic communities of this region.</p>
					</div><!-- .post-meta END -->
					<div class="post-meta meta-style-color cust1 text-center mt-0">
						<a href="{{route('checkout')}}" class="btn btn-secondary bg-bondiBlue">Select this plan</a>
					</div><!-- .post-meta END -->
				</div><!-- .xs-from-journal END -->
			</div>
			<div class="col-lg-4 col-md-6 col-xs-6">
				<div class="xs-box-shadow xs-single-journal xs-mb-30">
					<div class="entry-thumbnail ">
						<h4> 6 Months plan</h4>
						<div class="post-author">
							<span class="xs-round-avatar">
								<p>₹700</p>
							</span>
						</div>
					</div><!-- .xs-item-header END -->
					<span class="xs-separetor"></span>
					<div class="post-meta meta-style-color cust1">
						<p class="mb-0">Publishing useful literatures on indigenous traditions and spiritual Knowledge of different ethnic communities of this region.</p>
					</div><!-- .post-meta END -->
					<div class="post-meta meta-style-color cust1 text-center mt-0">
						<a href="{{route('checkout')}}" class="btn btn-secondary bg-bondiBlue">Select this plan</a>
					</div><!-- .post-meta END -->
				</div><!-- .xs-from-journal END -->
			</div>
			<div class="col-lg-4 col-md-6 col-xs-6">
				<div class="xs-box-shadow xs-single-journal xs-mb-30">
					<div class="entry-thumbnail ">
						<h4> 12 Months plan</h4>
						<div class="post-author">
							<span class="xs-round-avatar">
								<p>₹1000</p>
							</span>
						</div>
					</div><!-- .xs-item-header END -->
					<span class="xs-separetor"></span>
					<div class="post-meta meta-style-color cust1">
						<p class="mb-0">Publishing useful literatures on indigenous traditions and spiritual Knowledge of different ethnic communities of this region.</p>
					</div><!-- .post-meta END -->
					<div class="post-meta meta-style-color cust1 text-center mt-0">
						<a href="{{route('checkout')}}" class="btn btn-secondary bg-bondiBlue">Select this plan</a>
					</div><!-- .post-meta END -->
				</div><!-- .xs-from-journal END -->
			</div>
		</div><!-- .row end -->
		<div class="row pagination-center">
		</div>
	</div><!-- .container end -->
</section><!-- End journal section -->
@endsection