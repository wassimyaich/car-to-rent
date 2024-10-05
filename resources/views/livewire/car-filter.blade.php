<div>
    <div class="container" style="margin-top: 1cm;">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Types Categories</div>
                    {{-- checkbox here  --}}

                    <div class="main-categories" style="margin-top: 20px;">
                        <h6 class="mb-3" id="brandsToggle" style="cursor: pointer;">
                            Brands({{ \App\Models\Brand::count() }})
                        </h6>
                        <div id="brandsList">
                            <ul>
                                @foreach ($brands as $brand)
                                    <li class="mb-3" wire:key="{{ $brand->id }}">
                                        <div class="form-check">
                                            <input wire:model.live="selected_brands" class="form-check-input"
                                                type="checkbox" value="{{ $brand->id }}"
                                                id="brand{{ $brand->id }}">
                                            <label class="form-check-label" for="brand{{ $brand->id }}">
                                                {{ $brand->name }}
                                                ({{ \App\Models\Car::whereHas('brand', function ($query) use ($brand) {
                                                    $query->where('name', $brand->name);
                                                })->count() }})
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>


                        </div>

                        <h6 class="mb-3" id="typesToggle" style="cursor: pointer;">
                            Types({{ \App\Models\Type::count() }})
                        </h6>
                        <div id="typesList">

                            <ul>
                                @foreach ($types as $type)
                                    <li class="mb-3" wire:key="{{ $type->id }}">
                                        <div class="form-check">
                                            <input wire:model.live="selected_types" class="form-check-input"
                                                type="checkbox" value="{{ $type->id }}"
                                                id="type{{ $type->id }}">
                                            <label class="form-check-label" for="brand{{ $type->id }}">
                                                {{ $type->name }}
                                                ({{ \App\Models\Car::whereHas('type', function ($query) use ($type) {
                                                    $query->where('name', $type->name);
                                                })->count() }})
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>



                        <div class="form-group ml-2">
                            <label for="" class="label">Pick-up date</label>
                            <input wire:model.live="pickUpDate" type="text" class="form-control datepicker"
                                autocomplete="off" id="book_pick_date" placeholder="Date" value="{{ $pickUpDate }}"
                                {{-- data-provide="datepicker"  --}} data-date-autoclose="true" data-date-format="mm/dd/yyyy"
                                data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))">
                        </div>
                        <div class="form-group ml-2">
                            <label for="" class="label">Pick-up time</label>

                            <input wire:model="pickuptime" type="time" id="time_picker" class="form-control"
                                value="10:05 AM" />
                        </div>


                        <div class="form-group ml-2">
                            <label for="" class="label">Drop-off date</label>
                            <input wire:model.live="dropOffDate" type="text" class="form-control datepicker"
                                id="book_off_date" placeholder="Date" value="{{ $dropOffDate }}" {{-- data-provide="datepicker"  --}}
                                data-date-autoclose="true" data-date-format="mm/dd/yyyy"
                                data-date-today-highlight="true" onchange="this.dispatchEvent(new InputEvent('input'))">
                        </div>
                        <div class="form-group ml-2">
                            <label for="" class="label">Drop-off time</label>

                            <input wire:model="dropofftime" type="time" id="time_drop" class="form-control"
                                value="10:05 AM" />
                        </div>



                    </div>
                </div>
                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Price Filters</div>

                    <div class="common-filter" wire:ignore>
                        <div class="head">
                            <h4>Price</h4>
                        </div>
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
                {{-- @livewire('search-bar-filter')  --}}
                <div class="filter-bar d-flex flex-wrap align-items-center">


                    <div class="sorting">
                        <div class="input-group">
                            <input type="text" wire:model.live="search_car" placeholder="Search and select a car..."
                                class="form-control" />

                        </div>
                    </div>

                    {{-- <div class="sorting">


                        <div class="position-relative">
                            <input wire:model.live="pickuplocation" type="text" class="form-control"
                                value="{{ $pickuplocation }}" placeholder="City, Airport, Station, etc">
                            @if (!empty($filteredStatesPickup))
                                <ul class="list-group position-absolute w-100" style="z-index: 1000;">
                                    @foreach ($filteredStatesPickup as $state)
                                        <li class="list-group-item list-group-item-action"
                                            wire:click="selectPickupState('{{ $state['name'] }}')">
                                            {{ $state['name'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                    </div> --}}

                    <div class="sorting">
                        <div class="select-container">
                            <input wire:model.live="pickuplocation" type="text" class="form-control"
                                placeholder="Search..." id="searchInput" />
                            @if (count($filteredStatesPickup) > 0)
                                <div class="select-dropdown" id="dropdown" style="display: block;">
                                    @foreach ($filteredStatesPickup as $state)
                                        <div class="select-item"
                                            wire:click="selectPickupState('{{ $state['name'] }}')"
                                            data-value="{{ $state['name'] }}">
                                            {{ $state['name'] }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>



                    <div wire:ignore class="sorting mr-auto">
                        <select class="form-control" onchange="@this.set('carsPerPage', this.value)">
                            <option value="9">Show 9</option>
                            <option value="15">Show 15</option>
                            <option value="21">Show 21</option>
                        </select>
                    </div>



                    <div class="pagination">
                        {{-- Previous Page Link (hide when on the first page) --}}
                        @if (!$cars->onFirstPage())
                            <a href="#" class="prev-arrow" wire:click.prevent="previousPage"><i
                                    class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($cars->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <a href="#" class="dot-dot" wire:click.prevent><i class="fa fa-ellipsis-h"
                                        aria-hidden="true"></i></a>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $cars->currentPage())
                                        <a href="#" class="active">{{ $page }}</a>
                                    @else
                                        <a href="#"
                                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link (hide when on the last page) --}}
                        @if ($cars->hasMorePages())
                            <a href="#" class="next-arrow" wire:click.prevent="nextPage"><i
                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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

                                        <h6 class="mb-0"><a style="color:darkred"
                                                href="#">{{ $car->name }}</a></h6>
                                        <div class="d-flex mb-3"><span class="cat">{{ $car->type->name }}</span>
                                            <p class="price ml-auto">{{ $car->daily_rate }}<span>/day</span></p>
                                        </div>
                                        <div class="brand">
                                            <h6>{{ $car->brand->name }}</h6>
                                            <input type="hidden" name="state_name" value="{{ $car->state->name }}">

                                        </div>
                                        <div class="prd-bottom">
                                            <a href="" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">view more</p>
                                            </a>
                                            {{-- <a href="javascript:void(0)" wire:click="RentCar({{ $car->id }})"
                                                class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Rent This.</p>
                                            </a> --}}
                                            <a href="javascript:void(0)"
                                                wire:click="openRentModal({{ $car->id }})" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Rent This</p>
                                            </a>

                                            {{-- <a href="" class="social-info">
                                                <span class="lnr lnr-heart"></span>
                                                <p class="hover-text">Wishlist</p>
                                            </a> --}}
                                            {{-- <a href="" class="social-info">
                                                <span class="lnr lnr-sync"></span>
                                                <p class="hover-text">compare</p>
                                            </a> --}}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Modal Structure -->

                        <div wire:ignore.self class="modal fade" id="rentCarModal" tabindex="-1" role="dialog"
                            aria-labelledby="rentCarModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rentCarModalLabel">Rent
                                            {{ $selectedCarName }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body" id="modalId">
                                        <form wire:submit.prevent="checkout">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="row">
                                                <!-- Pick-up Date with Datepicker (Col 6) -->
                                                <div class="form-group col-md-6">
                                                    <label for="pickUpDate" class="label">Pick-up Date</label>
                                                    <input wire:model="pickUpDate" type="text"
                                                        class="form-control datepicker" {{-- id="book_pick_date" --}}
                                                        placeholder="Date" data-date-autoclose="true"
                                                        data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                                                        readonly
                                                        onchange="this.dispatchEvent(new InputEvent('input'))">
                                                </div>

                                                <!-- Drop-off Date with Datepicker (Col 6) -->
                                                <div class="form-group col-md-6">
                                                    <label for="dropOffDate" class="label">Drop-off Date</label>
                                                    <input wire:model="dropOffDate" type="text"
                                                        class="form-control datepicker" {{-- id="book_off_date" --}}
                                                        placeholder="Date" data-date-autoclose="true"
                                                        data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                                                        readonly
                                                        onchange="this.dispatchEvent(new InputEvent('input'))">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Pickup Location (Col 6) -->
                                                <div class="form-group col-md-6">
                                                    <label for="pickuplocation">Pick-up Location</label>
                                                    <input type="text" id="pickuplocation"
                                                        wire:model="pickuplocation" class="form-control" required
                                                        readonly>
                                                </div>

                                                <!-- Drop-off Location (Col 6) -->
                                                <div class="form-group col-md-6">
                                                    <label for="dropofflocation">Drop-off Location</label>
                                                    <input type="text" id="dropofflocation"
                                                        wire:model="dropofflocation" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Name (Col 6) -->
                                                <div class="form-group col-md-6">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="name" wire:model="name"
                                                        class="form-control" required>
                                                </div>

                                                <!-- Phone (Col 6) -->
                                                <div class="form-group col-md-6">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" id="phone" wire:model="phone"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" wire:model="email"
                                                    class="form-control" required>
                                            </div>

                                            <!-- Car Details -->
                                            <div class="mb-3">
                                                <p><strong>Car Name:</strong> {{ $selectedCarName }}</p>
                                                <p><strong>Price:</strong> {{ $selectedCarPrice }} per day</p>
                                            </div>

                                            <div class="g-recaptcha mt-4"
                                                data-sitekey="{{ config('services.recaptcha.key') }}"></div>

                                            <!-- Checkout Button -->
                                            <button type="submit" class="btn btn-primary btn-block">Proceed to
                                                Checkout</button>

                                        </form>
                                        @include('frontend.include.error')
                                        @include('frontend.include.success')
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- End Modal Structure -->
                    </div>
                </section>

                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div wire:ignore class="sorting mr-auto">
                        <select class="form-control" onchange="@this.set('carsPerPage', this.value)">
                            <option value="9">Show 9</option>
                            <option value="15">Show 15</option>
                            <option value="21">Show 21</option>
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
                            <a href="#" class="prev-arrow" wire:click.prevent="previousPage"><i
                                    class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($cars->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <a href="#" class="dot-dot" wire:click.prevent><i class="fa fa-ellipsis-h"
                                        aria-hidden="true"></i></a>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $cars->currentPage())
                                        <a href="#" class="active">{{ $page }}</a>
                                    @else
                                        <a href="#"
                                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link (hide when on the last page) --}}
                        @if ($cars->hasMorePages())
                            <a href="#" class="next-arrow" wire:click.prevent="nextPage"><i
                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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
                document.getElementById('upper-value') // 1
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
<script>
    document.getElementById('brandsToggle').addEventListener('click', function() {
        var brandsList = document.getElementById('brandsList');

        if (brandsList.style.display === 'none') {
            brandsList.style.display = 'block';
        } else {
            brandsList.style.display = 'none';
        }
    });
</script>
<script>
    document.getElementById('typesToggle').addEventListener('click', function() {

        var typesList = document.getElementById('typesList');

        if (typesList.style.display === 'none') {
            typesList.style.display = 'block';
        } else {
            typesList.style.display = 'none';
        }

    });
</script>
<script>
    document.addEventListener('show-rent-car-modal', function() {
        $('#rentCarModal').modal('show');
    });
</script>
<script>
    let devToolsOpen = false;

    const checkDevTools = () => {
        const threshold = 160; // Adjust this value based on your needs
        const widthThreshold = window.outerWidth - window.innerWidth > threshold ||
            window.outerHeight - window.innerHeight > threshold;

        if (widthThreshold) {
            devToolsOpen = true;
            document.getElementById('modalId').style.display = 'none'; // Hide your modal
        } else {
            devToolsOpen = false;
            document.getElementById('modalId').style.display = 'block'; // Show your modal
        }
    };

    setInterval(checkDevTools, 1000); // Check every second
</script>
<script>
    const searchInput = document.getElementById('searchInput');
    const dropdown = document.getElementById('dropdown');
    const items = dropdown.getElementsByClassName('select-item');

    searchInput.addEventListener('focus', () => {
        dropdown.classList.add('show');
    });

    searchInput.addEventListener('input', () => {
        const filter = searchInput.value.toLowerCase();
        Array.from(items).forEach(item => {
            if (item.textContent.toLowerCase().includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });

    Array.from(items).forEach(item => {
        item.addEventListener('click', () => {
            searchInput.value = item.textContent; // Set input to selected value
            dropdown.classList.remove('show'); // Hide dropdown
        });
    });

    document.addEventListener('click', (event) => {
        if (!dropdown.contains(event.target) && event.target !== searchInput) {
            dropdown.classList.remove('show'); // Hide dropdown when clicking outside
        }
    });
</script>
