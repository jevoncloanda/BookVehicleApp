<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Vehicle') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('createInvoice' , ['id' => $vehicle->id]) }}" class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @csrf
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicle ID: ') }}{{$vehicle->id}}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vehicle Type: ') }}{{$vehicle->name}}
        </h2>
        <br>
        <h2 class="text-gray-800 dark:text-gray-200 leading-tight">List of Drivers:</h2>
        @foreach ($drivers as $driver)
            <p class="text-gray-800 dark:text-gray-200 leading-tight">{{$driver->name}}</p>
        @endforeach
        <br>
        <!-- Driver Name -->
        <div>
            <x-input-label for="driver_name" :value="__('Assign Driver (Please only assign within list)')" />
            <x-text-input id="driver_name" class="block mt-1 w-full" type="text" name="driver_name" required autofocus autocomplete="driver_name" />
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
        </div>
        <br>
        <h2 class="text-gray-800 dark:text-gray-200 leading-tight">List of Approvers:</h2>
        @foreach ($approvers as $approver)
            <p class="text-gray-800 dark:text-gray-200 leading-tight">{{$approver->name}}</p>
        @endforeach
        <br>
        <!-- Approver Name -->
        <div class="mt-4">
            <x-input-label for="approver_name" :value="__('Assign Approver (Please only assign within list)')" />
            <x-text-input id="approver_name" class="block mt-1 w-full" type="text" name="approver_name" required autocomplete="approver_name" />
        </div>
        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Book') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
