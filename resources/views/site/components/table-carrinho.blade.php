<tr data-row-id="{{ $produto_id }}" class="bg-white justify-center border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
    <td class="p-4">
        <img src="{{ $produto_imagem }}" class="rounded-full w-32 md:w-32 " alt=" {{ $produto_nome }}">
    </td>
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white truncate ">
        <a class=" hover:underline hover:underline-offset-4 decoration-pink-500 focus:ring-gray-100 focus:ring-2 "
            href="#">{{ $produto_nome }}</a>
    </td>
    <td class="px-6 py-4 ">
        {{ $produto_input_qty}}
    </td>
    
    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
        {{ $produto_preco }}
    </td>

    <td class="px-6 py-14 inline-flex">

        {{ $produto_remove }}

    </td>
</tr>