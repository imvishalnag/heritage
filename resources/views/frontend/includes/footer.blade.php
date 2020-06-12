<!-- footer section start -->
		<footer class="xs-footer-section">
			<div class="container">
				<div class="xs-footer-top-layer">
					<div class="row">
						<div class="col-lg-3 col-md-6 footer-widget xs-pr-20">
							<a href="{{route('frontend.home')}}" class="xs-footer-logo">
								<img src="{{asset('frontend/assets/images/footer_logo.png')}}" alt="">
							</a>
							<p>Heritage Foundation is a registered Charitable Trust founded on 11th day of Kartik (Shukla Paksha), Shakabda 1922/ the 8th November 2000.</p>
							<ul class="xs-social-list-v2">
								<li><a href="#" class="color-facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="color-twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="color-dribbble"><i class="fa fa-youtube"></i></a></li>
							</ul><!-- .xs-social-list END -->
						</div>
						<div class="col-lg-2 col-md-6 footer-widget">
							<h3 class="widget-title">Quick Links</h3>
							<ul class="xs-footer-list">
								<li><a href="{{route('about')}}">About Us</a></li>
								<li><a href="{{route('heritage')}}">Heritage</a></li>
								<li><a href="{{route('magazine')}}">Magazine</a></li>
								<li><a href="{{route('publication')}}">Publication</a></li>
								<li><a href="{{route('current_issue')}}">Current Issue</a></li>
								<li><a href="{{route('contact')}}">Contact Us</a></li>
							</ul>
						</div>
						<div class="col-lg-4 col-md-6 footer-widget">
							<div class="widget recent-posts">
								<h3 class="widget-title">Trending Post</h3>
								<ul class="xs-recent-post-widget">
									@foreach($current_issue_for_footer as $single_issue)
									<li>
										<div class="posts-thumb float-left"> 
											<a href="{{route('current_issue.single', ['id'=>encrypt($single_issue->id)])}}" style="width: 80px;height: 70px; background: url({{asset('assets/currentissue/'.$single_issue->file.'')}});background-size: cover;background-position: center center;">
												<img alt="img" class="img-responsive" src="{{asset('frontend/assets/images/news_feeds_1.jpg')}}" style="visibility: hidden;">
												<div class="xs-entry-date">
													<span class="entry-date d-block">{{$single_issue->day}}</span>
													<span class="entry-month d-block">{{ \Illuminate\Support\Str::limit($single_issue->month, 3, $end='') }}</span>
												</div>
												<div class="xs-black-overlay"></div>
											</a>
										</div><!-- .posts-thumb END -->
										<div class="post-info">
											<a  href="{{route('current_issue.single', ['id'=>encrypt($single_issue->id)])}}" style="font-size: 14px;color: #fff;">{{ \Illuminate\Support\Str::limit($single_issue->heading , 60, $end=' ...') }}</a>
											{{-- <div class="post-meta">
												<span class="comments-link">
													<i class="fa fa-comments-o"></i>
													<a href="#">300 Comments</a>
												</span>
											</div> --}}
										</div><!-- .post-info END -->
										<div class="clearfix"></div>
									</li><!-- 1st post end-->
									@endforeach
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 footer-widget">
							<h3 class="widget-title">Contact Us</h3>
							<ul class="xs-info-list">
								<li><i class="fa fa-home bg-red" style="margin-bottom: 5px;"></i>Office Addr -Bhuban Road, Near GMC Office, Ujan Bazar, Ghy - 781001</li>
								<li><i class="fa fa-phone bg-green"></i><a href="tel:+91 0361-2636365">+91 0361-2636365</a></li>
								<li><i class="fa fa-envelope-o bg-blue"></i><a href="mailto:ourheritage123@gmail.com">ourheritage123@gmail.com</a></li>
							</ul><!-- .xs-list-with-icon END -->
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="xs-copyright">
					<div class="row">
						<div class="col-md-6">
							<div class="xs-copyright-text">
								<p>&copy; Copyright 2020 <a href="/">Heritage Foundation.</a> - All Right's Reserved</p>
							</div>
						</div>
						<div class="col-md-6">
							<nav class="xs-footer-menu">
								<ul>
									<li>Developed by <a href="https://www.webinfotech.net.in/" target="_blank">Webinfotech</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="xs-back-to-top-wraper">
				<a href="#" class="xs-back-to-top"><i class="fa fa-angle-up"></i></a>
			</div>
		</footer>		

		<script src="{{asset('frontend/assets/js/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
		<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
		<!--<script src="{{asset('frontend/assets/js/spectragram.min.js')}}"></script>-->
		<script src="{{asset('frontend/assets/js/main.js')}}"></script>
		<script src="{{asset('frontend/assets/js/custom.js')}}"></script>
		<script src="{{asset('frontend/assets/js/lazyload.js')}}"></script>
		 <script src="{{asset('frontend/assets/js/home-owl.js')}}"></script> 
		<!-- <script src="{{asset('frontend/assets/js/video.js')}}"></script> -->
		@yield('script')
	</body>
</html>
<!-- footer section end -->