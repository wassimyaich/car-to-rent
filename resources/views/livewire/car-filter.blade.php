<div>
    <div class="container" style="margin-top: 1cm;">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        <li class="main-nav-list"><a data-toggle="collapse" href="#fruitsVegetable"
                                aria-expanded="false" aria-controls="fruitsVegetable"><span
                                    class="lnr lnr-arrow-right"></span>Brands<span
                                    class="number">({{ \App\Models\Brand::count() }})</span></a>
                            <ul class="collapse" id="fruitsVegetable" data-toggle="collapse" aria-expanded="false"
                                aria-controls="fruitsVegetable">
                                {{-- {{json_encode($selected_brands)}}
                                @foreach ($brands as $brand)
                                    <li wire:model.live="selected_brands" class="main-nav-list child"><a href="#">{{ $brand->name }}<span
                                                class="number">({{ \App\Models\Car::whereHas('brand', function ($query) use ($brand) {
                                                    $query->where('name', $brand->name);
                                                })->count() }})</span></a>
                                    </li>
                                @endforeach --}}


                            </ul>
                        </li>


                        <li class="main-nav-list"><a href="#">Pet Care<span class="number">(29)</span></a>
                        </li>

                    </ul>
                </div>
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Brands({{ \App\Models\Brand::count() }})</div>
                        {{-- {{json_encode($selected_brands)}} --}}

                     
                        <ul>
                            @foreach ($brands as $brand)
                            <li class="mb-4" wire:key="{{$brand->id}}">
                            <input wire:model.live="selected_brands" class="form-check-input" type="checkbox" value="{{$brand->id}}" id="{{$brand->id}}">
                            <label class="form-check-label" for="{{ $brand->id }}">
                                {{ $brand->name }} ({{ \App\Models\Car::whereHas('brand', function ($query) use ($brand) {
                                    $query->where('name', $brand->name);
                                })->count() }})
                            </label>
                            </li>
                            @endforeach
                        </ul>
                     
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
                    
                    {{-- <div class="common-filter" wire:ignore>
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
                    </div> --}}
                    <div class="common-filter" wire:ignore>
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
                {{-- @livewire('search-bar-filter') --}}
                <div class="filter-bar d-flex flex-wrap align-items-center">
    
                   
                    <div class="sorting position-relative">
                        <div class="dropdown">
                            <input 
                                type="text" 
                                wire:model.live="search_state" 
                                placeholder="Search and select a state..." 
                                class="form-control"
                                wire:focus="showDropdown"
                                wire:blur="hideDropdownDelayed"
                            />
                            @if($dropdownVisible)
                                <ul class="dropdown-menu w-100 show">
                                    @forelse($states as $state)
                                        <li><a class="dropdown-item" wire:click.prevent="selectState('{{ $state->name }}')">{{ $state->name }}</a></li>
                                    @empty
                                        <li><a class="dropdown-item disabled">No states found</a></li>
                                    @endforelse
                                </ul>
                            @endif
                        </div>
                    </div>
                    
                    <div class="sort mr-auto">
                        <select>
                            <option value="12">Show 12</option>
                            <option value="24">Show 24</option>
                            <option value="36">Show 36</option>
                        </select>
                    </div>
                    <div class="pagination">
                        {{-- Previous Page Link (hide when on the first page) --}}
                        @if (!$cars->onFirstPage())
                            <a href="#" class="prev-arrow" wire:click.prevent="previousPage"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        @endif
                    
                        {{-- Pagination Elements --}}
                        @foreach ($cars->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <a href="#" class="dot-dot" wire:click.prevent><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                            @endif
                    
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $cars->currentPage())
                                        <a href="#" class="active">{{ $page }}</a>
                                    @else
                                        <a href="#" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    
                        {{-- Next Page Link (hide when on the last page) --}}
                        @if ($cars->hasMorePages())
                            <a href="#" class="next-arrow" wire:click.prevent="nextPage"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        @endif
                    </div>
                    
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <!-- Start car Seller -->

                        @foreach ($cars as $car)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluide fixed-imagee"
                                        src="{{ asset('storage/' . $car->image_path[0]) }}" alt="">
                                    <div class="product-details">

                                        <h6 class="mb-0"><a href="#">{{ $car->name }}</a></h6>
                                        <div class="d-flex mb-3"><span
                                                class="cat">{{ $car->type->name }}</span>
                                            <p class="price ml-auto">{{ $car->daily_rate }}<span>/day</span></p>
                                            <input type="hidden" name="state_name"
                                                value="{{ $car->state->name }}">
                                        </div>
                                        <div class="brand">
                                            <h6>{{ $car->brand->name }}</h6>

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
                    {{-- Start pagination  --}}
                    {{-- <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left"
                                aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h"
                                aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i></a>
                             
                        {{$cars->links()}}
                    </div> --}}

                    <div class="pagination">
                        {{-- Previous Page Link (hide when on the first page) --}}
                        @if (!$cars->onFirstPage())
                            <a href="#" class="prev-arrow" wire:click.prevent="previousPage"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        @endif
                    
                        {{-- Pagination Elements --}}
                        @foreach ($cars->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <a href="#" class="dot-dot" wire:click.prevent><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                            @endif
                    
                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $cars->currentPage())
                                        <a href="#" class="active">{{ $page }}</a>
                                    @else
                                        <a href="#" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    
                        {{-- Next Page Link (hide when on the last page) --}}
                        @if ($cars->hasMorePages())
                            <a href="#" class="next-arrow" wire:click.prevent="nextPage"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        @endif
                    </div>
                    
                    


                    {{-- End pagination  --}}
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
                                        <span class="ml-10">$149.99</span>
                                    </div>
                                    <div class="category">Category: <span>Household</span></div>
                                    <div class="available">Availibility: <span>In Stock</span></div>
                                </div>
                                <div class="middle">
                                    <p class="content">Mill Oil is an innovative oil filled radiator with the most
                                        modern technology. If you are
                                        looking for something that can make your interior look awesome, and at the
                                        same
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
                                        <a href="#" class="like-btn"><span
                                                class="lnr lnr-layers"></span></a>
                                        <a href="#" class="like-btn"><span
                                                class="lnr lnr-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{ asset('frontend/carsearch/js/jquery.ajaxchimp.min.js') }}"></script> --}}

<script>
    $(function() {
        if (document.getElementById("price-range")) {
            var nonLinearSlider = document.getElementById('price-range');

            noUiSlider.create(nonLinearSlider, {
                connect: true,
                behaviour: 'tap',
                start: [0, 1000],
                range: {
                    'min': [0],
                    // '10%': [500, 500],
                    // '50%': [4000, 1000],
                    'max': [{{ $maxDailyRate }}]
                }
            });

            var nodes = [
                document.getElementById('lower-value'), // 0
                document.getElementById('upper-value')  // 1
            ];

            // Display the slider value and update Livewire properties
            nonLinearSlider.noUiSlider.on('update', function(values, handle) {
                nodes[handle].innerHTML = values[handle];

                // Update Livewire properties
                @this.updatePriceRange(parseInt(values[0]), parseInt(values[1]));
            });

             // Listen for the updateMaxDailyRate event from Livewire
             Livewire.on('updateMaxDailyRate', () => {
                const maxRate = @this.getMaxDailyRate; // Get current max daily rate
                nonLinearSlider.noUiSlider.updateOptions({
                    range: {
                        'max': [maxRate] // Update max value dynamically
                    }
                });
            });


        }
    });
</script>


