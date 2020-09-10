@extends('frontend.layouts.app')
@section('meta')
    <meta property="og:url"                content="http://webinfotechghy.xyz" />
    <meta property="og:type"               content="news" />
    <meta property="og:title"              content=" {{$current_issue[0]->heading}}" />
    <meta property="og:description"        content="{!! $current_issue[0]->description !!}" />
    <meta property="og:image"              content="{{asset('assets/currentissue/'.$current_issue[0]->file.'')}}" />
@endsection
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
			<div class="col-md-12 col-lg-4 mobile-order-2">
				<!-- sidebar content -->
				<div class="sidebar sidebar-right">
					<!-- categories start -->
					<div class="widget widget_categories xs-sidebar-widget" style="padding: 15px !important; margin: 0; !important">
						<h3 class="widget-title mb-15">Current Issue</h3>
						<ul class="xs-side-bar-list custom-news-list">
							@foreach($current_issue_list as $current_issue_single)
								<li>
									<a href="{{route('current_issue.single', ['id'=>encrypt($current_issue_single->id)])}}">
									    <div class="thimbnail-box-currentissue-sidebar" style="background-image: url({{asset('assets/currentissue/thumbnail/'.$current_issue_single->file.'')}});"></div>
										<div class="currentissue-heading-news"><p class="line-clamp-2">{{$current_issue_single->heading}}</p><div class="cidl_time"><i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($current_issue_single->updated_at)->diffForHumans()}}</div></div>
									</a>
								</li>
							@endforeach
						</ul>
						<a href="{{route('current_issue')}}"><span class="view-all-curent-issue text-muted mt-0">View all</span></a>
					</div>
				</div>				<!-- End sidebar content -->
			</div>
			<div class="col-md-12 col-lg-8">
				<!-- format standard -->
				<article class="post format-standard hentry xs-blog-post-details">
					<div class="post-media post-image fix-width" style="min-width: 730px; min-height: 387px; background-color: #eee;">
						<img  src="{{asset('loader.gif')}}" data-src="{{asset('assets/currentissue/'.$current_issue[0]->file.'')}}" data-srcset="{{asset('assets/currentissue/'.$current_issue[0]->file.'')}}" class="img-responsive lazy" alt="">
					</div><!-- .post-media END -->
					<div class="form-group">
						<ul>
							<li><a href="http://www.facebook.com/sharer.php?u={{route('current_issue.single', ['id'=>encrypt($current_issue[0]->id)])}}" class="social-button " id="" title=""><span class="fa fa-facebook-official"></span></a></li>
							<li>
								<a href="https://twitter.com/intent/tweet?text={{$current_issue[0]->heading}}&amp;url={{route('current_issue.single', ['id'=>encrypt($current_issue[0]->id)])}}" class="social-button " id="" title=""><span class="fa fa-twitter"></span></a></li>
							<li><a target="_blank" href="https://wa.me/?text={{route('current_issue.single', ['id'=>encrypt($current_issue[0]->id)])}}" class="social-button " id="" title=""><span class="fa fa-whatsapp"></span></a></li></ul>
					</div>
					<div class="post-body xs-border xs-padding-40">
						<div class="entry-header">
							<div class="post-meta row">
								<div class="col-md-2 xs-padding-0">
									 <span class="post-meta-date"><b>{{$current_issue[0]->day}}</b> {{$current_issue[0]->month}}</span>
									 
				 				</div>
							</div><!-- .row end -->
			 				<h2 class="entry-title xs-post-entry-title">
				 				<a href="#">{{$current_issue[0]->heading}}</a>
				 			</h2>
						</div><!-- header end -->
						
						<div class="entry-content">
							{!!$current_issue[0]->description!!}
						</div><!-- .xs-entry-content END -->

						<!-- <div class="share-items">
							<h5 class="xs-post-sub-heading">Social Share</h5>
							<ul class="xs-social-list square">
								<li><a href="#" class="color-facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="color-twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="color-whatsapp"><i class="fa fa-whatsapp"></i></a></li>
							</ul>
						</div> --><!-- Share items end -->
						<div class="clearfix"></div>
					</div><!-- post-body end -->
				</article><!-- .post  END -->
				<!-- format standard closed -->
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</div>	<!-- End blog single post -->

</main>
@endsection