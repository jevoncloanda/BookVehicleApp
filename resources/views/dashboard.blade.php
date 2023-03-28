<x-app-layout>
    @if ($user->role == 'Admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                {!! $vehicle_chart->container() !!}
                {!! $vehicle_chart->script() !!}
            </div>
            <a href="{{route('getCreateVehicle')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Create New Vehicle</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">

                    </p>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </a>
            <br>
            <a href="{{route('getVehicles')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Book a Vehicle</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">

                    </p>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </a>
            <br>
            <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                {!! $invoice_chart->container() !!}
                {!! $invoice_chart->script() !!}
            </div>
            <a href="{{route('getInvoices')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">See All Invoice(s)</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">

                    </p>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </a>
            <br>
            <a href="{{route('getPendingInvoices')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">See Pending Invoice(s)</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">

                    </p>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </a>
            <br>
            <form method="GET" action="{{route('exportInvoice')}}">
                @csrf
                <x-primary-button class="ml-4">
                    {{ __('Export') }}
                </x-primary-button>
            </form>
        </div>
    </div>
    @else
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Approver Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
                {!! $user_invoice_chart->container() !!}
                {!! $user_invoice_chart->script() !!}
            </div>
            <a href="{{route('getAwaitingApproval')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Invoice(s) Awaiting Approval</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">

                    </p>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </a>
            <br>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('getInvoicesPerApprover')}}" class="scale-100 p-6 bg-white dark:bg-gray-800/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div>

                    <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Invoice(s) List</h2>

                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">

                    </p>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </a>
            <br>

        </div>
    </div>
    @endif
</x-app-layout>
