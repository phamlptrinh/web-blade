<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Learners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <form id="formA" method="GET" action=""> <!--de trong nghia la load lai trang do-->
            <select id="sort" style="float: left;" name = "sort" value = "{{$sort_way}}">
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
                <input id="ngay_sinh_bd" class="my-datepicker" type="text" name="ngay_sinh_bd" value="{{$ngay_sinh_bd}}"/>
                <label for="find_date" value="{{$ngay_sinh_kt}}">to</label>
                <input id="ngay_sinh_kt" class="my-datepicker" type="text" name="ngay_sinh_kt" value="{{$ngay_sinh_kt}}"/><br/>
            </div>                
            <x-danger-button id="x-danger-button" type="submit">Look up</x-danger-button>
            <br style="clear:both;"> 
            <div>CHUA FIND DUOC THEO NGAY RIENG, THANG RIENG</div>
        </form>
        
            <!--<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            
                <div class="p-6 text-gray-900 ">-->
                <a href = "#" id="btn_add" class = "inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Add learner</a>                    
                    <table id="main_tb" class="table-auto px-8 py-6">
                        <thead>
                            <tr class="divide-y border-2 border-collapse">
                                <th class="p-3 divide-x border-2">ID</th>
                                <th class="p-3 divide-x border-2">Name</th>
                                <th class="p-3 divide-x border-2">Date of birth</th>
                                <th class="p-3 divide-x border-2">Email</th>
                                <th class="p-3 divide-x border-2">Phone number</th>
                            </tr>
                        </thead>

                        <tbody></tbody>                      
                    </table>

                    <!-- <div class="py-5">{{ $list_hocvien->links() }}</div> -->
                    <div class="py-5 old-pagination"></div>
                    <div class="py-4 my-pagination-1"></div> 
                    <div class="py-4 my-pagination-2"></div> 
                    <input type="hidden" id="current-page" value="1" /> 
                <!--</div>
            </div>-->
        </div>
    </div>

    <!--modal-->
    <div id="my-modal" class="ldcv">
        <div class="base w-1/2">    <!-- optional. control the position of dialog -->
            <div class="inner"> <!-- dialog body. transition happens here -->
           <!--  your content here... -->
                <form method="POST" action="#">
                    @csrf
                    <label for="tenU">Ten</label>
                    <input id="tenU" class="input-simple" type="text" name="ten" />
                    <br/>
                    <label for="emailU">Email address</label>
                    <input id="emailU" class="input-simple" type="email" name="email" >
                    <br/>
                    <label for="ngay_sinhU">Date of birth</label>
                    <input id="ngay_sinhU" class="input-simple" type="date" name="ngay_sinh" >
                    <br/>
                    <label for="sdtU">So dien thoai</label>
                    <input id="sdtU" class="input-simple" type="text" name="sdt" />
                    <br/>
                    <input id="idU"
                        type="hidden" name="id" />

                    <x-primary-button id="btn_update">Update</x-primary-button>
                    </form>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        let table = document.querySelector("#main_tb");
        let tableBody = table.querySelector('tbody');
        let form = document.querySelector('#formA');
        let paginationT = document.querySelector('.old-pagination');
        let pagination1 = document.querySelector('.my-pagination-1');
        let pagination2 = document.querySelector('.my-pagination-2');
        let currentPageElement = document.querySelector('#current-page');
        let btn_look_up = document.querySelector('#x-danger-button');
        let modalUpdate = document.querySelector('#my-modal');
        let formU = modalUpdate.querySelector('form');
        let tenU = formU.querySelector('#tenU');
        let emailU = formU.querySelector('#emailU');
        let sdtU = formU.querySelector('#sdtU');
        let ngay_sinhU = formU.querySelector('#ngay_sinhU');
        let idU = formU.querySelector('#idU');
        let btn_update = formU.querySelector('#btn_update');
        let btn_add = document.querySelector('#btn_add');
        
        var ldcv = new ldcover({root: ".ldcv"});

        let item;

