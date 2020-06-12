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
            <th colspan="2">Tribes of Assam</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Sr. No.</th>
            <th>Main Tribes</th>
        </tr>
        <tr>
           <td>1</td>
           <td>Bodo Kachari</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Deori</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Dimasa Kachari</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Hmar</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Hrangkhol</td>
        </tr>
        <tr>
            <td>6</td>
            <td>Jemi Naga</td>
        </tr>
        <tr>
            <td>7</td>
            <td>Karbi</td>
        </tr>
        <tr>
            <td>8</td>
            <td>Khasi Jaintia</td>
        </tr>
        <tr>
            <td>9</td>
            <td>Lalung (Tiwa)</td>
        </tr>
        <tr>
            <td>10</td>
            <td>Mech</td>
        </tr>
        <tr>
            <td>11</td>
            <td>MiriÂ</td>
        </tr>
        <tr>
            <td>12</td>
            <td>MisingÂ</td>
        </tr>
        <tr>
            <td>13</td>
            <td>Munda</td>
        </tr>
        <tr>
            <td>14</td>
            <td>RabhaÂ</td>
        </tr>
        <tr>
            <td>15</td>
            <td>ReangÂ</td>
        </tr>
        <tr>
            <td>16</td>
            <td>Rongmei Naga</td>
        </tr>
        <tr>
            <td>17</td>
            <td>Santhal</td>
        </tr>
        <tr>
            <td>18</td>
            <td>ShyamÂ</td>
        </tr>
        <tr>
            <td>19</td>
            <td>Sonowal Kachari</td>
        </tr>
        <tr>
            <td>20</td>
            <td>UrangÂ</td>
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