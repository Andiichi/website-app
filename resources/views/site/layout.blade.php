<!DOCTYPE html>
<html lang="pt-br" class="bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CursoLaravel | @yield('title')</title>

    {{-- TaildwindCSS, e javascritp do Flowbite personalizado --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- javascript personalizado --}}
    @vite('resources/js/script.js')

    {{-- Link google icons --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />


</head>

<body class="h-full">
    <div class="min-h-full">


        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <svg class="h-8" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMinYMin meet" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g fill="#F35045">
                                <path
                                    d="M160.445 208c2 2.889 3.222 2.667 4.777 2 1.555-.667 81.556-27.667 84-28.555 2.444-.889 1.667-1.667.89-2.89-.778-1.222-27.445-37.444-28.779-39.555-1.333-2.111-2-1.667-4.111-1l-84.805 22.067S158.445 205.11 160.445 208zM256 171.115v-42.398c-9.541 2.542-21.609 5.756-26.373 7.023 7.187 9.616 18.423 24.665 26.373 35.375zM229.545 83.521c-1.307.297-30.247 5.527-32.03 5.764-1.782.238-1.188 1.248-.475 2.258l25.467 34.943s31.139-7.725 33.041-8.141c.154-.034.305-.07.452-.107v-4.627c-5.66-7.177-21.08-26.718-22.413-28.544-1.604-2.199-2.734-1.842-4.042-1.546z">
                                </path>
                                <path
                                    d="M47.456 28.634c6.267-.285 6.839 1.141 9.592 5.224l69.17 115.642 86.974-20.835c-4.819-6.831-26.695-37.846-28.81-40.806-2.376-3.328.06-4.873 3.923-5.526 3.862-.654 37.14-6.24 39.992-6.656 2.853-.416 5.112-1.426 9.746 4.16 2.372 2.858 10.412 12.87 17.957 22.255V48c0-13.222-4.695-24.528-14.083-33.917C232.528 4.695 221.222 0 208 0H48C34.778 0 23.472 4.695 14.083 14.083 8.698 19.47 4.865 25.487 2.57 32.134c15.678-1.288 40.501-3.3 44.887-3.5z">
                                </path>
                                <path
                                    d="M168.289 223.564c-7.334 2.222-10.623 3.325-15.4-3.342-3.578-4.993-22.927-39.843-32.414-57.023-17.955 4.702-50.814 13.278-60.29 15.555-9.248 2.222-13.198-3.323-14.717-6.74C44.403 169.616 17.289 111.158 0 73.65V208c0 13.223 4.695 24.527 14.083 33.917C23.472 251.305 34.778 256 48 256h160c13.222 0 24.528-4.695 33.917-14.083C251.305 232.527 256 221.223 256 208v-15.781c-19.64 7.184-82.77 29.848-87.711 31.345z">
                                </path>
                                <path
                                    d="M60.412 165.288c2.6-.595 51.313-12.253 52.353-12.476 1.04-.223 1.708-.817.594-2.747-1.114-1.93-64.934-112.09-64.934-112.09-.589-1.011-.421-1.348-2.022-1.264-1.427.076-37.538 3.298-45.898 3.996a51.038 51.038 0 0 0-.461 5.331c8.487 17.375 57.199 117.837 57.472 118.655.297.892.297 1.189 2.896.595z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">CursoLaravel</span>
                </a>


                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                    {{-- menu perfil caso o usuario esteja autenticado --}}
                    @auth
                        <div class="mr-4 flex items-center md:ml-6">
                            <a href="{{ route('site.carrinho') }}">
                                <button type="button"
                                    class=" relative inline-flex items-center p-2 text-sm font-medium text-center 
                            hover:rounded-full text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <span class="material-symbols-outlined h-6 w-6">
                                        shopping_cart
                                    </span>
                                    <span class="sr-only">Carrinho de compras</span>
                                    <div
                                        class="absolute inline-flex items-center justify-center  w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                        {{ \Cart::Content()->count() }}
                                    </div>
                                </button>
                            </a>

                        </div>




                        <!-- Dropdown menu user -->
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                type="button" data-drawer-target="drawer-backdrop" data-drawer-show="drawer-backdrop"
                                data-drawer-backdrop="true" aria-controls="drawer-backdrop">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite-admin-dashboard.vercel.app/images/users/bonnie-green-2x.png"
                                    alt="user photo">
                            </button>

                            <x-site.drawer_user />
                            
                        </div>


                    @endauth

                    {{-- dropdown do menu  --}}

                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-2 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 
                  md:hover:bg-transparent md:hover:bg-gray-200 md:p-2 dark:text-white 
                  md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white 
                  md:dark:hover:bg-transparent dark:border-gray-700 
                  {{ Request::routeIs('home') ? 'md:active bg-gray-200 ' : '' }}">
                                Home
                            </a>
                        </li>

                        @auth

                            <li>
                                <a href="{{ route('site.list-products') }}"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100  md:hover:bg-transparent md:hover:bg-gray-200 md:p-2 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::routeIs('site.list-products') ? 'md:active bg-gray-200 ' : '' }}">
                                    Produtos
                                </a>
                            </li>
                            <li>
                                <!-- Dropdown menu -->
                                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover"
                                    data-dropdown-trigger="hover"
                                    class="flex items-center justify-between py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:active:bg-gray-200 md:hover:bg-gray-200 md:p-2 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                    type="button">
                                    Categorias
                                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownHover"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownHoverButton">

                                        @foreach ($categoriasMenu as $categoriaItem)
                                            <li>
                                                <a href="{{ route('site.categoria', $categoriaItem->id) }}"
                                                    class="block px-4 py-2 hover:font-semibold hover:text-blue-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                    {{ $categoriaItem->nome }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                        @endauth

                        <li>
                            <a href="{{ route('preco') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:bg-gray-200 md:p-2 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::routeIs('preco') ? 'md:active bg-gray-200 ' : '' }}">
                                Preços
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('sobre') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:bg-gray-200 md:p-2 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::routeIs('sobre') ? 'md:active bg-gray-200 ' : '' }}">
                                Sobre
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contato') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:bg-gray-200 md:p-2 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 {{ Request::routeIs('contato') ? 'md:active bg-gray-200 ' : '' }}">
                                Contato
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </nav>


        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <!-- Your content -->

                @yield('conteudo')
            </div>
        </main>



        <hr class="border-gray-300  shadow sm:mx-auto " />
        <footer class=" md:p-4 bg-gray-800 dark:bg-gray-800 text-center">
            <div class="flex flex-col p-4 md:p-2 items-center pb-6">
                <span class="text-sm text-gray-300 dark:text-gray-400">
                    © 2024 <a href="#" class="hover:underline">CursoLaravel™</a>. All Rights Reserved.
                </span>
            </div>
        </footer>


    </div>

    {{-- script do js do flowbite --}}
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>


</body>

</html>
