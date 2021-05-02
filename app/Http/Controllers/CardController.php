<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CardController extends Controller
{
    public function index(Request $request)
    {
        if(request('set_id')) {
            $data = Card::where('set_id', \request('set_id'))->get();
        } else {
            $data = Card::all();
        }
        if ($request->ajax()) {
            return \Yajra\DataTables\DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('set', function($rst){
                    return empty ($rst->set->name) ? $rst->set->name : $rst->set->name;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="' . route("card.edit", $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
//                    $btn = $btn.'<a href="' . route("set.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('card.index');
    }

    public function add()
    {
        $sets = Set::all();

        return view('card.add', compact('sets'));
    }

    public function edit($id)
    {
        $sets = Set::all();
        $card = Card::whereId($id)->first();
        return view('card.update', compact('sets', 'card'));
    }

    /**
     * Store a newly created Set in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            //upload profile pic

            $data = [
                'set_id' => $request->set_id,
                'name' => $request->name,
            ];
            Card::create($data);
            DB::commit();
            return redirect(route('card.index'))->with('success', 'Card inserted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->withErrors(['error', 'Sorry Record not inserted.']);
        }
    }

    /**
     * Update a newly created Set in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = [
                'name' => $request->name,
                'set_id' => $request->set_id,
            ];
            Card::whereId($request->id)->update($data);
            DB::commit();
            return redirect(route('card.index'))->with('success', 'Card updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->withErrors(['error', 'Sorry Record not inserted.']);
        }
    }

}
