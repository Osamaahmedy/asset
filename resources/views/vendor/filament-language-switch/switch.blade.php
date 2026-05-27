<x-filament::dropdown
    teleport
    :placement="$placement"
    :width="'fls-dropdown-width'"
    :max-height="$maxHeight"
    class="fi-dropdown fi-user-menu"
    data-nosnippet="true"
>
    <x-slot name="trigger">
        <button
            type="button"
            class="flex items-center justify-center w-9 h-9 rounded-full text-gray-500 hover:text-gray-700 bg-gray-100 hover:bg-gray-200 dark:text-gray-400 dark:hover:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition-colors duration-75"
            x-tooltip="{
                content: @js(app()->getLocale() === 'ar' ? 'تغيير اللغة' : 'Change Language'),
                theme: $store.theme,
                placement: 'bottom'
            }"
        >
            <!-- A beautiful SVG Globe Icon -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-.778.099-1.533.284-2.253m0 0A17.919 17.919 0 0012 10.5a17.918 17.918 0 008.716-2.247"></path>
            </svg>
        </button>
    </x-slot>

    <x-filament::dropdown.list class="!border-t-0 space-y-1 !p-2.5">
        @foreach ($locales as $locale)
            @if (!app()->isLocale($locale))
                <button
                    type="button"
                    wire:click="changeLocale('{{ $locale }}')"
                    class="flex items-center w-full transition-colors duration-75 rounded-md outline-none fi-dropdown-list-item whitespace-nowrap disabled:pointer-events-none disabled:opacity-70 fi-dropdown-list-item-color-gray hover:bg-gray-950/5 focus:bg-gray-950/5 dark:hover:bg-white/5 dark:focus:bg-white/5 justify-start space-x-2.5 rtl:space-x-reverse p-2"
                >
                    <span class="flex items-center justify-center flex-shrink-0 w-7 h-7 text-xs font-semibold rounded-full bg-primary-500/10 text-primary-600">
                        {{ strtoupper($locale) }}
                    </span>
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-200">
                        {{ $languageSwitch->getLabel($locale) }}
                    </span>
                </button>
            @endif
        @endforeach
    </x-filament::dropdown.list>
</x-filament::dropdown>
