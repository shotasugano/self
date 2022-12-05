<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function historydelete(Request $request)
    {
                History::where('id',$request->id)
                ->delete();
                return redirect('items.history');
    }
}