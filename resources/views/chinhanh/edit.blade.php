<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Branch') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="POST" action="/sua-chinhanh">
                    @csrf
                <!-- /resources/views/auth.blade.php -->
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <label for="ten">Name</label>
                    <input id="ten"
                        type="text" name="ten" value = "{{ $cn->ten }}"/>
                    
                    <label for="dia_chi">Address</label>
                    <input id="address"
                        type="text"
                        name="dia_chi"  value = "{{ $cn->dia_chi }}"/>

                    <label for="phuong_xa">Ward</label>
                    <input id="phuong_xa"
                        type="text" name="phuong_xa" value = "{{ $cn->phuong_xa }}"/>
                    <label for="quan_huyen">District</label>
                    <input id="quan_huyen"
                        type="text" name="quan_huyen" value = "{{ $cn->quan_huyen }}"/>
                    <label for="tinh_tp">City</label>
                    <input id="tinh_tp"
                        type="text" name="tinh_tp" value = "{{ $cn->tinh_tp }}"/>
                    
                    <input id="id"
                        type="hidden" name="id" value = "{{ $cn->id }}"/>

                    <x-primary-button>Edit</x-primary-button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
