
<div class="grid min-h-full mx-auto place-items-center py-12 ">
    <div class="text-center">
        {{-- Mensagem de Erro --}}
        <h1 class="mb-6 text-3xl font-bold text-gray-800">
            Seu carrinho está vazio!
        </h1>
        <svg viewBox="0 0 24 24" class="w-[12rem] mx-auto py-6 opacity-20"  fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 5L19 12H7.37671M20 16H8L6 3H3M11 3L13.5 5.5M13.5 5.5L16 8M13.5 5.5L16 3M13.5 5.5L11 8M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            
        {{-- Mensagem de Erro --}}
        <p class="mt-6 text-lg font-medium text-gray-500 sm:text-xl">
            Aproveite nossas promoções e comece a economizar!
        </p>

        {{-- Botões de Navegação --}}
        <div class="mt-10 flex flex-col md:flex-row items-center justify-center gap-x-6 gap-y-4">
            <a href="{{ route('site.list-products') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Lista de produtos!
            </a>
            <a href="/" class="text-sm font-semibold text-gray-900">
                Contatar o nosso suporte <span aria-hidden="true">&rarr;</span>
            </a>
        </div>
    </div>
</div>
