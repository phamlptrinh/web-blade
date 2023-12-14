<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Learners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form method="GET" action=""> <!--de trong nghia la load lai trang do-->
            <select style="float: left;" name = "sort" value = "{{$sort_way}}">
                <option value="">Sort way</option>
                <option value="name" {{ $sort_way == 'name' ? 'selected' : ''}}>Name</option>
                <option value="email" {{ $sort_way == 'email' ? 'selected' : ''}}>Email</option>
                <option value="birth_day" {{ $sort_way == 'birth_day' ? 'selected' : ''}}>Birth day</option>
                <option value="sdt" {{ $sort_way == 'sdt' ? 'selected' : ''}}>Phone Number</option>
            </select>
            <div style="float: left;">
                <label for="find_ten">Name</label>
                <input id="find_ten" type="text" name="ten" value="{{$ten}}"/><br/>
                <label for="find_email">Email</label>
                <input id="find_email" type="text" name="email" value="{{$email}}"/><br/>
                <label>Birth day</label>
                <label for="find_day" value="{{$ngay_sinh_bd}}">from</label>
                <input id="find_day" class="my-datepicker" type="text" name="ngay_sinh_bd" value="{{$ngay_sinh_bd}}"/>
                <label for="find_date" value="{{$ngay_sinh_kt}}">to</label>
                <input id="find_date" class="my-datepicker" type="text" name="ngay_sinh_kt" value="{{$ngay_sinh_kt}}"/><br/>
            </div>                
            <x-danger-button type="submit">Look up</x-danger-button>
            <br style="clear:both;"> 
            <div>CHUA FIND DUOC THEO NGAY RIENG, THANG RIENG</div>
        </form>
        
            <!--<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 text-gray-900 ">-->
                <a href = "/them" class = "inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Them hoc vien</a>
                    
                    <table class="table-auto px-8 py-6">
                        <thead>
                            <tr class="divide-y border-2 border-collapse">
                                <th class="p-3 divide-x border-2">ID</th>
                                <th class="p-3 divide-x border-2">Name</th>
                                <th class="p-3 divide-x border-2">Date of birth</th>
                                <th class="p-3 divide-x border-2">Email</th>
                                <th class="p-3 divide-x border-2">Phone number</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($list_hocvien as $item)
                            <tr class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                                <td class="p-3 divide-x border-2">{{$item->id}}</td>
                                <td class="p-3 divide-x border-2">
                                    <a href="/hoc-vien/sua/{{$item->id}}" class="hover:text-pink-500">{{$item->ten}}</a></td>
                                <td class="p-3 divide-x border-2">{{$item->ngay_sinh}}</td>
                                <td class="p-3 divide-x border-2">{{$item->email}}</td>
                                <td class="p-3 divide-x border-2">{{$item->sdt}}</td> 
                                <td class="p-3 divide-x border-2">
                                    <a href="/hoc-vien/ds-lop/{{$item->id}}" class="hover:text-pink-500">Danh sach lop</a></td>
                                </td> 
                                <td class="p-3 divide-x border-2">
                                    <a href="/them-lop/{{$item->id}}" class="hover:text-pink-500">Ghi danh</a></td>
                                <td>
                                <form method="POST" action="xoa-hoc-vien/{{ $item->id }}">
                                @csrf
                                    <x-danger-button type="submit">Xoa</x-danger-button>
                                </form></td>

                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                        
                    </table>

                    <div class="py-5">{{ $list_hocvien->links() }}</div>
                <!--</div>
            </div>-->
        </div>
    </div>
</x-app-layout>
