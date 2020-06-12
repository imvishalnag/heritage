@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/heritage_bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Tribes of NE</h2>
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
							<h3 class="widget-title2">Tribes of North East</h3>
							<ol class="xs-side-bar-list tribes-list">
								<li><a href="{{route('arunachalpradesh_tribe')}}"><span>Arunachal Pradesh</span><span><i class="fa fa-eye"></i></span></a></li>
								<li><a href="{{route('assam_tribe')}}"><span>Assam</span><span><i class="fa fa-eye"></i></span></a></li>
								<li><a href="{{route('manipur_tribe')}}"><span>Manipur</span><span><i class="fa fa-eye"></i></span></a></li>
								<li><a href="{{route('meghalaya_tribe')}}"><span>Meghalaya</span><span><i class="fa fa-eye"></i></span></a></li>
								<li><a href="{{route('mizoram_tribe')}}"><span>Mizoram</span><span><i class="fa fa-eye"></i></span></a></li>
								<li><a href="{{route('nagaland_tribe')}}"><span>Nagaland</span><span><i class="fa fa-eye"></i></span></a></li>
								<li><a href="{{route('sikkim_tribe')}}"><span>Sikkim</span><span><i class="fa fa-eye"></i></span></a></li>
								<li><a href="{{route('tripura_tribe')}}"><span>Tripura</span><span><i class="fa fa-eye"></i></span></a></li>
							</ol>
						</div><!-- widget archives closed -->
					</div><!-- End sidebar content -->
				</div>
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div>	<!-- End blog single post -->
</main>
@endsection