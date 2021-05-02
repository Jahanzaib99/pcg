<?php

namespace App\Http\Controllers;

use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Set::all();

            return \Yajra\DataTables\DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function($row){
                    $btn = '<a href="' . url("card/?set_id=". $row->id) . '">'. $row->name .'</a>';
//                    $btn = $btn.'<a href="' . route("set.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route("set.edit", $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
//                    $btn = $btn.'<a href="' . route("set.delete", $row->id) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action', 'name'])
                ->make(true);

        }
//        return view('admin.car.list');
        return view('set.index');
    }

    public function add()
    {
        return view('set.add');
    }

    public function edit($id)
    {
        $set = Set::whereId($id)->first();
        return view('set.update', compact('set'));
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
            $path = "profiles/default.png";
            if ($request->hasFile('image')) {
                SaveImageAllSizes($request, 'set/');
                $path = 'set/' . $request->image->hashName();
            }

            $data = [
                'name' => $request->name,
                'avatar' => empty($path) ? 'default.png' : $path,
            ];
            Set::create($data);
            DB::commit();
            return redirect(route('set.index'))->with('success', 'Set inserted successfully.');
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
            //upload profile pic
            $path = "profiles/default.png";
            if ($request->hasFile('image')) {
                SaveImageAllSizes($request, 'set/');
                $path = 'set/' . $request->image->hashName();
            }

            $data = [
                'name' => $request->name,
                'avatar' => empty($path) ? 'default.png' : $path,
            ];
            Set::whereId($request->id)->update($data);
            DB::commit();
            return redirect(route('set.index'))->with('success', 'Set updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return Redirect::back()->withErrors(['error', 'Sorry Record not inserted.']);
        }
    }

}
