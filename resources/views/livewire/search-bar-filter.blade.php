


{{-- 
<section id="search">
    <div class="container search-block p-5">

        <form class="row">


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
                <label for="location" class="label-style text-capitalize form-label">Picking up location</label>
                <div class="input-group date">
                    <input wire:model.live="search_state" type="text" class="form-control p-3 position-relative" id="location"
                     name="pickup_location"   placeholder="Airport or anywhere" />
                </div>
           
                @if($dropdownVisible)
                    <ul class="list-group mt-2 dropdown-menu show" style="position: absolute; z-index: 1000;">
                        @foreach($states as $state)
                            <li class="list-group-item dropdown-item" wire:click="selectState('{{ $state->name }}')">
                                {{ $state->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            
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
            </div> --}}

            {{-- <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <label for="pick-up-date" class="label-style text-capitalize form-label">Picking up date</label>
                <div class="input-group date" id="datepicker1">
                    <input type="text" class="form-control p-3" id="datepicker" />
                    <span class="input-group-append">
                        <span class="search-icon-position position-absolute p-3">
                            <iconify-icon class="search-icons" icon="solar:calendar-broken"></iconify-icon>
                        </span>
                    </span>
                </div>
            </div> --}}

            {{-- <div class="col-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
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
                <label for="location" class="label-style text-capitalize form-label">Dropping off location</label>
                <div class="input-group date">
                    <input wire:model.live="return_search_state" type="text" class="form-control p-3 position-relative" id="location"
                     name="dropoff_location"   placeholder="Airport or anywhere" />
                </div> --}}
           
                {{-- @if($returndropdownVisible)
                    <ul class="list-group mt-2 dropdown-menu show" style="position: absolute; z-index: 1000;">
                        @foreach($states as $state)
                            <li class="list-group-item dropdown-item" wire:click="selectState('{{ $state->name }}')">
                                {{ $state->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif --}}
            {{-- </div>

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
    
</section> --}}




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

{{-- <div class="filter-bar d-flex flex-wrap align-items-center">
    <label for="location" class="label-style text-capitalize form-label">Picking up location</label>
    <div class="input-group date">
        <input wire:model.live="search_state" type="text" class="form-control p-3 position-relative" id="location"
         name="pickup_location"   placeholder="Airport or anywhere" />
    </div>

    @if($dropdownVisible)
        <ul class="list-group mt-2 dropdown-menu show" style="position: absolute; z-index: 1000;">
            @foreach($states as $state)
                <li class="list-group-item dropdown-item" wire:click="selectState('{{ $state->name }}')">
                    {{ $state->name }}
                </li>
            @endforeach
        </ul>
    @endif
</div> --}}






<div class="filter-bar d-flex flex-wrap align-items-center">
    <div class="sorting">
        <input wire:model.live="search_state" type="text" class="sorting" id="location"
         name="pickup_location"   placeholder="Airport or anywhere" />
        <select>
            <option value="1">Default sorting</option>
            <option value="1">Default sorting</option>
            <option value="1">Default sorting</option>
        </select>
    </div>
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