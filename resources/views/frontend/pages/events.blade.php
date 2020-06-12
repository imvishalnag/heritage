@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/event/bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Events</h2>
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
	<!-- causes section -->
	<section class="xs-content-section-padding">
	<div class="container">
		<div class="row">
			@foreach($events as $event)
			<div class="col-md-6 col-lg-4">
				<a href="{{route('events.single', ['id' => encrypt($event->id)])}}">
					<div class="xs-single-causes">
						<div class="event-img-div" style="max-height: 220px; overflow: hidden;">
							<img class="lazy" src="loader.gif" data-src="{{asset('assets/events/cover/'.$event->file.'')}}" data-srcset="{{asset('assets/events/cover/'.$event->file.'')}}" alt="">
						</div>
						<div class="xs-causes-footer min-height-74">
							<p class="color-purple">{{$event->event}}</p>
						</div>
					</div><!-- .xs-single-causes END -->
				</a>
			</div>
			@endforeach
		</div><!-- .row end -->
		<div class="row pagination-center">
			{{ $events->links() }}
		</div>
	</div><!-- .container end -->
</section>	<!-- End causes section -->

</main>
@endsection