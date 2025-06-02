<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">Total Users</h3>
                <p class="mt-2 text-3xl font-semibold text-indigo-600">{{ $totalUsers }}</p>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">Total Events</h3>
                <p class="mt-2 text-3xl font-semibold text-indigo-600">{{ $totalEvents }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
