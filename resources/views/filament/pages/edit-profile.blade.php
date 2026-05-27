<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Profile Form --}}
        <form wire:submit="updateProfile">
            {{ $this->profileForm }}
            <div class="mt-4 flex justify-end">
                <x-filament::button type="submit" color="primary">
                    {{ __('messages.action.save') }}
                </x-filament::button>
            </div>
        </form>

        {{-- Password Form --}}
        <form wire:submit="updatePassword">
            {{ $this->passwordForm }}
            <div class="mt-4 flex justify-end">
                <x-filament::button type="submit" color="primary">
                    {{ __('messages.action.save') }}
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
