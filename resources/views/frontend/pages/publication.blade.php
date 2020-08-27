@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/event/bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Publication</h2>
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
			@if(count($publication)  == 0)
				<center><b class="text-danger">Sorry! No data found.</b></center>
			@endif
		<div class="row mb-2">
			@foreach($publication as $publication_single)
			<div class="col-lg-4 col-md-6">
				<div class="xs-box-shadow xs-single-journal xs-mb-30">
					<div class="entry-thumbnail ">
						<a href="{{route('subscriptions.pdf.publication', ['id' => encrypt($publication_single->id)])}}">
							<img class="lazy" src="loader.gif" data-src="{{asset('assets/publication/'.$publication_single->file.'')}}" data-srcset="{{asset('assets/publication/'.$publication_single->file.'')}}" alt="">
						</a>
						<div class="post-author">
							<span class="xs-round-avatar">
								<p>₹{{$publication_single->price}}</p>
							</span>
						</div>
					</div><!-- .xs-item-header END -->
					<span class="xs-separetor"></span>
					<div class="post-meta meta-style-color cust1">
						<span class="comments-link">
							<i class="fa fa-book"></i>
							<a href="#">Title</a>
						</span><!-- .comments-link -->
						<span class="view-link pt-5px float-right">
							<a href="#">{{$publication_single->title}}</a>
						</span>
					</div><!-- .post-meta END -->
					<div class="post-meta meta-style-color cust1 mt-0">
						<span class="comments-link">
							<i class="fa fa-book"></i>
							<a href="#">Writer</a>
						</span><!-- .comments-link -->
						<span class="view-link pt-5px float-right">
							<a title="Writer">{{$publication_single->author}}</a>
						</span>
					</div><!-- .post-meta END -->
				</div><!-- .xs-from-journal END -->
			</div>
			@endforeach
		</div><!-- .row end -->
		<div class="row pagination-center">
			{{$publication->links()}}
		</div>
	</div><!-- .container end -->
</section><!-- End journal section -->
@endsection