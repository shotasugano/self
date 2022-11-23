<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Citem;

class Citemcontroller extends Controller
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
* 編集申請
*
* @param Request $request
* @return Response
*/
public function editapp (Request $request)
{
       // $img=$request->image;
       // $img_name=$request->image->getClientOriginalName();  //imageはformで設置したname名
        //dd($img)
        // 取得したファイル名でsampleディレクトリに画像を保存
        //$img->storeAs('public/sample',$img_name);
            // 編集申請DBへ情報の更新
            Citem::where('item_id',$request->id)
            ->update([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
               // 'address'=> $request->address,
               // 'filename'=>$img_name,
               // 'path'=> 'storage/sample/' . $img_name
            ]);
            //画像の保存
            // ディレクトリ名
            //$dir = 'sample';
            // sampleディレクトリに画像を保存
            //$request->id->file('image')->store('public/' . $dir);
            return redirect('/items');
        }
/**
* 削除申請
*
* @param Request $request
* @return Response
*/
public function editappdelete(Request $request)
{
            Citem::where('item_id',$request->id)
            ->delete();
            return redirect('/items');
}



    /**
     * CitemsとItemsで差があったものを表示する
     *    @param 
        * @return Response
     */
    public function index()
    {
        // 商品一覧取得
       $Citems = DB::select('select `c`.`id`,`i`.`name` AS `INAME`, `c`.`name`,`i`.`type` AS `ITYPE`, `c`.`type`,`i`.`detail` AS `IDETAIL`,`c`.`detail`,`c`.`item_id`
         from `citems` as `c` inner join `items` as `i` on  `c`.`item_id` = `i`.`id` where `i`.`name` != `c`.`name`;');
        $Ditems = DB::table('citems as c')
        ->rightJoin('items as i', 'i.id', '=', 'c.item_id')
        ->wherenull('c.name')     //citemsがNULLのものを
        ->select('i.name as INAME', 'c.name','i.type as ITYPE','c.type','i.detail as IDETAIL','c.detail','c.id','i.id as IID')  //紐づいているitemのnameをINAMEとして、citemsの名前をnameとして
        ->get();
        $Eitems = DB::table('citems as c')
        ->leftJoin('items as i', 'i.id', '=', 'c.item_id')
        ->wherenull('i.name')     //itemsがNULLのものを
        ->select('i.name as INAME', 'c.name','i.type as ITYPE','c.type','i.detail as IDETAIL','c.detail','c.id','i.id as IID')  //紐づいているitemのnameをINAMEとして、citemsの名前をnameとして
        ->get();
         return view('confirm.index', compact('Citems','Ditems','Eitems'));
    }

    /**
     * 商品編集画面へ遷移
     * * @param int $id
        * @return Response
     */
    public function editmove($id)
    {
            //編集対象のidをもってくる
            $Citem = DB::table('citems as c')
            ->join('items as i', 'i.id', '=', 'c.item_id')
            ->where('c.id','=',$id)     //citemsテーブルのid
            ->select('i.name as INAME', 'c.name','i.type as ITYPE','c.type','i.detail as IDETAIL','c.detail','c.id','i.id as IID')  //紐づいているitemのnameをINAMEとして、citemsの名前をnameとして
            ->first();
            //もし$Citemが空（削除申請）のとき
            //if(isset(!$Citem)){
                
            //};
           return view('confirm.edit', compact('Citem'));
    }

/**
* 編集承認
*
* @param Request $request
* @return Response
*/
public function editapprove (Request $request)
{
       // $img=$request->image;
       // $img_name=$request->image->getClientOriginalName();  //imageはformで設置したname名
        //dd($img)
        // 取得したファイル名でsampleディレクトリに画像を保存
        //$img->storeAs('public/sample',$img_name);
            // 編集申請DBへ情報の更新
            Item::where('id',$request->IID)
            ->update([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
               // 'address'=> $request->address,
               // 'filename'=>$img_name,
               // 'path'=> 'storage/sample/' . $img_name
            ]);
            //画像の保存
            // ディレクトリ名
            //$dir = 'sample';
            // sampleディレクトリに画像を保存
            //$request->id->file('image')->store('public/' . $dir);
            return redirect('/items');
        }
        /**
* 編集却下
*
* @param Request $request
* @return Response
*/
public function editdeny (Request $request)
{
       // $img=$request->image;
       // $img_name=$request->image->getClientOriginalName();  //imageはformで設置したname名
        //dd($img)
        // 取得したファイル名でsampleディレクトリに画像を保存
        //$img->storeAs('public/sample',$img_name);
            // 編集申請DBへ情報の更新
            Citem::where('item_id',$request->id)
            ->update([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
               // 'address'=> $request->address,
               // 'filename'=>$img_name,
               // 'path'=> 'storage/sample/' . $img_name
            ]);
            //画像の保存
            // ディレクトリ名
            //$dir = 'sample';
            // sampleディレクトリに画像を保存
            //$request->id->file('image')->store('public/' . $dir);
            return redirect('/items');
        }
            /**
     * 商品編集画面へ遷移
     * * @param int $id
        * @return Response
     */
    public function editmovedelete($id)
    {
            //編集対象のidをもってくる
            $item = Item::find($id);
            return view('confirm.editdelete',  [
                'item' => $item
            ]);
    }
/**
* 削除申請承認
*
* @param Request $request
* @return Response
*/
public function editdeleteapprove (Request $request)
{
       // $img=$request->image;
       // $img_name=$request->image->getClientOriginalName();  //imageはformで設置したname名
        //dd($img)
        // 取得したファイル名でsampleディレクトリに画像を保存
        //$img->storeAs('public/sample',$img_name);
            // 編集申請DBへ情報の更新
            Item::where('id',$request->id)
            ->delete();
            return redirect('/items');
}
        /**
* 削除申請却下
*
* @param Request $request
* @return Response
*/
public function editdeletedeny (Request $request)
{
       // $img=$request->image;
       // $img_name=$request->image->getClientOriginalName();  //imageはformで設置したname名
        //dd($img)
        // 取得したファイル名でsampleディレクトリに画像を保存
        //$img->storeAs('public/sample',$img_name);
            // 編集申請DBへ情報の更新
           // 申請DBへ商品登録
           Citem::create([
            'user_id' => Auth::user()->id,
            'item_id'=>$request->id,
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
        ]);
            //画像の保存
            // ディレクトリ名
            //$dir = 'sample';
            // sampleディレクトリに画像を保存
            //$request->id->file('image')->store('public/' . $dir);
            return redirect('/items');
        }
            /**
     * 新商品登録確認画面へ遷移
     * * @param int $id
        * @return Response
     */
    public function editaddmove($id)
    {
            //編集対象のidをもってくる
            $item = Citem::find($id);
            return view('confirm.editadd',  [
                'item' => $item
            ]);
    }
/**
* 新商品申請承認
*
* @param Request $request
* @return Response
*/
public function editaddapprove (Request $request)
{
       // $img=$request->image;
       // $img_name=$request->image->getClientOriginalName();  //imageはformで設置したname名
        //dd($img)
        // 取得したファイル名でsampleディレクトリに画像を保存
        //$img->storeAs('public/sample',$img_name);
            // DBへ情報の登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);
            // 申請DBへ商品登録
            Citem::where('id',$request->id)
            ->update([
                'item_id'=> Item::get()->last()->id,
               // 'address'=> $request->address,
               // 'filename'=>$img_name,
               // 'path'=> 'storage/sample/' . $img_name
            ]);
            return redirect('/items');
}

/**
* 新規商品申請却下
*
* @param Request $request
* @return Response
*/
public function editadddeny (Request $request)
{
       // $img=$request->image;
       // $img_name=$request->image->getClientOriginalName();  //imageはformで設置したname名
        //dd($img)
        // 取得したファイル名でsampleディレクトリに画像を保存
        //$img->storeAs('public/sample',$img_name);
            // 編集申請DBの情報を削除
           Citem::where('id',$request->id)
           ->delete();
            //画像の保存
            // ディレクトリ名
            //$dir = 'sample';
            // sampleディレクトリに画像を保存
            //$request->id->file('image')->store('public/' . $dir);
            return redirect('/items');
        }

}