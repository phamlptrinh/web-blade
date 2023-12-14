<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Branchs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <!--<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 text-gray-900 ">-->
                <a href = "/themchinhanh" class = "inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Thêm Chi nhánh</a>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <table class="">
                        <thead>
                            <tr class="divide-y border-2 border-collapse">
                                <th class="">ID</th>
                                <th class="">Name</th>
                                <th class="">Address</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($list_cn as $item)
                            <tr class="divide-y border-2 bg-gradient-to-r hover:from-teal-200 ..">
                                <td class="">{{$item->id}}</td>
                                <td class="">
                                    <a href="/suachinhanh/{{$item->id}}" class="hover:text-pink-500">{{$item->ten}}</a></td>
                                <td class="">
                                    {{$item->dia_chi}}, phường/xã {{$item->phuong_xa}}, quận/huyện {{$item->quan_huyen}}, tỉnh/tp {{$item->tinh_tp}}</td>
                                <td>
                                <a href="/xoa-chinhanh/{{ $item->id }}" class="hover:text-pink-500">{{$item->id}}</a>
                                    <!-- <form method="POST" action="/xoa-chinhanh/{{ $item->id }}">
                                    @csrf
                                        <x-danger-button type="submit">Xoa</x-danger-button>
                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="py-5">{{ $list_cn->links() }}</div>
                <!--</div>
            </div>-->
        </div>
    </div>
</x-app-layout>
