<script src="{{ asset('/js/tracking_snippet.js') }}"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Get your tracking code') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto text-center p-4 bg-gray-800 rounded shadow-lg">
                    <input
                        type="text"
                        class="bg-gray-800 text-white border border-gray-600 rounded p-2 w-full mb-4"
                        id="yomali_js_snippet"
                        value="&lt;script src=&quot;{{ env('APP_URL') }}/tracking_snippet/{{ Auth::user()->id }}&quot;&gt;&lt;/script&gt;"
                        readonly
                    >
                    <button
                        onclick="copySnippet()"
                        id="yomali_copy_status"
                        class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded"
                    >
                        Copy Snippet
                    </button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

