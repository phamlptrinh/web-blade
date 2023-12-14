<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Level') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="/them-capdo">
                    @csrf
                <!-- /resources/views/auth.blade.php -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <label for="ten">Name</label>
                <input id="ten" type="text" name="ten"/>
                
                <label for="ghi_chu">Note</label>
                <input id="ghi_chu" type="text" name="ghi_chu"/>

                <x-primary-button>save</x-primary-button>
        
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>