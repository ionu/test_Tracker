<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visits') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <!-- Search Form -->
                    <form id="searchForm">
                        <div class="mb-4">
                            <label for="start_date" class="block text-white">Start Date:</label>
                            <input
                                type="datetime-local"
                                id="start_date"
                                name="start_date"
                                class="bg-gray-800 text-white border border-gray-700 rounded p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            >
                        </div>
                        <div class="mb-4">
                            <label for="end_date" class="block text-white">End Date:</label>
                            <input
                                type="datetime-local"
                                id="end_date"
                                name="end_date"
                                class="bg-gray-800 text-white border border-gray-700 rounded p-2 w-full focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                            >
                        </div>
                        <button
                            type="button"
                            onclick="searchVisits()"
                            class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                        >
                            Search
                        </button>
                    </form>

                    <!-- Results Display -->
                    <div id="results" class="mt-6 text-white hidden">
                        <!-- Table Template -->
                        <table class="w-full text-left border-collapse bg-gray-800 rounded-lg shadow-md">
                            <thead>
                            <tr>
                                <th class="p-4 text-white font-semibold text-center">URL</th>
                                <th class="p-4 text-white font-semibold text-center">Unique Visits</th>
                            </tr>
                            </thead>
                            <tr id="resultTemplateRow" class="bg-gray-700 hover:bg-gray-600 rounded-lg hidden text-center">
                                <td class="p-4 visit-url"></td>
                                <td class="p-4 visit-unique-visits"></td>
                            </tr>
                            <!-- Dynamic content will be added here -->
                            <tbody id="resultsBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="{{ asset('/js/visits_display.js') }}"></script>
