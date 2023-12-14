<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Class') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif    
                <form method="POST" action="/lop/sua-lop">
                    @csrf
                <!-- /resources/views/auth.blade.php -->
                    <input id="id"
                        type="hidden" name="id" value = "{{ $lh->id }}"/>
                    <label for="ten">Name</label>
                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="ten"
                        type="text" name="ten" value = "{{ $lh->ten }}"/><br/>
                    
                    <label for="chi_nhanh">Branch</label>
                    <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="chi_nhanh" id="chi_nhanh" >
                        <option value="{{ $lh -> getChiNhanh ->id }}">{{$lh -> getChiNhanh ->ten}}</option>
                        @foreach($list_cn as $item)
                        <option value="{{ $item -> id }}">{{$item->ten}}</option>
                        @endforeach
                    </select><br/>
                    
                    <label for="giang_vien">Teacher</label>
                    <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="giang_vien" id="giang_vien" value = "{{ $lh->giang_vien_id }}">
                        <option value="{{ $lh -> getGiangVien ->id }}">{{$lh -> getGiangVien ->ten}}</option>
                        @foreach($list_gv as $item)
                            <option value="{{$item->id}}">{{$item->ten}}</option>
                        @endforeach
                    </select><br/>                    
                    <x-primary-button>Edit</x-primary-button>
                    </form>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
