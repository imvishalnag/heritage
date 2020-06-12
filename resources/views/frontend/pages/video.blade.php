@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/about_bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>Video Gallery</h2>
			<p>Give a helping hand for poor people</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{route('frontend.home')}}" class="color-white"> Home /</a> About</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here--><!-- End welcome section -->
<main class="xs-main">
    <!-- blog single post -->
    <div class="xs-content-section-padding xs-blog-single">
        <div class="container">
            @if( count($youtubevideo) == 0 )
                <div class="text-center"><span class="text-danger">Sorry! No Video found</span>
                </div>
             @endif
            <div class="row mb-3">
                <!-- sidebar content -->
                @foreach($youtubevideo as $video)
                    <div class="col-md-4">
                        <div class="y-video-div mb-4">
                            <a class="publication_file" href='#' data-videourl="https://www.youtube.com/watch?v={{$video->video}}">
                            <img class="lazy" src="{{asset('loader.gif')}}" data-src="{{asset('assets/youtubevideo/'.$video->file.'')}}" data-srcset="{{asset('assets/youtubevideo/'.$video->file.'')}}" alt="">
                            <h5 class="text-center p-3" style="background-color: #e8e8e8;">{{$video->heading}}</h5>
                            </a>
                            <a class="publication_file" href='#' data-videourl="https://www.youtube.com/watch?v={{$video->video}}"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                @endforeach
            </div><!-- .row end -->
            <div class="row pagination-center">
                {{-- {{$current_issue->links()}} --}}
            </div>
        </div><!-- .container end -->
    </div>  <!-- End blog single post -->
</main>
@endsection