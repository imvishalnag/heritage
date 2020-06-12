@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url({{asset('frontend/assets/images/event/bg.jpg')}})">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Events Single</h2>
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
	<!-- portfolio section -->
	<div class="xs-content-section-padding">
	<div class="container container-remove-padding">
		@if(count($events) == 0)
			<li class="text-center"><span class="text-danger">Sorry! No data found.</span></li>
		@endif
		<div class="xs-portfolio-grid">
			@foreach($events as $event)
			<div class="xs-portfolio-grid-item">
				<a href="{{asset('assets/events/individual/'.$event->file.'')}}" class="xs-single-portfolio-item xs-image-popup event-detail-img-div">
					<img class="lazy" src="{{asset('loader.gif')}}" data-src="{{asset('assets/events/individual/frontendthumbnail/'.$event->file.'')}}" data-srcset="{{asset('assets/events/individual/frontendthumbnail/'.$event->file.'')}}" alt="">
					<div class="xs-portfolio-content">
						<span class="icon-plus-button"></span>
					</div>
				</a><!-- .xs-single-portfolio-item END -->
				<p class="event_img_text">{{$event->caption}}</p>
			</div><!-- .xs-portfolio-grid-item END -->
			@endforeach
		</div><!-- .xs-portfolio-grid END -->
		<div class="row pagination-center">
			{{ $events->links() }}
		</div>
	</div><!-- .container end -->
</div>	<!-- End portfolio section -->
</main>
@endsection