@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/heritage_bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Current issue</h2>
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
				@if(count($current_issue) == 0)
					<li class="text-center"><span class="text-danger">Sorry! No data found.</span></li>
				@endif
				@foreach($current_issue as $current_issue_single)
					<div class="col-md-6 col-lg-4">
        				<a href="{{route('current_issue.single', ['id'=>encrypt($current_issue_single->id)])}}">
        					<div class="xs-single-causes">
        						<div class="current-issue-image-box">
        							<img class="lazy" src="loader.gif" data-src="{{asset('assets/currentissue/frontendthumbnail/'.$current_issue_single->file.'')}}" data-srcset="{{asset('assets/currentissue/frontendthumbnail/'.$current_issue_single->file.'')}}" alt="">
        							<div class="time-ago">{{Carbon\Carbon::parse($current_issue_single->updated_at)->diffForHumans()}}</div>
        						</div>
        						<div class="xs-causes-footer min-height-74">
        							<p class="color-purple">{{$current_issue_single->heading}}</p>
        						</div>
        					</div><!-- .xs-single-causes END -->
        				</a>
    			    </div>
				@endforeach
			</div><!-- .row end -->
			<div class="row pagination-center">
				{{$current_issue->links()}}
			</div>
		</div><!-- .container end -->
	</div>	<!-- End blog single post -->
</main>
@endsection