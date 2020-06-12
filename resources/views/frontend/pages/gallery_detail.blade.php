@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/event/bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Photo Gallery</h2>
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
	<div class="container">
		@if( count($gallery_image) == 0 )
	        <div class="text-center"><span class="text-danger">Sorry! No image found</span>
	        </div>
	     @endif
		<div class="xs-portfolio-grid">
			@foreach($gallery_image as $image)
				<div class="xs-portfolio-grid-item">
					<a href="{{asset('assets/gallery/individual/'.$image->file.'')}}" class="xs-single-portfolio-item xs-image-popup">
						<img class="lazy" src="{{asset('loader.gif')}}" data-src="{{asset('assets/gallery/individual/frontendthumbnail/'.$image->file.'')}}" data-srcset="{{asset('assets/gallery/individual/frontendthumbnail/'.$image->file.'')}}" alt="">
						<div class="xs-portfolio-content">
							<span class="icon-plus-button"></span>
						</div>
					</a><!-- .xs-single-portfolio-item END -->
					<p class="event_img_text">{{$image->caption}}</p>
				</div><!-- .xs-portfolio-grid-item END -->
			@endforeach
		</div><!-- .xs-portfolio-grid END -->
		<div class="row pagination-center">
			{{$gallery_image->links()}}
		</div>
	</div><!-- .container end -->
</div>	<!-- End portfolio section -->
</main>
@endsection