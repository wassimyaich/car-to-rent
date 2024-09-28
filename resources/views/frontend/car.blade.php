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

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('frontend/images/bg_3.jpg');"
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
                            @foreach ($states as $state )
                            
                            <option value="">{{$state->name}}</option>
                            @endforeach
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
                <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                    <label for="vehicle" class="label-style text-capitalize form-label">Vehicle type</label>
                    <div class="input-group date ">
                        <select class="form-select form-control p-3" id="vehicle" aria-label="Default select example"
                            style="background-image: none;">
                            <option selected>Select Vehicle</option>
                            @foreach ($brands as $brand)
                            <option value="1">{{$brand->name}}</option>
                            @endforeach
                            
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
               

            </form>

           
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
                @foreach ($cars as $car)
               
                {{-- @php
                foreach ($car->reservations as $reservation) {
                    dd($reservation->status);
                }
            @endphp --}}

                
                <!-- Example Car Item -->
                <div class="col-md-4 car-item" data-city="New York" data-model="Mercedes Grand Sedan">
                    <div class="car-wrap rounded ftco-animate">
                        <div class="img rounded d-flex align-items-end"
                            {{-- style="background-image: url(frontend/images/car-1.jpg);"></div> --}}
                            style="background-image: url('{{ asset("storage/" . $car->image_path[0]) }}');">

                        </div>

                        <div class="text">
                            <h2 class="mb-0"><a href="#">{{$car->name}}</a></h2>
                            <div class="d-flex mb-3"><span class="cat">{{$car->type->name}}</span>
                                <p class="price ml-auto">{{$car->daily_rate}}<span>/day</span></p>
                            </div>
                            <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book
                                    now</a>
                                <a href="#" class="btn btn-secondary py-2 ml-1">Details</a>
                            </p>
                        </div>
                    </div>
                </div>

                @endforeach
                <!-- Add more car items similarly -->

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
                        ($(this).find('.text h2').text().toLowerCase().indexOf(searchValue) > -
                            1 || searchValue === "") &&
                        ($(this).data('city').toLowerCase().indexOf(cityValue) > -1 ||
                            cityValue === "") &&
                        (modelValue === "" || $(this).data('model') === modelValue)
                    );
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
            $("#datepicker2").datepicker();

        });
    </script>
    @include('frontend.include.includefooter')
</body>

</html>
