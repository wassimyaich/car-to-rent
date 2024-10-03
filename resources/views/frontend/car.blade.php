<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles
    {!! NoCaptcha::renderJs() !!}

    <style>
        .img-fluide {
            width: 100%;
            /* This ensures that the image takes the full width of its container */
            height: auto;
            /* Maintains aspect ratio */
            object-fit: cover;
            /* Crops the image to fill the container without distorting */
        }

        .fixed-imagee {
            width: 100%;
            /* Adjust this if needed */
            height: 200px;
            /* Set a fixed height */
            object-fit: cover;
            /* This ensures the image fits nicely within the given dimensions */
        }
    </style>
    @include('frontend.include.includeheader')
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/carsearch/css/main.css') }}">
</head>

<body id="category">

    @include('frontend.header.header')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image:  url('{{ asset('/storage/frontend/pages/' . \App\Models\Setting::first()->car_image) }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Choose Your Car</h1>
                </div>
            </div>
        </div>
    </section>
    @livewire('car-filter', [
        'pickuplocation' => $pickUpLocation,
        'dropofflocation' => $dropOffLocation,
    
        'pickUpDate' => $pickUpDate,
        'pickuptime' => $pickuptime,
        'dropofftime' => $dropofftime,
    
        'dropOffDate' => $dropOffDate,
    ])

    @include('frontend.footer.footer')



    @include('frontend.include.includefooter')
    <!-- Updated JavaScript with frontend/carsearch path -->
    <script src="{{ asset('frontend/carsearch/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/carsearch/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/carsearch/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/carsearch/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/carsearch/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/carsearch/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/carsearch/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/carsearch/js/owl.carousel.min.js') }}"></script>
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('frontend/carsearch/js/gmaps.min.js') }}"></script>
    <script src="{{ asset('frontend/carsearch/js/main.js') }}"></script>
    @livewireScripts

</body>

</html>
