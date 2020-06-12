@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/heritage_bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Folk Tales</h2>
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
							<h3 class="widget-title">Folk Tales</h3>
							<ul class="xs-side-bar-list heritage-list">
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Arunachal Pradesh')])}}"><span>Arunachal Pradesh</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Assam')])}}"><span>Assam</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Manipur')])}}"><span>Manipur</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Meghalaya')])}}"><span>Meghalaya</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Mizoram')])}}"><span>Mizoram</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Nagaland')])}}"><span>Nagaland</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Sikkim')])}}"><span>Sikkim</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								<li><a href="{{route('folk_tales.single', ['id'=>encrypt('Tripura')])}}"><span>Tripura</span><span><i class="fa fa-mail-forward"></i></span></a></li>
							</ul>
						</div><!-- widget archives closed -->
					</div><!-- End sidebar content -->
				</div>
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div>	<!-- End blog single post -->
</main>
@endsection