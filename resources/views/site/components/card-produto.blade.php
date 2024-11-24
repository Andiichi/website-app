<div class="w-full max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('site.details', $produto_slug) }}"
    class="flex flex-col group items-center bg-white  rounded-lg transition-all duration-500  dark:bg-gray-800 dark:hover:bg-gray-700">

    <!-- Imagem com transição de opacidade -->
    <img class="object-cover w-full rounded-lg transition-opacity duration-500 group-hover:opacity-50 p-1"
        src="{{ $produto_imagem }}" alt="{{ $produto_nome }}">

    <!-- Botão "visibility" com transição suave -->

    <button type="button" aria-label="View item"
        class="hidden absolute bottom-80 items-center justify-center p-3 rounded-full  transition-all duration-500 transform opacity-0 group-hover:flex group-hover:opacity-100 hover:scale-125 bg-gray-300  hover:text-white  hover:bg-indigo-500">
        <span class="material-symbols-outlined">
            visibility
        </span>
    </button>
</a>
<div class="flex flex-col gap-10 justify-start px-6">
    <div class="">

      <div class="font-bold text-xl mb-2">{{ $produto_nome }}</div>

      <p class="text-gray-700 text-base">
        {{ $produto_descricao }}
      </p>

    </div>
    
    <div class="">
        {{ $form_adicionar }}
     
    </div>

    <div class="">
      <span class="inline-block  bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
        Categoria: <strong>{{ $produto_categoria }}</strong>
    </span>
     
    </div>
</div>
  </div>