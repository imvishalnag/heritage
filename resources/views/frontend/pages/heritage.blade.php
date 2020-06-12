@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/heritage_bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Heritage Explorer</h2>
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
				<div class="col-md-8 offset-md-2">
					<!-- sidebar content -->
					<div class="sidebar sidebar-right">
						<div class="widget widget_categories xs-sidebar-widget">
							<h3 class="widget-title">Heritage Explorer</h3>
							<ul class="xs-side-bar-list heritage-list">
								@if(count($heritage_explorer) == 0)
									<li class="text-center"><span class="text-danger">Sorry! No data found.</span></li>
								@endif
								@foreach($heritage_explorer as $heritage_explorer_single)
									<li><a href="{{route('heritage.single', ['id'=>encrypt($heritage_explorer_single->year)])}}"><span>Heritage Explorer {{$heritage_explorer_single->year}}</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								@endforeach
							</ul>
						</div><!-- widget archives closed -->
					</div><!-- End sidebar content -->
				</div>
			</div><!-- .row end -->
			<div class="row pagination-center">
				{{$heritage_explorer->links()}}
			</div>
		</div><!-- .container end -->
	</div>	<!-- End blog single post -->
</main>
@endsection