<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="sua-hoc-vien">
                    @csrf
                <!-- /resources/views/auth.blade.php -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                    <label for="ten">Ten</label>
                    <input id="ten"
                        type="text" name="ten" value = "{{ $item->ten }}"/>
                    
                    <label for="email">Email address</label>
                    <input id="email"
                        type="email"
                        name="email"  value = "{{ $item->email }}">
                    
                    <label for="ngay_sinh">Date of birth</label>
                    <input id="ngay_sinh"
                        type="date"
                        name="ngay_sinh"  value = "{{ $item->ngay_sinh }}">

                    <label for="sdt">So dien thoai</label>
                    <input id="sdt"
                        type="text" name="sdt" value = "{{ $item->sdt }}"/>
                    
                    <input id="id"
                        type="hidden" name="id" value = "{{ $item->id }}"/>

                    <x-primary-button>Edit</x-primary-button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
