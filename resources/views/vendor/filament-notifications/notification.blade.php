{{-- resources/views/vendor/filament-notifications/notification.blade.php --}}
<div x-data="{ isOpen: true }" x-show="isOpen" @class([
    'filament-notifications-notification',
    match ($getColor()) {
        'danger'
            => 'border-danger-600 bg-danger-500/10 dark:border-danger-500 dark:bg-danger-500/20',
        'gray'
            => 'border-gray-300 bg-gray-50 dark:border-gray-600 dark:bg-gray-700',
        'info'
            => 'border-info-600 bg-info-500/10 dark:border-info-500 dark:bg-info-500/20',
        'primary'
            => 'border-primary-600 bg-primary-500/10 dark:border-primary-500 dark:bg-primary-500/20',
        'success'
            => 'border-success-600 bg-success-500/10 dark:border-success-500 dark:bg-success-500/20',
        'warning'
            => 'border-warning-600 bg-warning-500/10 dark:border-warning-500 dark:bg-warning-500/20',
        default
            => 'border-gray-300 bg-white dark:border-gray-600 dark:bg-gray-800',
    },
]) role="alert">
    <div class="flex items-start w-full gap-3">
        @if ($icon = $getIcon())
            <x-filament::icon :name="$icon" @class([
                'flex-shrink-0 w-5 h-5',
                match ($getIconColor()) {
                    'danger' => 'text-danger-500',
                    'gray' => 'text-gray-400 dark:text-gray-500',
                    'info' => 'text-info-500',
                    'primary' => 'text-primary-500',
                    'success' => 'text-success-500',
                    'warning' => 'text-warning-500',
                    default => 'text-gray-400 dark:text-gray-500',
                },
            ]) />
        @endif

        <div class="grid flex-1 gap-1">
            @if ($title = $getTitle())
                <h5 class="font-medium tracking-tight text-gray-950 dark:text-white">
                    {{ $title }}
                </h5>
            @endif

            @if ($body = $getBody())
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $body }}
                </p>
            @endif

            @if ($actions = $getActions())
                <div class="flex items-center gap-3 mt-3">
                    @foreach ($actions as $action)
                        <button class="approve-button" data-url="{{ $action->getUrl() }}">
                            {{ $action }}
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <button x-on:click="isOpen = false" type="button"
            class="flex-shrink-0 p-1 -m-1 text-gray-400 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 dark:focus:ring-primary-400">
            <x-filament::icon name="heroicon-m-x-mark" class="w-5 h-5" />
        </button>
    </div>
</div>
