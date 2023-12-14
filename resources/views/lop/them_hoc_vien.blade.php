<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add learner') }}
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
                <form method="POST" action="/lop/themhocvien">
                    @csrf
                <!-- /resources/views/auth.blade.php -->

                    <label for="ten">Lop {{$id -> ten}}</label><br/>
                    <input id="ten" type="hidden"
                        type="text" name="id_lop" value = "{{$id->id}}"/><br/>
                    
                    <label for="ngay">Register day</label><br/>
                    <input id="ngay" type="date" name="ngay_dang_ky"/><br/>
                    
                    <label>Hoc Vien</label><br/>
                    @foreach($list as $item)
                    <input type="checkbox" id="hoc_vien_id" name="hoc_vien_id[]" value="{{$item -> id}}">
                    <!--gan1 bien dang mang: a[] = x thi PHP hieu la them tu dong x vao mang-->
                    <label >{{$item -> ten}}</label><br/>
                    @endforeach


                    <x-primary-button>save</x-primary-button>
        
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
