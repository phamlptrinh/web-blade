<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Danh sach lop ') }}{{$lop->ten}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action=""> <!--de trong nghia la load lai trang do-->

                <select name = "sort" value = "{{$sort_way}}">
                    <option value="">Sort way</option>
                    <option value="day" {{ $sort_way == 'day' ? 'selected' : ''}}>Register day</option>
                    <option value="name" {{ $sort_way == 'name' ? 'selected' : ''}}>Name</option>
                    <option value="email" {{ $sort_way == 'email' ? 'selected' : ''}}>Email</option>
                </select><br/>

                <label for="find_ten">Name</label>
                    <input id="find_ten" type="text" name="ten" value="{{$ten}}"/><br/>
                <label for="find_email">Email</label>
                    <input id="find_email" type="text" name="email" value="{{$email}}"/><br/>
                <label>Register day</label>
                <label for="find_day" value="{{$ngay_dk_bd}}">from</label>
                    <input id="find_day" class="my-datepicker" type="text" name="ngay_dk_bd" value="{{$ngay_dk_bd}}"/>
                <label for="find_date" value="{{$ngay_dk_kt}}">to</label>
                    <input id="find_date" class="my-datepicker" type="text" name="ngay_dk_kt" value="{{$ngay_dk_kt}}"/><br/>

            <x-danger-button type="submit">Look up</x-danger-button>
            </form>
                @if($list->isEmpty())
                <div class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                    Lớp {{$lop->ten}} hiện chưa có học viên
                </div>
                @else
                    <table class="">
                        <thead>
                            <tr class="divide-y border-2 border-collapse">
                                <th class="divide-x border-2">ID</th>
                                <th class="divide-x border-2">Name</th>
                                <th class="divide-x border-2">Email</th>
                                <th class="divide-x border-2">Phone number</th>
                                <th class="divide-x border-2">Register day</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($list as $item)
                            <tr class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                                <td class="divide-x border-2">{{$item->id}}</td>
                                <td class="divide-x border-2">
                                    <a href="/suagiangvien/{{$item->id}}" class="hover:text-pink-500">{{$item->ten}}</a></td>
                                    <td class="divide-x border-2">{{$item->email}}</td>
                                    <td class="divide-x border-2">{{$item->sdt}}</td> 
                                    <td class="divide-x border-2">
                                        {{$item->pivot -> created_at -> format('d/m/Y')}}</td>                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif                                
                    <a href = "/lop/them-hoc-vien/{{$lop->id}}" class = "inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Thêm học viên</a>

                <!--</div>
                1. href = "them-hoc-vien/{{$lop->id}}" : .test/lop/ds-lop/them-hoc-vien/5
                2. href = "/them-hoc-vien/{{$lop->id}}" : test/them-hoc-vien/5
                3. href = "lop/them-hoc-vien/{{$lop->id}}" : test/lop/ds-lop/lop/them-hoc-vien/5 vai truong hop o lenh goc thi cach nay van chay dung
                4. href = "/lop/them-hoc-vien/{{$lop->id}}" : test/lop/them-hoc-vien/5 recommended
            </div>-->
        </div>
    </div>
</x-app-layout>
