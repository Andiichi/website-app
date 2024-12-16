@extends('site/layout')

@section('title', 'Preços')

@section('conteudo')

    <x-site.alert />

    <div class="grid md:grid-cols-2 items-center md:gap-4 mb-0 gap-8 font-[sans-serif] max-w-5xl max-md:max-w-md mx-auto">
        <div class="max-md:order-1 max-md:text-start">
            <h3 class="text-gray-800 md:text-5xl text-2xl md:leading-10">
                < Nossos preços! />
            </h3>
            <p class="text-gray-500 text-xl pt-8">i dolorum veritatis totam. Ex labore odio sed dolorem quod eligendi nisi
                debitis quidem maxime veritatis sapiente impedit ullam distinctio vero culpa illo repellendus vel, maiores
                non quibusdam ratione optio excepturi sint. Sint deleniti id odit voluptates asperiores sit eum possimus,
                atque quidem quibusdam delectus molestiae?

            </p>


        </div>

        <div id="default-carousel" class="relative w-full" data-carousel="slide">

            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-[390px]">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img\1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img\2.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="img\3.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="...">
                </div>

                <!-- Botão sobreposto -->
                <a id="carousel-button" href="/carrinho"
                    class="absolute top-4 right-4 z-50 px-2 py-1.2">
                    <button
                        class="inline-flex items-center p-2  rounded-lg text-sm font-medium text-center focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800  bg-blue-500 text-white">
                        Adicionar 
                        <span class="ml-2 material-symbols-outlined">
                            shopping_cart
                        </span>
                    </button>
                </a>
              
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>

            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/50 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>


        {{-- <div class="font-sans">
        <ul class="flex">
            <li id="homeTab"
                class="tab text-gray-800 font-bold text-base text-center bg-gray-50 py-3 px-6 border-b-2 border-blue-600 cursor-pointer transition-all">
                Free
            </li>
            <li id="contentTab"
                class="tab text-gray-600 font-semibold text-base text-center hover:bg-gray-50 py-3 px-6 border-b-2 cursor-pointer transition-all">
                Mensal
            </li>
            <li id="profileTab"
                class="tab text-gray-600 font-semibold text-base text-center hover:bg-gray-50 py-3 px-6 border-b-2 cursor-pointer transition-all">
                Anual
            </li>
        </ul>
    
        <div id="homeContent" class="tab-content max-w-2xl block mt-8">
            <h4 class="text-xl font-bold text-gray-800">Free</h4>
            <div class="md:h-80 lg:h-[324px]">
                <img src="img/1.png" alt="Imagem do plano free" class="w-full h-full md:object-contain" >
            </div>
           
        </div>
        <div id="contentContent" class="tab-content max-w-2xl hidden mt-8">
            <h4 class="text-xl font-bold text-gray-800">Mensal</h4>
            <div class="md:h-80 lg:h-[324px]">
                <img src="img/2.png" alt="Imagem do plano mensal" class="w-full h-full md:object-contain" >
            </div>
        </div>
        <div id="profileContent" class="tab-content max-w-2xl hidden mt-8">
            <h4 class="text-xl font-bold text-gray-800">Anual</h4>
            <div class="md:h-80 lg:h-[324px]">
                <img src="img/3.png" alt="Imagem do plano anual" class="w-full h-full md:object-contain" >
            </div>
        </div>
    </div> --}}


    </div>


@endsection
