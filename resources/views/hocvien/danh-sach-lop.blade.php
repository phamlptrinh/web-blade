<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh sach cac lop ') }}{{$hocvien->ten}}{{ __(' da ghi danh') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action=""> <!--de trong nghia la load lai trang do-->

                <select name = "sort" value = "{{$sort_way}}">
                    <option value="">Sort way</option>
                    <option value="day" {{ $sort_way == 'day' ? 'selected' : ''}}>Register day</option>
                    <option value="name" {{ $sort_way == 'name' ? 'selected' : ''}}>Name</option>
                    <option value="st_day" {{ $sort_way == 'st_day' ? 'selected' : ''}}>Start day</option>
                    <option value="en_day" {{ $sort_way == 'en_day' ? 'selected' : ''}}>End day</option>
                </select><br/>

                <label for="find_ten">Name</label>
                    <input id="find_ten" type="text" name="ten" value="{{$ten}}"/><br/>
                <label for="find_chi_nhanh">Branch</label>
                    <input id="find_chi_nhanh" type="text" name="chi_nhanh" value="{{$chi_nhanh}}"/><br/>
                <label>Register day</label>
                <label for="find_day" value="{{$ngay_dk_bd}}">from</label>
                    <input id="find_day" class="my-datepicker" type="text" name="ngay_dk_bd" value="{{$ngay_dk_bd}}"/>
                <label for="find_date" value="{{$ngay_dk_kt}}">to</label>
                    <input id="find_date" class="my-datepicker" type="text" name="ngay_dk_kt" value="{{$ngay_dk_kt}}"/><br/>

            <x-danger-button type="submit">Look up</x-danger-button>
            </form>
        
            <!--<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 text-gray-900 ">-->
                    
                    @if($list->isEmpty())
                    <div class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                        Hoc vien {{$hocvien->ten}} hiện chưa ghi danh lop nao.
                    </div>
                    @else
                        <table class="table-auto px-8 py-6">
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
                                <th class="">Register day</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($list as $item)
                                <tr class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                                    <td class="">{{$item->id}}</td>
                                    <td class=""><a href="/lop/sua/{{$item->id}}" class="hover:text-pink-500">{{$item->ten}}</a></td><!--dang a hre, tinh theo dia chi truy cap url vong quay the gioi-->
                                    <td class="">{{$item->getChiNhanh->ten}}</td><!--no tu chuyen thuoc tinh thanh ham-->
                                    <td class="">{{$item->getGiangVien->ten}}</td> 
                                    <td class="">{{$item->getCapDo->ten}}</td>
                                    <td class="">{{$item->thoi_luong}}</td> 
                                    <td class="">{{$item->ngay_bat_dau}}</td> 
                                    <td class="">{{$item->ngay_ket_thuc}}</td> 
                                    <td class=""><a href="/lop/ds-lop/{{$item->id}}" class="hover:text-pink-500">danh sach</td> 
                                    <td class=""><a href="/lop/them-hoc-vien/{{$item->id}}" class="hover:text-pink-500">them hoc vien</td>  
                                    <td class="divide-x border-2">
                                        {{$item -> pivot -> created_at -> format('d/m/Y')}}</td> 
                                    <!--laravel tu chuyen created at va updated at theo Concat-->
                                    <td><form method="POST" action="/hoc-vien/xoalop/{{$hocvien->id}}/{{$item->id}}">
                                        @csrf
                                        <x-danger-button type="submit">Xoa</x-danger-button>
                                    </form></td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif                                
                        <a href = "/hoc-vien/them-lop/{{$hocvien->id}}" class = "inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Ghi danh moi</a>

                <!--</div>
                1. href = "them-hoc-vien/{$lop->id}}" : .test/lop/ds-lop/them-hoc-vien/5
                2. href = "/them-hoc-vien/{$lop->id}}" : test/them-hoc-vien/5
                3. href = "lop/them-hoc-vien/{$lop->id}}" : test/lop/ds-lop/lop/them-hoc-vien/5 vai truong hop o lenh goc thi cach nay van chay dung
                4. href = "/lop/them-hoc-vien/{$lop->id}}" : test/lop/them-hoc-vien/5 recommended
            </div>-->
        </div>
    </div>
</x-app-layout>
