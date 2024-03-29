<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Citem;
use App\Models\History;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'type' => 'required',
                'detail' => 'required',
            ],
        [
            'name.required' => '名前を入力してください',
            'name.max' => '名前は１００文字以内で入力してください',
            'type.required' => '種別を入力してください',
            'detail.required' => '詳細を入力してください',
        ]);
            // 申請DBへ商品登録
            Citem::create([
                'user_id' => Auth::user()->id,
                'item_id'=> 0,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);
            return redirect('/items');
        }

        return view('item.add');
    }
    /**
     * 商品編集画面へ遷移
     * * @param int $id
        * @return Response
     */
    public function editmove($id)
    {
            //編集対象のidをもってくる
            $item = Item::find($id);
            return view('item.edit',  [
                'item' => $item
            ]);
    }


}
