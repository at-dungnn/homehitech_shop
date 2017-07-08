@extends('layouts.master')
@section('lienhe-content')
	<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Liện hệ  <strong>chúng tôi</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
						<iframe width="100%" height="100%" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/view?zoom=17&center=16.0658,108.2003&key=AIzaSyDmNT3RvTfIOTe_XiemwYkG7AtO2jMejxE" allowfullscreen></iframe>
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-12" style="text-align: center;">
	    			<!-- {{$contact}} -->
	    			<div class="contact-info">
	    				<h2 class="title text-center">Thông tin liên hệ</h2>
	    				<address>
	    					@foreach($contact as $contact_value)
	    						<p style="font-weight: bold;">HomeHiTech</p>
								<p>{{ $contact_value['address'] }}</p>
								<p>Việt Nam</p>
								<p>Phone cá nhân: {{$contact_value['phone_canhan']}}</p>
								<p>Phone công ty: {{$contact_value['phone_congty']}}</p>
								<p>Facebook : {{$contact_value['phone_congty']}}</p>
								<p>Email : {{$contact_value['email']}}</p>
							@endforeach
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Trang mạng xã hội</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-skype"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
@endsection