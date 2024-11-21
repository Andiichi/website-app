<tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
    <td class="p-4">
        <img src="{{ $produto_imagem }}"  class="rounded-full w-32 md:w-32 " alt=" {{ $produto_nome }}">
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white truncate ">
        {{ $produto_nome }}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
             
            

            
<form class="max-w-xs mx-auto">
    <label for="counter-input" class="block mb-1 text-[.7rem] font-medium text-gray-900 dark:text-white">Alterar quantidade:</label>
    <div class="relative flex items-center">
        <button type="button" id="" data-input-counter-decrement="counter-input" class="decrement-button flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-full h-6 w-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
            </svg>
        </button>

        <input type="text" id="" data-input-counter class="counter-input flex-shrink-0 text-gray-900 dark:text-white border-0 bg-transparent text-sm font-normal focus:outline-none focus:ring-0 max-w-[2.5rem] text-center" placeholder="" value="{{ $produto_quantidade }}" required />

        <button type="button" id="" data-input-counter-increment="counter-input" class="increment-button flex-shrink-0 bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 inline-flex items-center justify-center border border-gray-300 rounded-full h-6 w-6 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-2.5 h-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </button>
    </div>
</form>

            


        </div>
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
        {{ $produto_preco }}
    </td>
    <td class="px-6 py-4">
        <a href="#" >
            <button type="button" class="text-white bg-orange-400 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-orange-600 dark:hover:bg-orange-400 dark:focus:ring-orange-800">
                <span class="material-symbols-outlined">
                    refresh
                    </span>
                </button>
        </a>
        <a href="#" >
            <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <span class="material-symbols-outlined">
                    edit
                    </span>
                </button>
        </a>
    </td>
</tr>