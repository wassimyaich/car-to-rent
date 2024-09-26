{{-- @php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
@endphp

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-end flex-1 mb-4">
            <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
        </div>

        <div class="filament-fullcalendar" wire:ignore ax-load
            ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-fullcalendar-alpine', 'saade/filament-fullcalendar') }}"
            ax-load-css="{{ \Filament\Support\Facades\FilamentAsset::getStyleHref('filament-fullcalendar-styles', 'saade/filament-fullcalendar') }}"
            x-ignore x-data="fullcalendar({
                locale: @js($plugin->getLocale()),
                plugins: @js($plugin->getPlugins()),
                schedulerLicenseKey: @js($plugin->getSchedulerLicenseKey()),
                timeZone: @js($plugin->getTimezone()),
                config: @js($this->getConfig()),
                editable: @json($plugin->isEditable()),
                selectable: @json($plugin->isSelectable()),
                eventClassNames: {!! htmlspecialchars($this->eventClassNames(), ENT_COMPAT) !!},
                eventContent: {!! htmlspecialchars($this->eventContent(), ENT_COMPAT) !!},
                eventDidMount: {!! htmlspecialchars($this->eventDidMount(), ENT_COMPAT) !!},
                eventWillUnmount: {!! htmlspecialchars($this->eventWillUnmount(), ENT_COMPAT) !!},
            })">
        </div>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget> --}}
{{-- <x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-between mb-4">
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
            <div class="flex justify-end flex-1">
                <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
            </div>
        </div>

        <div class="filament-fullcalendar" wire:ignore ax-load
            ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-fullcalendar-alpine', 'saade/filament-fullcalendar') }}"
            ax-load-css="{{ \Filament\Support\Facades\FilamentAsset::getStyleHref('filament-fullcalendar-styles', 'saade/filament-fullcalendar') }}"
            x-ignore x-data="fullcalendar({
                locale: @js($plugin->getLocale()),
                plugins: @js($plugin->getPlugins()),
                schedulerLicenseKey: @js($plugin->getSchedulerLicenseKey()),
                timeZone: @js($plugin->getTimezone()),
                config: @js($this->getConfig()),
                editable: @json($plugin->isEditable()),
                selectable: @json($plugin->isSelectable()),
                eventClassNames: {!! htmlspecialchars($this->eventClassNames(), ENT_COMPAT) !!},
                eventContent: {!! htmlspecialchars($this->eventContent(), ENT_COMPAT) !!},
                eventDidMount: {!! htmlspecialchars($this->eventDidMount(), ENT_COMPAT) !!},
                eventWillUnmount: {!! htmlspecialchars($this->eventWillUnmount(), ENT_COMPAT) !!},
                
            })">
        </div>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget> --}}

