<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            
                <table class="">
                    <thead>
                        <tr class="divide-y border-2 border-collapse">
                            <th class="">ID</th>
                            <th class="">TÊN</th>
                            <th class="">CHI NHÁNH</th>
                            <th class="">GIÁO VIÊN</th>
                            <th class="">CẤP ĐỘ</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($list_lh as $item)
                        <tr class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                            <td class="">{{$item->id}}</td>
                            <td class=""><a href="lop/sua/{{$item->id}}" class="hover:text-pink-500">{{$item->ten}}</a></td>             <!--dang a hre, tinh theo dia chi truy cap url vong quay the gioi-->
                            <td class="">{{($item->getChiNhanh)['ten']}}</td><!--no tu chuyen thuoc tinh thanh ham-->
                            <td class="">{{$item->getGiangVien}}</td> 
                            <td class="">{{$item->getCapDo}}</td>

                            <td class="">{{$item->thoi_luong}}</td> 
                            <td class="">{{$item->ngay_bat_dau}}</td> 
                            <td class="">{{$item->ngay_ket_thuc}}</td> 
                            <td><form method="POST" action="lop/xoa-lop/{{ $item -> id }}"><!--dang form, giong a href /-->
                                @csrf
                                <x-danger-button type="submit"> Delete </x-danger-button></td>
                                </form> 
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="py-5">{{ $list_lh->links() }}</div>
        </div>
    </div>
</x-app-layout>
