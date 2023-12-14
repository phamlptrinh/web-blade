<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <div class="trinh-tabs">
                        <div class="trinh-tabs__nav">
                            <div class="trinh-tabs__nav-item active">
                                <a class="trinh-tabs__nav-link" href="#tab1">Tab 1</a>
                            </div>
                            <div class="trinh-tabs__nav-item">
                                <a class="trinh-tabs__nav-link" href="#tab2">Tab 2</a>
                            </div>
                            <div class="trinh-tabs__nav-item">
                                <a class="trinh-tabs__nav-link" href="#tab3">Tab 3</a>
                            </div>
                        </div>
                        <div class="trinh-tabs__content">
                            <div id="tab1" class="trinh-tabs__pane active">Nội dung 1</div>
                            <div id="tab2" class="trinh-tabs__pane">Nội dung 2</div>
                            <div id="tab3" class="trinh-tabs__pane">Nội dung 3</div>
                        </div>
                    </div>

                    <div id="my-style2" class="trinh-tabs"> <!-- Chú ý quy tắt đặt tên -->
                        <div class="trinh-tabs__nav">
                            <div class="trinh-tabs__nav-item active">
                                <a class="trinh-tabs__nav-link" href="#tab11">Tab 1</a>
                            </div>
                            <div class="trinh-tabs__nav-item">
                                <a class="trinh-tabs__nav-link" href="#tab21">Tab 2</a>
                            </div>
                            <div class="trinh-tabs__nav-item">
                                <a class="trinh-tabs__nav-link" href="#tab31">Tab 3</a>
                            </div>
                        </div>
                        <div class="trinh-tabs__content">
                            <div id="tab11" class="trinh-tabs__pane active">Nội dung 1</div>
                            <div id="tab21" class="trinh-tabs__pane">Nội dung 2</div>
                            <div id="tab31" class="trinh-tabs__pane">Nội dung 3</div>
                        </div>
                    </div>

                    <div class="tr-accordions">
                        <div class="tr-accordion__item active">
                            <div class="tr-accordion__item-header">
                                <a class="tr-accordion__link" href="">Acc 1</a>
                            </div>
                            <div class="tr-accordion__item-collapse">
                                <div class="tr-accordion__body">
                                    Body 11111111111111111111111111111111111111
                                </div>
                            </div>
                        </div>
                        <div class="tr-accordion__item">
                            <div class="tr-accordion__item-header">
                                <a class="tr-accordion__link" href="">Acc 2</a>
                            </div>
                            <div class="tr-accordion__item-collapse">
                                <div class="tr-accordion__body">
                                    Body 22222222222222222222222222222222222222
                                </div>
                            </div>
                        </div>
                        <div class="tr-accordion__item">
                            <div class="tr-accordion__item-header">
                                <a class="tr-accordion__link" href="">Acc 3</a>
                            </div>
                            <div class="tr-accordion__item-collapse">
                                <div class="tr-accordion__body">
                                    Body 33333333333333333333333333333333333333
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tr-carousel" data-curr-slide="0">
                        <!-- <input class="curr-slide" type="hidden" value="0"/> -->
                        <div class="tr-carousel__inner">
                            <div class="tr-carousel__item active">
                                <img src="/Image/h1.JPG" class="tr-carousel__img" alt="1">
                            </div>
                            <div class="tr-carousel__item">
                                <img src="/Image/h2.JPG" class="tr-carousel__img" alt="2">
                            </div>
                            <div class="tr-carousel__item">
                                <img src="/Image/h3.JPG" class="tr-carousel__img" alt="3">
                            </div>
                        </div>
                        <div class="tr-carousel__control prev">
                            <button class="tr-carousel__control-link" >Prev</button>
                        </div>
                        <div class="tr-carousel__control next">
                            <button class="tr-carousel__control-link" >Next</button>
                        </div>
                    </div>

                    <div class="tr-carousel" data-curr-slide="0">
                        <!-- <input class="curr-slide" type="hidden" value="0"/> -->
                        <div class="tr-carousel__inner">
                            <div class="tr-carousel__item active">
                                <img src="/Image/h1.JPG" class="tr-carousel__img" alt="1">
                            </div>
                            <div class="tr-carousel__item">
                                <img src="/Image/h2.JPG" class="tr-carousel__img" alt="2">
                            </div>
                            <div class="tr-carousel__item">
                                <img src="/Image/h3.JPG" class="tr-carousel__img" alt="3">
                            </div>
                        </div>
                        <div class="tr-carousel__control prev">
                            <button class="tr-carousel__control-link" >Prev</button>
                        </div>
                        <div class="tr-carousel__control next">
                            <button class="tr-carousel__control-link" >Next</button>
                        </div>
                    </div>

                    <div class="tr-dropdown">
                                <button class="tr-dropdown__btn">
                                    V
                                </button>
                                <div class="tr-dropdown__menu" >
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                        <li class="tr-dropdown__li">
                                            <a class="tr-dropdown__item" href="#">Action</a>
                                        </li>
                                        <li class="tr-dropdown__li">
                                            <a class="tr-dropdown__item" href="#">Another action</a>
                                        </li>
                                        <li class="tr-dropdown__li">
                                            <a class="tr-dropdown__item" href="#">Something else here</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                    

                </div>
            </div>
        </div>
        <div>
            </div>
            
    </div>

    
</x-app-layout>