{{-- <x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-between mb-4">
            <div>
                <h1>Car Calendar</h1>
                <div>
                    <label for="carFilter">Filter by Car:</label>
                    <select id="carFilter" wire:model="selectedCar" wire:change="updateCarSelection($event.target.value)">
                        <option value="">All Cars</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->license_plate }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="calendar"></div>
            </div>
            <div class="flex justify-end flex-1">
                <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
            </div>
        </div>

        <div class="filament-fullcalendar" wire:ignore ax-load
             ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-fullcalendar-alpine', 'saade/filament-fullcalendar') }}"
             ax-load-css="{{ \Filament\Support\Facades\FilamentAsset::getStyleHref('filament-fullcalendar-styles', 'saade/filament-fullcalendar') }}"
             x-ignore x-data="fullcalendar({
                 locale: @js($plugin->getLocale()),
                 plugins: @js($plugin->getPlugins()),
                 schedulerLicenseKey: @js($plugin->getSchedulerLicenseKey()),
                 timeZone: @js($plugin->getTimezone()),
                 config: @js($this->getConfig()),
                 editable: @json($plugin->isEditable()),
                 selectable: @json($plugin->isSelectable()),
                 eventClassNames: {!! htmlspecialchars($this->eventClassNames(), ENT_COMPAT) !!},
                 eventContent: {!! htmlspecialchars($this->eventContent(), ENT_COMPAT) !!},
                 eventDidMount: {!! htmlspecialchars($this->eventDidMount(), ENT_COMPAT) !!},
                 eventWillUnmount: {!! htmlspecialchars($this->eventWillUnmount(), ENT_COMPAT) !!},
             })">
        </div>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget> --}}
{{-- 
<script>
document.addEventListener('livewire:load', function () {
    window.addEventListener('refresh-calendar', event => {
        const calendarEl = document.getElementById('calendar');
        
        // Initialize FullCalendar instance if not already done.
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            // Other configurations...
        });

        // Clear existing events and add new ones
        calendar.removeAllEvents();
        
        event.detail.events.forEach(eventData => {
            calendar.addEvent(eventData);
        });
        
        // Render the updated calendar
        calendar.render();
    });
});
</script> --}}
{{-- 
@php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
@endphp
<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-between mb-4">
            <div>
                <h1>Car Calendar</h1>
                <div>
                    <label for="carFilter">Filter by Car:</label>
                    <select id="carFilter" wire:model="selectedCar" wire:change="updateCarSelection($event.target.value)">
                        <option value="">All Cars</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->license_plate }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            <div class="flex justify-end flex-1">
                <input type="text" id="eventTitleFilter" placeholder="Filter by car" class="form-input">
                <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
            </div>
        </div>

        <div id="calendar" class="filament-fullcalendar" wire:ignore ax-load
             ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('filament-fullcalendar-alpine', 'saade/filament-fullcalendar') }}"
             ax-load-css="{{ \Filament\Support\Facades\FilamentAsset::getStyleHref('filament-fullcalendar-styles', 'saade/filament-fullcalendar') }}"
             x-ignore x-data="fullcalendar({
                 locale: @js($plugin->getLocale()),
                 plugins: @js($plugin->getPlugins()),
                 schedulerLicenseKey: @js($plugin->getSchedulerLicenseKey()),
                 timeZone: @js($plugin->getTimezone()),
                 config: @js($this->getConfig()),
                 editable: @json($plugin->isEditable()),
                 selectable: @json($plugin->isSelectable()),
                 eventClassNames: {!! htmlspecialchars($this->eventClassNames(), ENT_COMPAT) !!},
                 eventContent: {!! htmlspecialchars($this->eventContent(), ENT_COMPAT) !!},
                 eventDidMount: {!! htmlspecialchars($this->eventDidMount(), ENT_COMPAT) !!},
                 eventWillUnmount: {!! htmlspecialchars($this->eventWillUnmount(), ENT_COMPAT) !!},
             })">
        </div>
 



</x-filament::section>

<x-filament-actions::modals />
</x-filament-widgets::widget>


<script>
document.addEventListener('livewire:load', function () {
    let calendar; // Declare calendar variable

    window.addEventListener('refresh-calendar', event => {
        const calendarEl = document.getElementById('calendar');

        // Log the event received from Livewire
        console.log('Received refresh-calendar event:', event.detail);

        if (!calendar) {
            console.log('Initializing FullCalendar instance...');
            calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                // Other configurations...
            });
            calendar.render(); // Render the calendar after initializing
            console.log('FullCalendar instance initialized.');
        }

        // Clear existing events and log the action
        console.log('Clearing existing events from the calendar...');
        calendar.removeAllEvents();

        // Add new events and log the action
        event.detail.events.forEach(eventData => {
            console.log('Adding event to calendar:', eventData);
            calendar.addEvent(eventData);
        });

        // Render the updated calendar and log the action
        console.log('Rendering updated calendar...');
        calendar.render();
        console.log('Calendar rendered successfully.');
    });
});
</script> --}}