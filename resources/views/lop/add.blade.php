<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Class') }}
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
                <form method="POST" action="them-lop">
                @csrf
                <label for="ten">Name</label>
                    <input class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" id="ten"
                        type="text" name="ten"/><br/>
                    
                    <label for="chi_nhanh">Branch</label>
                    <select name="chi_nhanh" id="chi_nhanh">
                        @foreach($list_cn as $cn)
                            <option value="{{ $cn -> id }}">{{$cn->ten}}</option>
                        @endforeach
                    </select><br/>
                    
                    <label for="giang_vien">Teacher</label>
                    <select name="giang_vien" id="giang_vien">
                        @foreach($list_gv as $cn)
                            <option value="{{$cn->id}}">{{$cn->ten}}</option>
                        @endforeach
                    </select><br/>

                    <x-primary-button>save</x-primary-button>
        
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
