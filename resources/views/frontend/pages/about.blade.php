@extends('frontend.layouts.app')
@section('content')
<!-- welcome section -->
<!--breadcumb start here-->
<section class="xs-banner-inner-section parallax-window" style="background-image:url('{{asset('frontend/assets/images/about_bg.jpg')}}')">
	<div class="xs-black-overlay"></div>
	<div class="container">
		<div class="color-white xs-inner-banner-content">
			<h2>About Us</h2>
			<p>Give a helping hand for poor people</p>
			<ul class="xs-breadcumb">
				<li class="badge badge-pill badge-primary"><a href="{{route('frontend.home')}}" class="color-white"> Home /</a> About</li>
			</ul>
		</div>
	</div>
</section>
<!--breadcumb end here--><!-- End welcome section -->


<main class="xs-main">
	<!-- video popup section section -->
	<section class="xs-content-section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-11 content-center">
				<div class="xs-heading text-center">
					<h4 class="xs-mb-0 xs-title" style="font-size:30px;">Heritage Foundation is a registered <span class="color-green">Charitable Trust</span> founded on 11th day of Kartik (Shukla Paksha), Shakabda 1922/ the 8th November 2000.</h4>
				</div>
			</div>
		</div><!-- .row end -->
	</div><!-- .container end -->
</section>	<!-- End video popup section section -->

	<!-- what we do section -->
	<section class="xs-section-padding pt-0">
	<div class="container">
		<div class="xs-heading row xs-mb-60">
			<div class="col-md-9 col-xl-9">
				<h3 class="xs-title">Our Objective </h3>
				<span class="xs-separetor dashed"></span>
				<p>The main objective of the trust is to promote and strengthen Indigenous Eternal Faith and Culture of the different ethnic communities of the Northeast Bharat in accordance with their respective faith and beliefs. For the said objective the Foundation has undertaken the following as its activities:</p>
			</div><!-- .xs-heading-title END -->
		</div><!-- .row end -->
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<ol class="about-ol-list">
					<li>Publishing useful literatures on indigenous traditions and spiritual Knowledge of different ethnic communities of this region.</li>
					<li>Publishing literatures of national importance in different languages of the Northeast.</li>
					<li>Publishing news Bulletin in English and local languages to update the information of the people who are concerned about the society and its tradition and cultural values.</li>
					<li>Organising Seminars and Workshops to initiate discussion on the topics of socio-cultural as well as conceptualto enrich the ideas of elites and learned personalities.</li>
					<li>Research on such topics which will be helpful in promoting National Integration and Social Harmony.</li>
					<li>Assistance to other socio-cultural organizations in publishing books and literatures of social importance.</li>
				</ol>
			</div>
		</div><!-- .row end -->
		<div class="row">
		    <div class="col-md-6">
		        <h4>Our Publications:</h4>
		        <b>News Bulletin</b>
		        <p>Publishing a monthly News Bulletin "Heritage Explorer" since April 2002. It is a registered news paper being circulated nationwide through postal services. The annual subscription is Rs.100/-.</p>
		        <p>We publish its Special Issue on a selected theme on the eve of Independence Day. Our previous issues are:</p>
		        <ul class="">
    			    <li>2009 Folk Tales of Northeast Bharat</li>
    			    <li>2010 Freedom Fighters of Northeast Bharat</li>
    			    <li>2011 Festivals of Northeast Bharat</li>
    			    <li>2012 Indigenous New Year of Northeast Bharat</li>
				</ul>
		    </div>
		    <div class="col-md-6">
		        <h4>Books Publication:</h4>
		        <p>The books that we have published during the F.Y. 2011-12 are as follows:</p>
		        <ol class="ol-number">
		            <li>Religious Philosophy of the Janajatis of NE Bharat</li>
		            <li>Socio-cultural and Spiritual Traditions of Arunachal Pradesh</li>
		            <li>Socio-cultural and Spiritual Traditions of Tripura</li>
		            <li>Socio-cultural and Spiritual Traditions of Meghalaya</li>
		            <li>Socio-cultural and Spiritual Traditions of Zeliangrong</li>
		            <li>Asamar Janajati Sakalar Dharmiya Achar aru Sanskriti (Assamese)</li>
		            <li>Traditional Festivals, Rites and Rituals of the Zeme Nagas</li>
		            <li>Glimpses from the Life of Rani Gaidinliu</li>
		            <li>Lok Devata Shree Hanuman (Hindi)</li>
		        </ol>
		    </div>
		</div>
	</div><!-- .container end -->
</section>	<!-- End what we do section -->

</main>
@endsection