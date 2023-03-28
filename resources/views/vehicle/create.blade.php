<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Vehicle') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('createVehicle') }}" class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @csrf

        <!-- Vehicle Name -->
        <div>
            <x-input-label for="name" :value="__('Vehicle Type (Example: Bulldozer)')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
        </div>

        <!-- Gas Consumption -->
        <div class="mt-4">
            <x-input-label for="gas_consumption" :value="__('Gas Consumption (Example: 241 Litre/Hour)')" />
            <x-text-input id="gas_consumption" class="block mt-1 w-full" type="text" name="gas_consumption" required autocomplete="gas_consumption" />
        </div>

        <!-- Service Hours -->
        <div class="mt-4">
            <x-input-label for="service_hours" :value="__('Service Hours (Example: 09.00 - 15.00)')" />
            <x-text-input id="service_hours" class="block mt-1 w-full" type="text" name="service_hours" required autocomplete="service_hours" />
        </div>
        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