/* -----------------Function------------------------------- */
        /* -----------Get&CreateHTML-------------- */

        function getSearchFormInput(){
            let sort_wayA = form.querySelector("#sort");
            let tenA = form.querySelector("#find_ten");
            let emailA = form.querySelector("#find_email");
            console.log(tenA);
            let ngay_sinh_bdA = form.querySelector("#ngay_sinh_bd");
            let ngay_sinh_ktA = form.querySelector("#ngay_sinh_kt");
            return {
                sort : sort_wayA.value,
                ten : tenA.value,
                email : emailA.value,
                ngay_sinh_bd : ngay_sinh_bdA.value,
                ngay_sinh_kt : ngay_sinh_ktA.value,
            }
        }

        function getUpdateFormInput(){
            console.log(tenU);
            item = {id : idU.value, 
                    ten : tenU.value, 
                    email : emailU.value, 
                    sdt : sdtU.value, 
                    ngay_sinh : ngay_sinhU.value};
            return item;
        }

        function setUpdateFormInput(item){
            tenU.value = item.ten ?? "";
            sdtU.value = item.sdt ?? "";
            ngay_sinhU.value = item.ngay_sinh ?? "";
            emailU.value = item.email ?? "";
            idU.value = item.id ?? "";
        }

        function taoBang(data){
            let list = data.list.data;
            let html = '';
            list.forEach((item)=>{
                html += '<tr>'; 
                html += `<td class="px-6 py-4 whitespace-nowrap">${ item.id }</td>`; 
                html += `<td class="px-6 py-4 whitespace-nowrap"><a class="text-blue-500" href="/giang-vien/edit/${ item.id }">${ item.ten }</a></td>`; 
                html += `<td class="px-6 py-4 whitespace-nowrap">${ item.ngay_sinh }</td>`; 
                html += `<td class="px-6 py-4 whitespace-nowrap">${ item.email }</td>`; 
                html += `<td class="px-6 py-4 whitespace-nowrap">${ item.sdt }</td>`; 
                html += `<td class="px-6 py-4 whitespace-nowrap">`;
                html += '<a href="#" onclick="ldcv.toggle()" class="updItem hover:text-pink-500" data-id="'+item.id+'">Edit</a>'
                html += '</td>'; 
                html += `<td class="px-6 py-4 whitespace-nowrap">`;
                html += `<a href="#" class="delItem hover:text-pink-500" data-id=" ${ item.id } ">Delete</a>`
                html += '</td>'; 
                html += '</tr>'; 
            });
            console.log("3");
            tableBody.innerHTML = html; 
            //pagination1.innerHTML = data.pagination; 
            pagination2.innerHTML = taoPagination(data); 
        }

        function taoPagination(data){
            let currentPage = data.list.current_page;
            let lastPage = data.list.last_page;
            let previousPage = currentPage > 1 ? currentPage -1 : currentPage;
            let nextPage = currentPage < lastPage ? currentPage +1 : currentPage;
            let pageItemClass = 'pagination-item relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150'; 
            let html = '<span class="relative z-0 inline-flex shadow-sm rounded-md">'; 
            html += `<a href="#" class="${pageItemClass}" aria-label="Go to page ${previousPage}" data-page="${previousPage}"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg></a>`; 
            for (let i = 1; i <= lastPage; i++) { 
                html += `<a href="#" class="${pageItemClass}" aria-label="Go to page ${i}" data-page="${i}">${i}</a>`; 
            } 
            html += `<a href="#" class="${pageItemClass}" aria-label="Go to page ${nextPage}" data-page="${nextPage}"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></a>`; 
            html += '</span>'; 
            return html; 
        }

        /* -----------Handle Request-------------- */       
        function loadData(page){
            console.log("1");
            let formInputs = getSearchFormInput();
            axios({
                method: 'get',
                url: '/hoc-vien/get-list-hv',
                params: {
                    pageSize: 5,
                    page: page, 
                    ten: formInputs.ten, 
                    email: formInputs.email, 
                    ngay_sinh_bd: formInputs.ngay_sinh_bd, 
                    ngay_sinh_kt: formInputs.ngay_sinh_kt, 
                    sort: formInputs.sort, 
                }
            }).then((response)=>{taoBang(response.data);});
        }

        function loadDataForm(id){
            axios({
                method: 'get',
                url: '/hoc-vien/sua-hv',
                params: {
                    id: id, 
                }
            }).then((response)=>{
                item = response.data.item;
                console.log(item);
                setUpdateFormInput(item);
                ldcv.toggle(true);//set true for undisappearence after function finishing.
            });
        }

        function update(item){
            axios({
                method: 'post',
                url: '/hoc-vien/sua-hv',
                data: {
                    id: item.id, 
                    ten: item.ten, 
                    email: item.email, 
                    sdt: item.sdt, 
                    ngay_sinh: item.ngay_sinh, 
                }
            }).then((response)=>{
                successful(response.data.result);
                loadData(1);
            });
        }

        function add(item){
            axios({
                method: 'post',
                url: '/hoc-vien/them-hv',
                data: {
                    ten: item.ten, 
                    email: item.email, 
                    sdt: item.sdt, 
                    ngay_sinh: item.ngay_sinh, 
                }
            }).then((response)=>{
                successful(response.data.result);
                loadData(1);
            });
        }

        function delAndLoad(id){
            axios({
                method: 'post',
                url: '/hoc-vien/xoa-hv',
                data: {
                    id: id, 
                }
            }).then((response)=>{
                successful(response.data.result);
                loadData(1);//if put this funtion out of then function,
                //AJAX will auto reload even thought deletion has not been done yet.
            });

        }

        /* -----------More-------------- */ 
        function confirm(id){//should create a array to unlimit parameter
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f15e24',
                cancelButtonColor: '#64acce',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    delAndLoad(id);
                }
                })
        }

        function successful(result){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: result,
                showConfirmButton: false,
                timer: 1500
            })
        }

    /* -------------------EventListener----------------------------- */

        window.addEventListener("load", (event)=>{
            loadData(1);
        });

        btn_update.addEventListener('click', function(e){
            e.preventDefault();
            getUpdateFormInput();
            if(item.id){
                update(item);//item da co in4 bang ham getUpdateFormInput
            }
            else {add(item);}
            ldcv.toggle();
        })

        pagination1.addEventListener('click', function(e){ //IMPORTANT
            e.preventDefault();
            let link = e.target.closest('.pagination-item');
            if (link) {
                let currentPage = link.dataset.page;//để check xem cái bấm đó có phải là cái mình thật sự muốn hay chỉ là khoảng trắng trong cùng div
                loadData(currentPage);
            }
        })
        pagination2.addEventListener('click', function(e){
            e.preventDefault();
            let link = e.target.closest('.pagination-item');
            if (link) {
                let currentPage = link.dataset.page;
                loadData(currentPage);
            }
        })

        /* $('#pagination-1').on("click", '.pagination-item', function(e){//JQuery
            let currentPage = this.dataset.page;//để check xem cái bấm đó có phải là cái mình thật sự muốn hay chỉ là khoảng trắng trong cùng div
                loadData(currentPage);
        }) */

        btn_look_up.addEventListener('click',function(e){
            e.preventDefault();
            loadData(1);
        })

        btn_add.addEventListener('click',function(e){
            e.preventDefault();
            item = "";
            setUpdateFormInput(item);
            ldcv.toggle();
        })

        tableBody.addEventListener('click', function(e){
            e.preventDefault();
            let link = e.target.closest('.delItem');
            if (link) {
                confirm(link.dataset.id);
            }

            let linkU = e.target.closest('.updItem');
            if (linkU){
                loadDataForm(linkU.dataset.id);             
            }
        })
        
        /* (event)=>{
            axios.get('/hoc-vien/get-list-hv')
            .then(function (response) {
                let mangData = response.data.list.data; //data dau cua axious, data sau cua laravel
                let html ='';
                let pagination = response.data.pagination;
                console.log(pagination);
                console.log("-----------------------------");
                console.log(response.data);
                mangData.forEach(function(item){
                    html += "<tr>";
                    html += "<td>" + item.id + "</td>";
                    html += "<td>" + item.ten+ "</td>";
                    html += "<td>" +item.ngay_sinh + "</td>";
                    html += "<td>" +item.email + "</td>";
                    html += "<td>" + item.sdt+ "</td>";                    
                    html += "</tr>";
                });
                console.log(html);
                tableBody.innerHTML= html;
                paginationT.innerHTML = pagination;
            })   
        }) */
    </script>
    @endpush

    
    
</x-app-layout>
