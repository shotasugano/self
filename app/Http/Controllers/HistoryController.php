<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function historydelete(Request $request)
    {
                History::where('id',$request->id)
                ->delete();
                $histories = DB::table('histories')
                ->get();
                return view('item.history',compact('histories'));
    }
}