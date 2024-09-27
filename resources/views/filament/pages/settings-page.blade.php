
<x-filament::page>
    <div class="space-y-6">
        <header class="space-y-2 items-start justify-between sm:flex sm:space-y-0 sm:space-x-4  sm:rtl:space-x-reverse sm:py-4">
            <h1 class="text-2xl font-bold tracking-tight md:text-3xl">
                {{ static::$title }}
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Manage and customize your application settings
            </p>
        </header>

        <x-filament::card>
            <form wire:submit.prevent="save" class="space-y-6">
                @csrf

                {{ $this->form }}

                <div class="flex justify-end mt-6">
                    <x-filament::button type="submit" size="lg" class="w-full sm:w-auto">
                        <span class="flex items-center">
                            Save Settings    
                            <x-heroicon-m-check class="w-5 h-5 mr-2" />
                            
                        </span>
                    </x-filament::button>
                </div>
            </form>
        </x-filament::card>
    </div>
</x-filament::page>