 <!-- Início do Card -->

<div class="bg-white rounded overflow-hidden shadow-md flex flex-col h-full">
    <a href="{{ route('site.details', $produto_slug) }}"
        class="relative group flex flex-col items-center bg-white rounded-lg transition-all duration-500 dark:bg-gray-800 dark:hover:bg-gray-700">
        <!-- Imagem com transição -->
        <img class="object-cover w-full rounded-t-lg transition-opacity duration-500 group-hover:opacity-50"
            src="{{ $produto_imagem }}" alt="{{ $produto_nome }}">

        <!-- Botão de Visibilidade -->
        <button type="button"
            class="hidden absolute top-[10rem] items-center justify-center p-3 rounded-full transition-all duration-500 transform opacity-0 group-hover:flex group-hover:opacity-100 hover:scale-125 bg-gray-300 hover:text-white hover:bg-indigo-500">
            <span class="material-symbols-outlined">visibility</span>
        </button>
    </a>
    <!-- Conteúdo do Card -->
    <div class="p-4 flex-grow flex flex-col justify-between">
        <div>
            <h3 class="text-lg font-bold text-gray-800 text-pretty">
                {{ $produto_nome }}
            </h3>
            <div class="mt-4 flex">
                <h4 class="text-lg font-bold text-gray-800">
                 {{ $produto_preco }}
                </h4>

                <div class="flex items-center justify-center rounded-full cursor-pointer ml-auto ">
                    {{ $produto_form_add }}
                </div>
            </div>
        </div>
        
        <!-- Categoria no Rodapé -->
        <div class="mt-8">
            <button type="button"
                class="flex items-center text-blue-600 text-sm font-bold bg-blue-100 px-3 py-1.5 tracking-wide rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 mr-2 fill-current" viewBox="0 0 32 32">
                    <path
                        d="M18.12 27.76H7.7a2.653 2.653 0 0 1-2.65-2.65V5.55A2.653 2.653 0 0 1 7.7 2.9h15.25a2.653 2.653 0 0 1 2.65 2.65v14.71a.9.9 0 0 0 1.8 0V5.55a4.455 4.455 0 0 0-4.45-4.45H7.7a4.455 4.455 0 0 0-4.45 4.45v19.56a4.455 4.455 0 0 0 4.45 4.45h10.42a.9.9 0 0 0 0-1.8z">
                    </path>
                    <path
                        d="M21.992 6.431H8.664a.9.9 0 0 0 0 1.8h13.328a.9.9 0 0 0 0-1.8zm.9 6.231a.9.9 0 0 0-.9-.9H8.664a.9.9 0 0 0 0 1.8h13.328a.9.9 0 0 0 .9-.9zM8.66 18.89h4.18a.9.9 0 0 0 0-1.8H8.66a.9.9 0 0 0 0 1.8zm0 5.33h4.54a.9.9 0 0 0 0-1.8H8.66a.9.9 0 0 0 0 1.8zm19.009.882-7.029-7.029a1.589 1.589 0 0 0-1.031-.463l-2.624-.153a1.593 1.593 0 0 0-1.68 1.679l.153 2.625c.022.389.187.755.463 1.031l7.029 7.029c.65.651 1.505.976 2.359.976s1.709-.325 2.359-.976a3.338 3.338 0 0 0 .001-4.719zm-10.553-5.834 2.309.135 5.316 5.315-2.174 2.174-5.316-5.316zm9.281 9.28a1.54 1.54 0 0 1-2.174 0l-.384-.384 2.174-2.174.384.384a1.54 1.54 0 0 1 0 2.174z">
                    </path>
                </svg>
                {{ $produto_categoria }}
            </button>
        </div>
    </div>
</div>
<!-- Fim do Card -->
