<!-- <form method="GET" action=""> 
                <div style="display:flex;">
                <div>
                    <label for="find_ten">Name</label>
                    <input id="find_ten" type="text" name="ten" value="{{$ten}}"/><br/>
                    <label for="find_cap_do">Level</label>
                    <select id="find_cap_do" name = "cap_do_id" value = "{{$cap_do_id}}">
                    <option value=""> </option>
                    @foreach($list_cd as $item)
                    <option value="{{$item -> id}}" {{ $cap_do_id == $item -> id ? 'selected' : ''}}>{{$item -> ten}}</option>
                    @endforeach
                </select>
                <label style="margin-left: 10px;"for="thoi_luong">Time</label>
                    <select name="thoi_luong" id="thoi_luong">
                        <option value=""> </option>
                        @for($i = 45; $i <= 225;$i+=45)
                            <option value="{{$i}}" {{$thoi_luong == $i ? 'selected' : ''}}>{{$i}}</option>
                        @endfor
                    </select><br/>
                <label for="find_giang_vien">Teacher</label>
                    <input id="find_giang_vien" type="text" name="giang_vien" value="{{$giang_vien}}"/>
                <label style="margin-left: 10px;" for="find_chi_nhanh">Branch</label>
                    <select id="find_chi_nhanh" name = "chi_nhanh_id" value = "{{$chi_nhanh_id}}">
                    <option value=""> </option>
                    @foreach($list_cn as $item)
                    <option value="{{$item -> id}}" {{ $chi_nhanh_id == $item -> id ? 'selected' : ''}}>{{$item -> ten}}</option>
                    @endforeach
                </select><br/>
                <label>Start date</label>
                <label for="ngay_bat_dau_from" value="{{$ngay_bat_dau_from}}">from</label>
                    <input id="ngay_bat_dau_from" class="my-datepicker" type="text" name="ngay_bat_dau_from" value="{{$ngay_bat_dau_from}}"/>
                <label for="ngay_bat_dau_to" value="{{$ngay_bat_dau_to}}">to</label>
                    <input id="ngay_bat_dau_to" class="my-datepicker" type="text" name="ngay_bat_dau_to" value="{{$ngay_bat_dau_to}}"/><br/>

                <label>End date</label>
                <label for="ngay_ket_thuc_from" value="{{$ngay_ket_thuc_from}}">from</label>
                    <input id="ngay_ket_thuc_from" class="my-datepicker" type="text" name="ngay_ket_thuc_from" value="{{$ngay_ket_thuc_from}}"/>
                <label for="ngay_ket_thuc_to" value="{{$ngay_ket_thuc_to}}">to</label>
                    <input id="ngay_ket_thuc_to" class="my-datepicker" type="text" name="ngay_ket_thuc_to" value="{{$ngay_ket_thuc_to}}"/><br/>
                </div>
                <div>
                <select name = "sort" value = "{{$sort}}">
                    <option value="">Sort way</option>
                    <option value="Name" {{ $sort == 'Name' ? 'selected' : ''}}>Name</option>
                    <option value="Teacher" {{ $sort == 'Teacher' ? 'selected' : ''}}>Teacher</option>
                    <option value="Branch" {{ $sort == 'Branch' ? 'selected' : ''}}>Branch</option>
                    <option value="Level" {{ $sort == 'Level' ? 'selected' : ''}}>Level</option>
                    <option value="Time" {{ $sort == 'Time' ? 'selected' : ''}}>Time</option>
                    <option value="Start date" {{ $sort == 'Start date' ? 'selected' : ''}}>Start date</option>
                    <option value="End date" {{ $sort == 'End date' ? 'selected' : ''}}>End date</option>
                    <option value="Register day" {{ $sort == 'Register day' ? 'selected' : ''}}>Register day</option
                </select><br/>
                <x-danger-button type="submit">Look up</x-danger-button><br/>
                <a href = "lop/them" class = "inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 
                dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Thêm lớp</a>
                </div>
                </div>
            </form>   -->