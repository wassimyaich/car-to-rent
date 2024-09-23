@php
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
</x-filament-widgets::widget>

{{-- @php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
@endphp

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-end flex-1 mb-4">
            <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
        </div> --}}

        {{-- <div class="mb-4">
            <label for="car-select">Select Car:</label>
            <select id="car-select" wire:model="selectedCar" wire:change="updateCarSelection($event.target.value)">
                <option value="">All Cars</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->license_plate }}</option>
                @endforeach
            </select>
        </div> --}}

        {{-- <div class="filament-fullcalendar" wire:ignore ax-load
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
                eventClassNames: {{ $this->eventClassNames() }},
                eventContent: {{ $this->eventContent() }},
                eventDidMount: {{ $this->eventDidMount() }},
                eventWillUnmount: {{ $this->eventWillUnmount() }},
            })"
          
        >
        </div>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget> --}}
{{-- @php
    $plugin = \Saade\FilamentFullCalendar\FilamentFullCalendarPlugin::get();
@endphp

<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex justify-end flex-1 mb-4">
            <x-filament-actions::actions :actions="$this->getCachedHeaderActions()" class="shrink-0" />
        </div>

        <div class="mb-4">
            <label for="car-select">Select Car:</label>
            <select id="car-select" wire:model="selectedCar" wire:change="updateCarSelection($event.target.value)">
                <option value="">All Cars</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->license_plate }}</option>
                @endforeach
            </select>
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
                eventClassNames: {{ $this->eventClassNames() }},
                eventContent: {{ $this->eventContent() }},
                eventDidMount: {{ $this->eventDidMount() }},
                eventWillUnmount: {{ $this->eventWillUnmount() }},
            })"
            x-init="updateCalendarEvents(@js($events))"
        >
        </div>
    </x-filament::section>

    <x-filament-actions::modals />
</x-filament-widgets::widget>

<script>
    function updateCalendarEvents(events) {
        const calendarEl = document.querySelector('.filament-fullcalendar');
        const calendar = FullCalendar.getInstance(calendarEl); // Initialize or get your FullCalendar instance here

        // Clear current events
        calendar.removeAllEvents();

        // Add new events
        events.forEach(event => {
            calendar.addEvent(event);
        });
    }
</script> --}}
