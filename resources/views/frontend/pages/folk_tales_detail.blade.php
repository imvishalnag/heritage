@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/heritage_detail_bg.jpg')}}')">
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
				<div class="col-md-4 mobile-order-2">
					<!-- sidebar content -->
					<div class="sidebar sidebar-right">
						<div class="widget widget_categories xs-sidebar-widget" style="padding: 15px;">
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
							<a href="{{route('folk_tales')}}"><span class="view-all-curent-issue text-muted">View all</span></a>
						</div><!-- widget archives closed -->
					</div><!-- End sidebar content -->
				</div>
				<div class="col-md-8">
					<!-- sidebar content -->
					<div class="sidebar sidebar-right">
						<div class="widget widget_categories xs-sidebar-widget">
							<h3 class="widget-title2">Folk Tales of {{$state}}</h3>
							<ul class="xs-side-bar-list heritage-list">
								@if(count($folk_tales_state_wise) == 0)
									<li class="text-center"><span class="text-danger">Sorry! No data found.</span></li>
								@endif
								@foreach($folk_tales_state_wise as $folk_tales_state_wise_single)
									<li><a href="{{route('folk_tales.single_pdf', ['file'=>$folk_tales_state_wise_single->file])}}" target="_blank"><span>{{$folk_tales_state_wise_single->heading}}</span><span><i class="fa fa-mail-forward"></i></span></a></li>
								@endforeach
							</ul>
						</div><!-- widget archives closed -->
					</div><!-- End sidebar content -->
					<div class="row pagination-center">
				{{$folk_tales_state_wise->links()}}
			</div>
				</div>
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div>	<!-- End blog single post -->
</main>
@endsection