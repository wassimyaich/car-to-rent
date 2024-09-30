<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   @include('frontend.include.includeheader')

  </head>
  <body>
   
  @include('frontend.header.header')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('/storage/frontend/pages/' . \App\Models\Setting::first()->services_image) }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Services <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Our Services</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Services</span>
            <h2 class="mb-3">Our Latest Services</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Wedding Ceremony</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">City Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Airport Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Whole City Tour</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-6 heading-section heading-section-white ftco-animate">
            <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
            <a href="#" class="btn btn-primary btn-lg">Become A Driver</a>
          </div>
				</div>
			</div>
		</section>

   

    @include('frontend.footer.footer')
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <!-- JS Files in frontend/js -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>

<!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

<!-- Custom JS Files -->
<script src="{{ asset('frontend/js/google-map.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

  </body>
</html>