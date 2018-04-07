<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //
    }
    public function index()
    {
        return Board::all();

    }

    public function show($id)
    {
        $boards = Board::find($id);
        return $boards;

    }

    public function store(Request $request)
    {
        Board::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message'=>'success'],200);
    }
    public function update(Request $request,$id)
    {
        $board = Board::findOrFail($id);

        $board->name = $request->name;
        $board->user_id = $request->user_id;
        $board->save();

        return response()->json(['message'=>'success'],200);
    }
    public function destroy($id)
    {
        $board = Board::findOrFail($id);
        $board->delete();

        return response()->json(['message'=>'Deleted successfully'],200);
    }

    //
}
