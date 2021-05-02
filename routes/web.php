<?php
set_time_limit(700000000);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\CardController;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Example Routes
//Route::view('/', 'landing');

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/collection', [CollectionController::class, 'index'])->name('collection');
    Route::get('/collection/cards/{set_id}', [CollectionController::class, 'collectionCards'])->name('collection.cards');
    Route::get('/collection/card/{card_id}/details', [CollectionController::class, 'cardDetails'])->name('collection.card.detail');

    Route::view('/pages/slick', 'pages.slick');
    Route::view('/pages/datatables', 'pages.datatables');
    Route::view('/pages/blank', 'pages.blank');
});

Route::group(['prefix' => 'set', 'middleware' => ['auth']], function () {
    Route::get('/', [SetController::class, 'index'])->name('set.index');
    Route::get('/add', [SetController::class, 'add'])->name('set.add');
    Route::get('/edit/{set_id}', [SetController::class, 'edit'])->name('set.edit');
    Route::post('/store', [SetController::class, 'store'])->name('set.store');
    Route::post('/update', [SetController::class, 'update'])->name('set.update');
});

Route::group(['prefix' => 'card', 'middleware' => ['auth']], function () {
    Route::get('/', [CardController::class, 'index'])->name('card.index');
    Route::get('/add', [CardController::class, 'add'])->name('card.add');
    Route::get('/edit/{set_id}', [CardController::class, 'edit'])->name('card.edit');
    Route::post('/store', [CardController::class, 'store'])->name('card.store');
    Route::post('/update', [CardController::class, 'update'])->name('card.update');
});

Route::get('crawler', function () {
    $client = new Client();
    $crawler = $client->request('GET', 'https://www.pokemonprice.com/Sets');
    $crawler->filter('.pokemonsets-row > .col-md-3 > a')->each(function ($node) {
        $img = 'https://www.pokemonprice.com' . $node->children('img')->attr('src');
        $href = 'https://www.pokemonprice.com' . $node->attr('href');
        $api_href = 'https://www.pokemonprice.com/api' . substr($node->attr('href'), 0, strrpos($node->attr('href'), "/"));
        $name = $node->text();
        \App\Models\Set::create([
            'name' => $name,
            'avatar' => $img,
            'href' => $href,
            'api_href' => $api_href
        ]);
    });
});

Route::get('crawl_cards', function () {
    $count = \App\Models\Set::count();
    for ($i = 0; $i < $count; $i += 10) {
        $take = $i + 10;
        $sets = \App\Models\Set::skip($i)->take($take)->get();
        $client = new Client(HttpClient::create(['timeout' => 120]));
        foreach ($sets as $set) {
            $crawler = $client->request('GET', $set->api_href);
            $crawler->filter('tr a')->each(function ($node, $i) use ($set) {
                \App\Models\Card::updateOrCreate([
                    'name' => $node->text(),
                ], [
                    'set_id' => $set->id,
                    'name' => $node->text(),
                    'href' => $node->attr('href'),
                    'api_href' => ''
                ]);
            });
        }
    }
});

Route::get('crawl_card_details', function () {
    $count = \App\Models\Card::count();
//    for ($i=0; $i< $count; $i+=10 ) {
//        $take = $i + 10;
        $card = \App\Models\Card::where('name', "Blaine's Moltres Holo")->first();
//        $cards = \App\Models\Card::skip($i)->take($take)->get();
        $client = new Client(HttpClient::create(['timeout' => 120]));
//        foreach ($cards as $card) {
            $crawler = $client->request('GET', 'https://www.pokemonprice.com/' . $card->href);
            $crawler->filter('tbody tr')->each(function ($node, $i) use ($card) {
                dd($node->text());
                \App\Models\CardDetail::updateOrCreate([
                    'psa_cert_number' => $node->children('td')->eq(5)->text(),
                ], [
                    'card_id' => $card->id,
                    'sale_date' => $node->children('td')->eq(0)->text(),
                    'grade' => $node->children('td')->eq(1)->text(),
                    'price' => $node->children('td')->eq(2)->text(),
                    'auction_id' => $node->children('td')->eq(3)->text(),
                    'seller_id' => $node->children('td')->eq(4)->text(),
                    'psa_cert_number' => $node->children('td')->eq(5)->text(),
                    'sale_type' => $node->children('td')->eq(6)->text(),
                ]);
            });
//        }
//    }
});

Auth::routes();
