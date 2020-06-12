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
            <th colspan="3">Tribes of Arunachal Pradesh</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>Sr. No.</th>
            <th>Main Tribes</th>
            <th>Sub Tribes</th>
        </tr>
        <tr>
           <td>1</td>
           <td>Adi</td>
           <td>Padam</td>
        </tr>
        <tr>
        	<td>2</td>
        	<td>Aka</td>
        	<td></td>
        </tr>
        <tr>
        	<td>3</td>
        	<td>Apatani</td>
        	<td></td>
        </tr>
        <tr>
        	<td>4</td>
        	<td>Bugun</td>
        	<td></td>
        </tr>
        <tr>
        	<td>5</td>
        	<td>Galo</td>
        	<td></td>
        </tr>
        <tr>
        	<td>6</td>
        	<td>Hill miri</td>
        	<td></td>
        </tr>
        <tr>
        	<td>7</td>
        	<td>Khamba</td>
        	<td></td>
        </tr>
        <tr>
        	<td>8</td>
        	<td>Khampti</td>
        	<td></td>
        </tr>
        <tr>
        	<td>9</td>
        	<td>Khowa</td>
        	<td></td>
        </tr>
        <tr>
        	<td>10</td>
        	<td>Memba</td>
        	<td></td>
        </tr>
        <tr>
        	<td>11</td>
        	<td>Miji</td>
        	<td></td>
        </tr>
        <tr>
        	<td>12</td>
        	<td>Minyong</td>
        	<td></td>
        </tr>
        <tr>
        	<td>13</td>
        	<td>Mishmi<br>Mishmi<br>Mishmi</td>
        	<td>Digaru<br>Idu<br>miju</td>
        </tr>
        <tr>
        	<td>14</td>
        	<td>Monpa</td>
        	<td></td>
        </tr>
        <tr>
        	<td>15</td>
        	<td>Nocte</td>
        	<td></td>
        </tr>
        <tr>
        	<td>16</td>
        	<td>Nyishi</td>
        	<td></td>
        </tr>
        <tr>
        	<td>17</td>
        	<td>Sherdukpen</td>
        	<td></td>
        </tr>
        <tr>
        	<td>18</td>
        	<td>Singpho</td>
        	<td></td>
        </tr>
        <tr>
        	<td>19</td>
        	<td>Tagin</td>
        	<td></td>
        </tr>
        <tr>
        	<td>20</td>
        	<td>Tangsa</td>
        	<td></td>
        </tr>
        <tr>
        	<td>21</td>
        	<td>Wangchoo</td>
        	<td></td>
        </tr>
        <tr>
        	<td>22</td>
        	<td>Chakma</td>
        	<td></td>
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