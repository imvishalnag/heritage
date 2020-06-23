<!-- get_header('Page Name','Title')-->
<!doctype html>
<html class="no-js" lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Heritage Foundation</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no"">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto+Slab:400,700" rel="stylesheet">

		<link rel="icon" type="image/png" href="{{asset('frontend/assets/images/favicon.jpg')}}">
		<!-- Place favicon.ico in the root directory -->

		<link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">

		<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/assets/css/xsIcon.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/assets/css/isotope.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/assets/css/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
		

		<!--For Plugins external css-->
		<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins.css')}}" />

		<!--custom css -->
		<link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
		
		<!--<link rel='stylesheet alternate' title='color-1' type='text/css' href='{{asset('frontend/assets/css/colors/color-1.css')}}' >-->
		<!--<link rel='stylesheet alternate' title='color-2' type='text/css' href='{{asset('frontend/assets/css/colors/color-2.css')}}' >-->
		<!--<link rel='stylesheet alternate' title='color-3' type='text/css' href='{{asset('frontend/assets/css/colors/color-3.css')}}' >-->
		<!--<link rel='stylesheet alternate' title='color-4' type='text/css' href='{{asset('frontend/assets/css/colors/color-4.css')}}' >-->
		<!--<link rel='stylesheet alternate' title='color-5' type='text/css' href='{{asset('frontend/assets/css/colors/color-5.css')}}' >-->
		<!--<link rel='stylesheet alternate' title='color-6' type='text/css' href='{{asset('frontend/assets/css/colors/color-6.css')}}' >-->
        <!--<link rel='stylesheet alternate' title='color-7' type='text/css' href='{{asset('frontend/assets/css/colors/color-7.css')}}' >-->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">
        <!--Responsive css-->
		<link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}" />
	</head>
	<body>
	<!--[if lt IE 10]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
<!-- header section -->
<div class="xs-top-bar top-bar-second">
	<div class="container clearfix">
		<ul class="xs-top-social">
			<li><a href="https://www.facebook.com/Heritage-Foundation-526700334382456/"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram"></i></a></li>
			<li>
				@if(!Auth::guard('member')->user())
					<a href="{{route('member.login')}}"><i class="fa fa-user"></i> Sign In</a>
				@else
				{{Auth::guard('member')->user()->username}}
				<a href="{{ route('member.logout') }}" class="fa fa-sign-out" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    Logout
                </a>     
                <form id="frm-logout" action="{{ route('member.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
				@endif

			</li>
		</ul>
		<a href="mailto:ourheritage123@gmail.com" class="xs-top-bar-mail"><i class="fa fa-envelope-o"></i>ourheritage123@gmail.com</a>
		<a href="tel: +91 0361-2636365" class="xs-top-bar-mail header-phone d-sm-none"><i class="fa fa-phone"></i>+91 0361-2636365</a>
	</div>
</div>
<header class="xs-header xs-fullWidth">
	<div class="container-fluid">
		<nav class="xs-menus">
			<div class="nav-header">
				<div class="nav-toggle"></div>
				<a href="{{route('frontend.home')}}" class="xs-nav-logo">
					<img src="{{asset('frontend/assets/images/logo-v3.png')}}" alt="">
				</a>
			</div><!-- .nav-header END -->
			<div class="nav-menus-wrapper row">
				<div class="xs-logo-wraper col-lg-2">
					<a class="nav-brand" href="{{route('frontend.home')}}">
						<img src="{{asset('frontend/assets/images/logo-v3.png')}}" alt="">
					</a>
				</div><!-- .xs-logo-wraper END -->
				<div class="col-lg-10">
					<ul class="nav-menu">
						<li><a href="{{route('frontend.home')}}">Home</a></li>
						<li><a href="{{route('about')}}">about</a></li>
						<li><a href="{{route('heritage')}}">Heritage Explorer</a></li>
						<li><a href="{{route('magazine')}}">Oitihya Barta</a></li>
						<li><a href="{{route('publication')}}">Publication</a></li>
						<li><a href="{{route('current_issue')}}">Current Issue</a></li>
						<li><a href="#">More</a>
							<ul class="nav-dropdown">
								<li><a href="{{route('events')}}">Events</a></li>
								<li><a href="{{route('donation')}}">Donation</a></li>
								<li><a href="{{route('gallery')}}">Gallery</a></li>
								<li><a href="{{route('video')}}">Video</a></li>
								<li><a href="{{route('tribes_of_ne')}}">Tribes of NE</a></li>
								<li><a href="{{route('folk_tales')}}">Folk Tales</a></li>
							</ul>
						</li>
						<li><a href="{{route('contact')}}">Contact</a></li>
						@if(Auth::guard('member')->id())
							@php
								$user = App\Member::find(Auth::guard('member')->id());
								$plan = DB::table('plan_subscriptions')->where('user_id', Auth::guard('member')->id())->first();
							@endphp
							@if(!empty($plan->plan_id))
								<li><a href="{{route('status_page')}}">Membership</a></li>
							@else
								<li><a href="{{route('membership')}}">Membership</a></li>
							@endif
						@else
							<li><a href="{{route('membership')}}">Membership</a></li>
						@endif
					</ul><!-- .nav-menu END -->
				</div>
			</div><!-- .nav-menus-wrapper .row END -->
		</nav><!-- .xs-menus .fundpress-menu END -->
	</div><!-- .container end -->
</header><!-- End header section -->
