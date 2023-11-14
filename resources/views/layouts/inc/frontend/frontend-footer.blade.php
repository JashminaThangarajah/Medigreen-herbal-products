
@php
$setting = App\Models\Setting::first();
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="footer-bg">
		<div class="footer-container">
			<div class="row">
				<div class="col-md-3 ">
                 <h4>{{$setting->website_name}}</h4>
		    <img src ="{{ asset('assets/images/medigreenlogo.png')}}" height="150px" width="150px">
			</div>		
			<div class="col-md-3">
                <h4 class="footer-heading">Quick Links</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="{{url('/')}}" class="text-white">Home</a></div>
                <div class="mb-2"><a href="{{url('aboutus')}}" class="text-white">About Us</a></div>
                <div class="mb-2"><a href="{{url('contactus')}}" class="text-white">Contact Us</a></div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Reach Us</h4>
                <div class="footer-underline"></div>
                    <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{$setting->address}}
                         </p>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{$setting->phone1 }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{$setting->email1 }}
                        </a>
                    </div>
                </div>
              
				<div class="col-md-3">
					<h4>Follow Us On</h4>
                    <div class="footer-underline"></div>
                    <div class="social-links">
                    @if($setting->facebook)
                    <a href="{{$setting->facebook}}" target="_blank" class="text-white"><i class="fa fa-facebook"></i></a>
                     @endif
                    @if($setting->twitter)
					<a href="{{$setting->twitter}}" target="_blank" class="text-white"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if($setting->instagram)
					<a href="{{$setting->instagram}}" target="_blank" class="text-white"><i class="fa fa-instagram"></i></a>
                    @endif
                    @if($setting->youtube)
					<a href="{{$setting->youtube}}" target="_blank" class="text-white"><i class="fa fa-youtube"></i></a>
                    @endif
                    </div>

                    <h4>Subscribe Us</h4>
					<div class="subscribe">
						<form name="submit-to-google-sheet">
							<input type="email" name="Email" placeholder="example@gmail.com" class="sub" required><br>
							<button type="submit" class="Subscribebtn">Subscribe</button><br>
						</form>
                        <span id="subscribemsg"></span>
					</div>

                    <!--script-->
                    <script>
                        const scriptURL = 'https://script.google.com/macros/s/AKfycbxO_V5c6UDfRlfQ0q44ALhq79w7A9s0wTX1rh5C5aUEtGodw_gS1f8q1RJHGrpGQK6s/exec'
                        const form = document.forms['submit-to-google-sheet']
                        const subscribemsg = document.getElementById("subscribemsg")

                        form.addEventListener('submit', e => {
                            e.preventDefault()
                            fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                            .then(response => {
                                subscribemsg.innerHTML="Thank you for subscribed"
					setTimeout(function(){
						subscribemsg.innerHTML=""	
					}, 3000)
					form.reset()
					;
				}).catch(error => console.error('Error!', error.message))
                        })
                    </script>


				</div>
         </div>
    </div>
</div>
	
<div class="py-2 bg-gray">
	<div class="container text-center">
		<!-- <img src ="{{ asset('assets/images/medigreenlogo.png')}}" height="25px" width="25px">	 -->
		<p class="mb-0">Copyright © Medigreen Herbal Products(PVT)Ltd. All rights reserved.{{date('d-m-Y')}}</p>
            <div class="social-media">
                @if($setting->facebook)
                <a href="{{$setting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                 @endif
                @if($setting->twitter)
                <a href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                @endif
                @if($setting->instagram)
				<a href="{{$setting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                @endif
                @if($setting->youtube)
                <a href="{{$setting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                @endif 
            </div>
	</div>
</div>
    
    