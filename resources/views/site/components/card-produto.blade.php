<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->

    <div class="relative m-2 outline outline-offset-2 outline-1 rounded-md  h-auto w-auto">
        <a href="{{ route('site.details', $produto_slug) }}" class="flex flex-col group items-center bg-white  rounded-lg transition-all duration-500  dark:bg-gray-800 dark:hover:bg-gray-700">
          
          <!-- Imagem com transição de opacidade -->
          <img class="object-cover w-full rounded-lg transition-opacity duration-500 group-hover:opacity-50 p-1" 
               src="{{ $produto_imagem }}" 
               alt="{{ $produto_nome }}">
          
          <!-- Botão "visibility" com transição suave -->
        
            <button type="button" aria-label="View item" class="hidden absolute top-28 left-22 items-center justify-center p-3 rounded-full  transition-all duration-500 transform opacity-0 group-hover:flex group-hover:opacity-100 hover:scale-125 bg-gray-300  hover:text-white  hover:bg-indigo-500">
              <span class="material-symbols-outlined">
                visibility
              </span>
            </button>
          </a>
    
          <!-- Texto com transição de opacidade -->
          <div class="flex flex-col justify-between p-4 leading-normal z-0 w-full">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white transition-opacity duration-300 group-hover:opacity-50 line-clamp-2">
              {{ $produto_nome }}
            </h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 transition-opacity duration-500 group-hover:opacity-50">
              {{ $produto_descricao }}
            </p>
    
            <!-- Botão "add" com animação de transformação -->
            <a href="">
              <button type="button" aria-label="Add item" class="absolute z-50 bottom-2 right-2 flex items-center justify-center p-3 rounded-full bg-blue-500 text-white transition-transform duration-500 ease-in-out hover:scale-110 hover:bg-indigo-500">
                <span class="material-symbols-outlined">
                  add
                </span>
              </button>
            </a>

          </div>
        </a>

        <span class="ml-2 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
          <svg class="w-2.5 h-2.5 me-1.5" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#233876 "><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">  <g> <rect class="st0" width="128" height="128"></rect> <rect x="192" class="st0" width="128" height="128"></rect> <rect x="384" class="st0" width="128" height="128"></rect> <rect y="192" class="st0" width="128" height="128"></rect> <rect x="192" y="192" class="st0" width="128" height="128"></rect> <rect x="384" y="192" class="st0" width="128" height="128"></rect> <rect y="384" class="st0" width="128" height="128"></rect> <rect x="192" y="384" class="st0" width="128" height="128"></rect> <rect x="384" y="384" class="st0" width="128" height="128"></rect> </g> </g></svg>
          {{ $produto_categoria }}
          </span>
          
          
        </div>
</div>