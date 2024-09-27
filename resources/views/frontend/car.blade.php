<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('frontend.include.includeheader')
</head>
<body >

@include('frontend.header.header')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('frontend/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Choose Your Car</h1>
            </div>
        </div>
    </div>
</section>
{{-- section test --}}

<section id="search">
    <div class="container search-block p-5">
  
        <form class="row">
            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="vehicle" class="label-style text-capitalize form-label">Vehicle type</label>
                <div class="input-group date ">
                    <select class="form-select form-control p-3" id="vehicle" aria-label="Default select example"
                        style="background-image: none;">
                        <option selected>Select Vehicle</option>
                        <option value="1">BMW x3</option>
                        <option value="2">BMW M2</option>
                        <option value="3">Ford explorer</option>
                        <option value="4">Ferrari</option>
                        <option value="5">Mercedes-Benz</option>
                        <option value="6">Sports car</option>
                        <option value="7">Tesla</option>
                    </select>
                </div>
            </div>
  
            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="location" class="label-style text-capitalize form-label">Picking up location</label>
                <div class="input-group date">
                    <input type="text" class="form-control p-3 position-relative" id="location"
                        placeholder="Airport or anywhere" />
                </div>
            </div>
  
            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="pick-up-date" class="label-style text-capitalize form-label">Picking up date</label>
                <div class="input-group date" id="datepicker1">
                    <input type="text" class="form-control p-3" id="datepicker" />
                    <span class="input-group-append">
                        <span class="search-icon-position position-absolute p-3">
                            <iconify-icon class="search-icons" icon="solar:calendar-broken"></iconify-icon>
                        </span>
                    </span>
                </div>
            </div>
  
            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="return-date" class="label-style text-capitalize form-label">Returning date</label>
                <div class="input-group date" id="datepicker2">
                    <input type="text" class="form-control p-3" id="datepicker2" />
                    <span class="input-group-append">
                        <span class="search-icon-position position-absolute p-3">
                            <iconify-icon icon="solar:calendar-broken"></iconify-icon>
                        </span>
                    </span>
                </div>
            </div>
  
            {{-- 
            <div class="col-12 mt-4">
                <label for="price-range" class="label-style text-capitalize form-label">Price Range</label>
                <input type="range" id="price-range" min="0" max="1000" step="10"
                       oninput="this.nextElementSibling.value = this.value">
                <output>500</output> <!-- Default value -->
            </div>
  
            <!-- Sort By Selection -->
            <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="sort-by" class="label-style text-capitalize form-label">Sort By</label>
                <select class="form-select form-control p-3" id="sort-by">
                    <option selected>Sort By...</option>
                    <option value="name">Sort by Name</option>
                    <option value="price_asc">Sort by Price (Low to High)</option>
                    <option value="price_desc">Sort by Price (High to Low)</option>
                </select>
            </div> --}}
  
        </form>
  
        <div class="d-grid gap-2 mt-4">
            <button  class="btn btn-primary " type="button">Find your car</button>
        </div>
    </div>
  
  </section>

{{-- end section test  --}}
<section class="ftco-section bg-light">
    <div class="container">
        <!-- Filters Section -->
        {{-- <div class="row mb-4">
            <div class="col-md-4">
                <input type="text" id="searchBar" placeholder="Search by model..." class="form-control">
            </div>
            <div class="col-md-4">
                <input type="text" id="cityFilter" placeholder="Filter by city..." class="form-control">
            </div>
            <div class="col-md-4">
                <select id="modelFilter" class="form-control">
                    <option value="">Select Model</option>
                    <option value="Mercedes Grand Sedan">Mercedes Grand Sedan</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
        </div> --}}

        <!-- Car Listings -->
        <div id="carList" class="row">
            <!-- Example Car Item -->
            <div class="col-md-4 car-item" data-city="New York" data-model="Mercedes Grand Sedan">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-1.jpg);"></div>
                    <div class="text">
                        <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                        <div class="d-flex mb-3"><span class="cat">Chevrolet</span><p class="price ml-auto">$500<span>/day</span></p></div>
                        <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> 
                        <a href="#" class="btn btn-secondary py-2 ml-1">Details</a></p>
                    </div>
                </div>
            </div>
            <!-- Add more car items similarly -->
            
<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-2.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Subaru</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-3.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Cheverolet</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-4.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Cheverolet</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-5.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Subaru</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-6.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Cheverolet</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-7.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Cheverolet</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-8.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Subaru</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-9.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Cheverolet</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-10.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Cheverolet</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-11.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Range Rover</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Subaru</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="car-wrap rounded ftco-animate">
        <div class="img rounded d-flex align-items-end" style="background-image: url(frontend/images/car-12.jpg);">
        </div>
        <div class="text">
            <h2 class="mb-0"><a href="car-single.html">Mercedes Grand Sedan</a></h2>
            <div class="d-flex mb-3">
                <span class="cat">Cheverolet</span>
                <p class="price ml-auto">$500 <span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single.html" class="btn btn-secondary py-2 ml-1">Details</a></p>
        </div>
    </div>
</div>
            <!-- Add more car items similarly -->

        </div>

        <!-- Pagination -->
        <div class="row mt-5">
            <div class="col text-center">
                <!-- Pagination code here -->
            </div>
        </div>
    </div>
</section>

@include('frontend.footer.footer')

<!-- JS Files in frontend/js -->
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

<script>
// JavaScript for filtering
$(document).ready(function() {
    $('#searchBar, #cityFilter, #modelFilter').on('keyup change', function() {
        var searchValue = $('#searchBar').val().toLowerCase();
        var cityValue = $('#cityFilter').val().toLowerCase();
        var modelValue = $('#modelFilter').val();

        $('.car-item').filter(function() {
            $(this).toggle(
                ($(this).find('.text h2').text().toLowerCase().indexOf(searchValue) > -1 || searchValue === "") &&
                ($(this).data('city').toLowerCase().indexOf(cityValue) > -1 || cityValue === "") &&
                (modelValue === "" || $(this).data('model') === modelValue)
            );
        });
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
<script>
$( function() {
  $( "#datepicker" ).datepicker();
  $( "#datepicker2" ).datepicker();

} );
</script>
@include('frontend.include.includefooter')
</body>
</html>