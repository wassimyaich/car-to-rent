<x-filament-panels::page>

    <div>
        <h1>Car Calendar</h1>
        <div>
            <label for="carFilter">Filter by Car:</label>
            <select id="carFilter">
                <option value="">All Cars</option>
                @foreach($cars as $car)
                <option value="{{ $car->id }}">{{ $car->license_plate }}</option>
            @endforeach
            </select>
        </div>
        <div id="calendar"></div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var carFilter = document.getElementById('carFilter');

            // Initialize the calendar
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($carStatuses),
            });

            // Event listener for the filter
            carFilter.addEventListener('change', function() {
                var selectedCarId = carFilter.value;

                // Filter events based on the selected car
                var filteredEvents = @json($carStatuses).filter(function(event) {
                    return selectedCarId === "" || event.car.id == selectedCarId;
                });

                // Update the calendar with filtered events
                calendar.removeAllEvents(); // Remove all existing events
                calendar.addEventSource(filteredEvents); // Add filtered events
            });

            calendar.render();
        });
    </script>

</x-filament-panels::page>
