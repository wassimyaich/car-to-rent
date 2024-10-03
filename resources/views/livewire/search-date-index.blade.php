<div>
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form wire:submit.prevent="rentCarNow" id="car-rent-form"
                                class="request-form ftco-animate bg-primary fadeInUp ftco-animated">

                                <h2>Make your trip</h2>
                                {{-- <div class="form-group">
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
                                </div> --}}
                                {{-- start change --}}

                                <div class="form-group">
                                    <label for="" class="label">Pick-up location</label>
                                    <div class="position-relative">
                                        <input id="pickupLocation" type="text" class="form-control"
                                            placeholder="City, Airport, Station, etc">
                                        <ul id="pickupSuggestions" class="list-group position-absolute w-100"
                                            style="z-index: 1000;"></ul>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Drop-off location</label>
                                    <div class="position-relative">
                                        <input id="dropoffLocation" type="text" class="form-control"
                                            placeholder="City, Airport, Station, etc">
                                        <ul id="dropoffSuggestions" class="list-group position-absolute w-100"
                                            style="z-index: 1000;"></ul>
                                    </div>
                                </div>


                                {{-- end changes       --}}
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Pick-up date</label>
                                        <input wire:model="pickupDate" type="text" class="form-control datepicker"
                                            autocomplete="off" id="book_pick_date" placeholder="Date"
                                            {{-- data-provide="datepicker"  --}} data-date-autoclose="true"
                                            data-date-format="mm/dd/yyyy" data-date-today-highlight="true"
                                            onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Drop-off date</label>
                                        <input wire:model="dropoffDate" type="text" class="form-control datepicker"
                                            id="book_off_date" placeholder="Date" {{-- data-provide="datepicker"  --}}
                                            data-date-autoclose="true" data-date-format="mm/dd/yyyy"
                                            data-date-today-highlight="true"
                                            onchange="this.dispatchEvent(new InputEvent('input'))">
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Pick-up time</label>

                                        <input wire:model="pickuptime" type="time" id="time_picker"
                                            class="form-control" value="10:05 AM" />
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Drop-off time</label>

                                        <input wire:model="dropofftime" type="time" id="time_drop"
                                            class="form-control" value="10:05 AM" />
                                    </div>
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
                                <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a>
                                </p>
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

        flatpickr("#time_picker", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            onChange: function(selectedDates, dateStr) {
                @this.set('pickuptime', dateStr); // Set pickuptime in Livewire
            }
        });

        flatpickr("#time_drop", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            onChange: function(selectedDates, dateStr) {
                @this.set('dropofftime', dateStr); // Set dropofftime in Livewire
            }
        });
    });
</script>
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const pickupInput = document.getElementById('pickupLocation');
        const dropoffInput = document.getElementById('dropoffLocation');
        const pickupSuggestions = document.getElementById('pickupSuggestions');
        const dropoffSuggestions = document.getElementById('dropoffSuggestions');

        pickupInput.addEventListener('input', function() {
            fetchSuggestions(pickupInput.value, 'pickup');
        });

        dropoffInput.addEventListener('input', function() {
            fetchSuggestions(dropoffInput.value, 'dropoff');
        });

        function fetchSuggestions(query, type) {
            if (query.length < 2) {
                return; // Avoid fetching suggestions for short queries
            }

            fetch(`/api/suggestions?type=${type}&query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const suggestions = type === 'pickup' ? pickupSuggestions : dropoffSuggestions;
                    suggestions.innerHTML = ''; // Clear previous suggestions
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item list-group-item-action';
                        li.textContent = item
                            .name; // Assuming the API returns an array of objects with a 'name' property
                        li.onclick = () => {
                            if (type === 'pickup') {
                                pickupInput.value = item.name;
                            } else {
                                dropoffInput.value = item.name;
                            }
                            suggestions.innerHTML = ''; // Clear suggestions after selection
                        };
                        suggestions.appendChild(li);
                    });
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        }
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pickupInput = document.getElementById('pickupLocation');
        const dropoffInput = document.getElementById('dropoffLocation');
        const pickupSuggestions = document.getElementById('pickupSuggestions');
        const dropoffSuggestions = document.getElementById('dropoffSuggestions');

        // Fetch suggestions for pickup location
        pickupInput.addEventListener('input', function() {
            fetchSuggestions(pickupInput.value, 'pickup');
        });

        // Fetch suggestions for drop-off location
        dropoffInput.addEventListener('input', function() {
            fetchSuggestions(dropoffInput.value, 'dropoff');
        });

        // Function to fetch suggestions from the server
        function fetchSuggestions(query, type) {
            if (query.length < 2) {
                return; // Avoid fetching suggestions for short queries
            }

            fetch(`/api/suggestions?type=${type}&query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const suggestions = type === 'pickup' ? pickupSuggestions : dropoffSuggestions;
                    suggestions.innerHTML = ''; // Clear previous suggestions
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.className = 'list-group-item list-group-item-action';
                        li.textContent = item
                            .name; // Assuming the API returns an array of objects with a 'name' property
                        li.onclick = () => {
                            if (type === 'pickup') {
                                pickupInput.value = item.name;
                            } else {
                                dropoffInput.value = item.name;
                            }
                            suggestions.innerHTML = ''; // Clear suggestions after selection
                        };
                        suggestions.appendChild(li);
                    });
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        }

        // Handle form submission
        document.getElementById('car-rent-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Send data to Livewire
            @this.set('pickupLocation', pickupInput.value);
            @this.set('dropoffLocation', dropoffInput.value);

            // Call your Livewire method to process the rental logic
            @this.call('rentCarNow');

            // Optionally reset input fields or handle UI changes after submission
            pickupInput.value = '';
            dropoffInput.value = '';
            pickupSuggestions.innerHTML = '';
            dropoffSuggestions.innerHTML = '';
        });
    });
</script>
