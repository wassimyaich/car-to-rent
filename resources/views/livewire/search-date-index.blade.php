{{-- <div>
    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  						<form action="#" class="request-form ftco-animate bg-primary">
		          		<h2>Make your trip</h2>
			    				<div class="form-group">
			    					<label for="" class="label">Pick-up location</label>
			    					<input wire:model.live="pickupLocation" type="text" class="form-control" placeholder="City, Airport, Station, etc">
			    				</div>
			    				<div class="form-group">
			    					<label for="" class="label">Drop-off location</label>
			    					<input wire:model.live="dropoffLocation" type="text" class="form-control" placeholder="City, Airport, Station, etc">
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
			                <label for="" class="label">Pick-up date</label>
			                <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
			              </div>
			              <div class="form-group ml-2">
			                <label for="" class="label">Drop-off date</label>
			                <input type="text" class="form-control" id="book_off_date" placeholder="Date">
			              </div>
		              </div>
		              <div class="form-group">
		                <label for="" class="label">Pick-up time</label>
		                <input type="text" class="form-control" id="time_pick" placeholder="Time">
		              </div>
			            <div class="form-group">
			              <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
			            </div>
			    			</form>
	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>
</div>
 --}}



<div>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form wire:submit.prevent="rentCarNow"
                                class="request-form ftco-animate bg-primary fadeInUp ftco-animated">

                                <h2>Make your trip</h2>
                                <div class="form-group">
                                    <label for="" class="label">Pick-up location</label>
                                    <div class="position-relative">
                                        <input wire:model.live="pickupLocation" type="text" class="form-control"
                                            placeholder="City, Airport, Station, etc">
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
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Drop-off location</label>
                                    <div class="position-relative">
                                        <input wire:model.live="dropoffLocation" type="text" class="form-control"
                                            placeholder="City, Airport, Station, etc">
                                        @if (!empty($filteredStatesDropoff))
                                            <ul class="list-group position-absolute w-100" style="z-index: 1000;">
                                                @foreach ($filteredStatesDropoff as $state)
                                                    <li class="list-group-item list-group-item-action"
                                                        wire:click="selectDropoffState('{{ $state['name'] }}')">
                                                        {{ $state['name'] }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Pick-up date</label>
                                        <input wire:model="pickupDate" type="text" class="form-control datepicker"
                                            autocomplete="off" id="book_pick_date" placeholder="Date"
                                            {{-- data-provide="datepicker"  --}}
											data-date-autoclose="true"
                                            data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                                            onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Drop-off date</label>
                                        <input wire:model="dropoffDate" type="text" class="form-control datepicker"
                                            id="book_off_date" placeholder="Date" 
                                            {{-- data-provide="datepicker"  --}}

                                            data-date-autoclose="true" data-date-format="mm/dd/yyyy"
                                            data-date-today-highlight="true"
                                            onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Pick-up time</label>
                                    <input wire:model.live="pickupTime" type="text" class="form-control"
                                        id="time_pick" placeholder="Time">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                                </div>
                            </form>
							@include('frontend.include.success')
							@include('frontend.include.error')
                        </div>
                        <div wire:ignore class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Select the Best Deal</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.addEventListener('livewire:load', function() {

        flatpickr("#book_pick_date", {
            enableTime: false,
            dateFormat: "mm/dd/yyyy",
            onChange: function(selectedDates, dateStr) {
                @this.set('pickupDate', dateStr); // Set pickupDate in Livewire
            }
        });

        flatpickr("#book_off_date", {
            enableTime: false,
            dateFormat: "mm/dd/yyyy",
            onChange: function(selectedDates, dateStr) {
                @this.set('dropoffDate', dateStr); // Set dropoffDate in Livewire
            }
        });

        flatpickr("#time_pick", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            onChange: function(selectedDates, dateStr) {
                @this.set('pickupTime', dateStr); // Set pickupTime in Livewire
            }
        });
    });
</script>
{{-- <script>
    $('#book_pick_date,#book_off_date').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });
    $('#time_pick').timepicker();
</script> --}}
