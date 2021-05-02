<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardDetail;
use App\Models\Set;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sets = Set::all();
        return view('collection', compact('sets'));
    }

    public function collectionCards($set_id)
    {
        $cards = Card::where('set_id', $set_id)->with(['cardDetails'])->get();
//        dd($cards[0]->cardDetails);
        return view('collection_cards', compact('cards'));
    }

    public function cardDetails($card_id)
    {
        $card_details = CardDetail::where('card_id', $card_id)->get();
        return view('card_details', compact('card_details'));
    }
}
