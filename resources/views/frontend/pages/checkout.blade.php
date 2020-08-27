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
					@if (Session::has('message'))
					<div class="alert alert-success" >{{ Session::get('message') }}</div>
					@endif
					@if (Session::has('error'))
						<div class="alert alert-danger">{{ Session::get('error') }}</div>
					@endif
					{{ Form::open(['method' => 'post','route'=>'paynow']) }}
						<div class="xs-contact-form-wraper login-form-div">
							<h4>Plan Selected : {{$plan->name}}</h4>
							<input type="hidden" name="plan_id" value="{{$plan->id}}">
							<h6 style="text-decoration:underline;color:#fff">Plan Detail</h6>
							<div class="text-white about-ol-list" style="padding-left:10px">
								@php
									$tmp_arr1= explode("\n\n",$plan->rule);
									$final_arr=array();
									foreach($tmp_arr1 as $section){
										$final_arr[]= explode("\n",$section);
									}
									$html="";
									foreach($final_arr as $section){
										$html.="<ol><li>";
										$html.=implode("</li><li>",$section);
										$html.="</li></ol>";
									}
									echo $html;
								@endphp
							</div>
							<button type="submit" class="btn btn-outline-primary">Pay Now</button>
						</div><!-- .xs-contact-form-wraper END -->
					</form>
				</div>
			</div><!-- .row end -->
	</div><!-- .container end -->
	<!-- contact details section -->
</section>	<!-- End contact section -->
</main>
@endsection