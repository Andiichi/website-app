<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//importando nosso controller
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;

Route::resource('produtos', ProdutoController::class);

// listando os produtos na tela inicial do site pelo site controller
Route::get('/', [SiteController::class, 'index'])->name('site.index');

//exibindo o detalhes do produto pelo slug dele, vai aparecer na url
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');

//exibindo produtos da categoria especifica, pelo id da categoria
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');


//exibindo o carrinho de compras 
Route::prefix('carrinho')->group(function () {
    Route::get('/', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho'); // Exibe o carrinho
    Route::post('/adicionar', [CarrinhoController::class, 'adicionarCarrinho'])->name('site.addcarrinho'); // Adiciona ao carrinho
    Route::post('/remover/{id}', [CarrinhoController::class, 'removerCarrinho'])->name('site.removercarrinho'); // Remove do carrinho
    Route::post('/atualizar', [CarrinhoController::class, 'atualizarCarrinho'])->name('site.atualizarcarrinho'); // Remove do carrinho
});




//fazendo que a rota / seja redirecionada a rota agrupada do admin
// Route::get('/', function () {
//         return redirect()->route('admin.dashboard');
//     });

//rota simples 
// Route::get('/', function () {
//     return view('welcome');
// });

//renderiza uma views template 'empresa'
// Route::get('/empresa', function(){
//     return view('site/empresa');
// });



// Route::any('/any', function(){
//     return 'permite todo tipo de acesso http (post, get, put, delete)';
// });

// Route::match(['put', 'post'], '/match', function(){
//     return 'permite apenas acessos definidos de http';
// });

//parâmetros obrigatórios passar na URL, senão aparece pagina 404 not found
// Route::get('/produto/{id}/{cat}', function($id, $cat){
    //     return "O id do produto é: {$id} <br> A categoria do produto: {$cat}";
    
    // });
    
    //para nao ser obrigatório o valor inserido na url
    // Route::get('/produto/{id}/{cat?}', function($id, $cat = 'Não definido'){
    //     return "O id do produto é: {$id} <br> A categoria do produto: {$cat}";
        
    // });
    
    //criando uma rota nomeada
    // Route::get('/news', function(){
    //     return view('site/news');
    // })->name('noticias');


    // Route::get('/novidades', function(){
    //     return redirect()->route('noticias');
    // });

    //redirecionamento de pagina
    // Route::redirect('/sobre', '/empresa');
    
    //modo simplificado de renderizar uma view somente
    // Route::view('/empresa', 'site/empresa');

//fazendo agrupamento por prefix e por name
    // Route::group([
    //     'prefix' => 'admin', //group por prefix na url
    //     'as' => 'admin.' //group por name declarado para a rota
    // ],
    //     function(){

    //     Route::get('dashboard', function(){
    //         return 'dashboard';
    //     })-> name ('dashboard');

    //     Route::get('users', function(){
    //         return 'users';
    //     })-> name ('users');

    //     Route::get('clientes', function(){
    //         return 'clientes';
    //     })-> name ('clientes');

    // });


/****************************************/
    
//     Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
