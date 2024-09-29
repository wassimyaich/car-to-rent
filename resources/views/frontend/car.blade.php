<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carbook - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
       .img-fluide {
    width: 100%; /* This ensures that the image takes the full width of its container */
    height: auto; /* Maintains aspect ratio */
    object-fit: cover; /* Crops the image to fill the container without distorting */
}

.fixed-imagee {
    width: 100%; /* Adjust this if needed */
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* This ensures the image fits nicely within the given dimensions */
}

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
    
    <div class="container" style="margin-top: 1cm;">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable"
                                aria-expanded="false" aria-controls="fruitsVegetable"><span
                                    class="lnr lnr-arrow-right"></span>Brands<span
                                    class="number">({{\App\Models\Brand::count()}})</span></a>
                            <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false"
                                aria-controls="fruitsVegetable">
                                @foreach ($brands as $brand)
                                <li class="main-nav-list child"><a href="#">{{$brand->name}}<span
                                    class="number">({{ \App\Models\Car::whereHas('brand', function($query) use ($brand) {
                                        $query->where('name', $brand->name);
                                    })->count() }})</span></a></li>
                                @endforeach
                                
                               
                            </ul>
                        </li>


                        <li class="main-nav-list"><a href="#">Pet Care<span class="number">(29)</span></a></li>

                    </ul>
                </div>
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Brands</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple"
                                        name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Color</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="black"
                                        name="color"><label for="black">Black<span>(29)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                @livewire('search-bar-filter')
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                <!-- Start car Seller -->
                       
                        @foreach ($cars as $car)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <img class="img-fluide fixed-imagee" src="{{ asset("storage/" . $car->image_path[0]) }}" alt="">
                                <div class="product-details">
                                    
                            <h6 class="mb-0"><a href="#">{{$car->name}}</a></h6>
                            <div class="d-flex mb-3"><span class="cat">{{$car->type->name}}</span>
                                <p class="price ml-auto">{{$car->daily_rate}}<span>/day</span></p>
                                <input type="hidden" name="state_name" value="{{ $car->state->name }}">
                            </div>
                                    <div class="brand">
                                        <h6>{{$car->brand->name}}</h6>
                                        
                                    </div>
                                    <div class="prd-bottom">
                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">compare</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    </div>
                </section>

                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left"
                                aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i></a>
                    </div>
                </div>
                <!-- End Filter Bar -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="container relative">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-quick-view">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="quick-view-carousel">
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">Mill Oil 1000W Heater, White</h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span>
                                        <span class="ml-10">$149.99</span></div>
                                    <div class="category">Category: <span>Household</span></div>
                                    <div class="available">Availibility: <span>In Stock</span></div>
                                </div>
                                <div class="middle">
                                    <p class="content">Mill Oil is an innovative oil filled radiator with the most
                                        modern technology. If you are
                                        looking for something that can make your interior look awesome, and at the same
                                        time give you the pleasant
                                        warm feeling during the winter.</p>
                                    <a href="#" class="view-full">View full Details <span
                                            class="lnr lnr-arrow-right"></span></a>
                                </div>
                                <div class="bottom">
                                    <div class="color-picker d-flex align-items-center">Color:
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                    </div>
                                    <div class="quantity-container d-flex align-items-center mt-15">
                                        Quantity:
                                        <input type="text" class="quantity-amount ml-15" value="1" />
                                        <div class="arrow-btn d-inline-flex flex-column">
                                            <button class="increase arrow" type="button"
                                                title="Increase Quantity"><span
                                                    class="lnr lnr-chevron-up"></span></button>
                                            <button class="decrease arrow" type="button"
                                                title="Decrease Quantity"><span
                                                    class="lnr lnr-chevron-down"></span></button>
                                        </div>

                                    </div>
                                    <div class="d-flex mt-20">
                                        <a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

</body>

</html>
