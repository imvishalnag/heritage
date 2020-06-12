@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/gallery_bg.jpg')}}')">
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

<section class="xs-section-padding">
	<div class="container">
		@if( count($gallery_image) == 0 )
	        <div class="text-center"><span class="text-danger">Sorry! No image found</span>
	        </div>
	     @endif
		<div class="row mb-2">
             @foreach( $gallery_image as $image )
				<div class="col-lg-4 col-md-6">
					<div class="xs-box-shadow xs-single-journal xs-mb-30">
						<a href="{{route('gallery.state.tribe',encrypt( $image->state))}}">
							<div class="entry-thumbnail main_gallery_hover" style="max-height: 220px; overflow: hidden;">
							<img class="lazy" src="{{asset('loader.gif')}}" data-src="{{asset('assets/gallery/state/'.$image->file.'')}}" data-srcset="{{asset('assets/gallery/state/'.$image->file.'')}}" alt="">
							<span class="text-uppercase">{{$image->state}}</span>
						</div><!-- .xs-item-header END -->
						</a>
					</div><!-- .xs-from-journal END -->
				</div>
			@endforeach
		</div><!-- .row end -->
	</div><!-- .container end -->
</section><!-- End journal section -->
@endsection