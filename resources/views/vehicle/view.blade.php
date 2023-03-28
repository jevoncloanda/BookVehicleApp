<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('List of Available Vehicles') }}
            </h2>
        </x-slot>
        @foreach ($vehicles as $vehicle)
            <a href="{{route('getCreateInvoice', ['id' => $vehicle->id])}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>
                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">{{$vehicle->name}} - {{$vehicle->id}}</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        {{$vehicle->gas_consumption}}
                    </p>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        {{$vehicle->service_hours}}
                    </p>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </a>
            <br>
        @endforeach
    </div>
</x-app-layout>
