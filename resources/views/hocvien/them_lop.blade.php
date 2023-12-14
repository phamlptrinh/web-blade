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
                <form method="POST" action="/hoc-vien/themlop">
                    @csrf
                <!-- /resources/views/auth.blade.php -->

                    <label for="ten">Hoc vien{{$hocvien -> ten}}</label><br/>
                    <input id="ten" type="hidden"
                        type="text" name="id_hocvien" value = "{{$hocvien->id}}"/><br/>
                    
                    <label for="ngay">Register day</label><br/>
                    <input id="ngay" type="date" name="ngay_dang_ky"/><br/>
                    
                    <label>Lop</label><br/>
                    <table class="">
                        <thead>
                        <tr class="divide-y border-2 border-collapse">
                            <th class="">ID</th>
                            <th class="">Name</th>
                            <th class="">Branch</th>
                            <th class="">Teacher</th>
                            <th class="">Level</th>
                            <th class="">Time</th>
                            <th class="">Start date</th>
                            <th class="">End date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                                <td class=""><input type="checkbox" id="lop_id" name="lop_id[]" value="{{$item -> id}}"></td>
                                <td class=""><label >{{$item -> ten}}</label><br/></td>
                                <td class="">{{$item->getChiNhanh->ten}}</td>
                                <td class="">{{$item->getGiangVien->ten}}</td> 
                                <td class="">{{$item->getCapDo->ten}}</td>
                                <td class="">{{$item->thoi_luong}}</td> 
                                <td class="">{{$item->ngay_bat_dau }}</td> 
                                <td class="">{{$item->ngay_ket_thuc }}</td> 
                                <td class=""><a href="/lop/ds-lop/{{$item->id}}" class="hover:text-pink-500">danh sach</td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <x-primary-button>save</x-primary-button>
        
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
