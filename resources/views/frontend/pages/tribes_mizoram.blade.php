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
				<div class="col-md-10 offset-md-1">
					<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th colspan="2">Tribes of Mizoram</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Sr. No.</th>
            <th>Main Tribes</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Chakma</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Gangte</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Hmar</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Lai (Pawi)</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Mara (Lakher)</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Mizo (Lusei)</td>
        </tr>
        <tr>
          <td>7</td>
          <td>Paite</td>
        </tr>
        <tr>
          <td>8</td>
          <td>Reang (Tuikuk)</td>
        </tr>
        <tr>
          <td>9</td>
          <td>Simte</td>
        </tr>
        <tr>
          <td>10</td>
          <td>Sukte</td>
        </tr>
        <tr>
          <td>11</td>
          <td>Thadou (Kuki)</td>
        </tr>
        <tr>
          <td>12</td>
          <td>Tiddim</td>
        </tr>
        <tbody>
    </table>
</div>
				</div>
			</div><!-- .row end -->
		</div><!-- .container end -->
	</div>	<!-- End blog single post -->
</main>
@endsection