<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Item;
use App\Category;
use App\User;
use App\Message;

class ItemsController extends Controller
{
    public function index()
    {   
        //$items = Item::with('image_file_name')->get();
        $items = DB::table('items')->orderBy('created_at', 'desc')->paginate(10);
//        dd($items);
        return view('welcome', ['items' => $items ]);
    }
    
    public function create()
    {
        $item = new Item;
        $category = new Category;
        $categories = \App\Category::pluck('category', 'id');
        
        return view('items.create', [ 'item' => $item, 'categories' => $categories, 'category' => $category ]);
        
    }
    
    public function store(Request $request)
    {
        //dd($request->all());
        
        $request->validate([
            'image_file_name' => ['file', 'mimes:jpeg,png,jpg,bmb', 'max:2048'],
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            'category_id' => 'required',
            
        ]);
        
        if($file = $request->image_file_name){

            $fileName =time(). '.' .$file->getClientOriginalExtension();
            
            $target_path = public_path('/uploads/');
            $file->move($target_path,$fileName);
    
        }else{
            $name = "";
        }
        
        $request->user()->items()->create([
            'image_file_name' => $fileName,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'time_limit' => $request->time_limit,
        ]);
        
        /**
        $file_name = time() . '.' . request()->image_file_name->getClientOriginalName();
        // fileの名称を決定
        // Uniqueになっていることが重要であるためtime()を接頭語に追記
        
        $request->file('image_file_name')->storeAs('public',$file_name);
        // storageは以下のpublicディレクションに$file_nameで保存
        
        // データベースにファイルがUpされているPathを保存
        $imagepath = '/storage/' . $file_name;
        
        $loginId = Auth::id();
        $profileInfo = User::find($loginId);
        // Modelを活用
        
        $profileInfo->imagepath = $imagepath;
        // imagepathをデータベースへ保存
        $profileInfo->save();
        
        **/
        
        
        
        
        // 前のURLへリダイレクトさせる
        return redirect('/');
//        return view('welcome');
    }
    
    
    public function show($id)
    {
        $item = Item::findOrFail($id);
        $user = $item->user();
        $messages = $item->messages()->orderBy('created_at', 'desc')->paginate(10);
        
        return view('items.show', [
            'item' => $item,
            'user' => $user,
            'messages' => $messages,
            ]);
    }
    
    public function mypage()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            
            $user = \Auth::user();
            $items = $user->items()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'items' => $items,
            ];
        }

        
        return view('items.myitems', $data);
    }
    
    public function search(Request $request)
    {
        
        $key = $request->key;
        $query = Item::query();
        
        if (!empty($key)) {
            $query->where('name', 'like', '%' . $key . '%');
        }
        
        $items = $query->orderBy('created_at', 'desc')->paginate(10);

        
        return view('items.search', ['items'=>$items]);
    }
    
    public function finish($id)
    {
        $item = Item::findOrFail($id);
        $item->nego_status = true;
        $user = $item->user();
        $messages = $item->messages()->orderBy('created_at', 'desc')->paginate(10);
        $nego_status = $item->nego_status;
        
        return view('items.show', [
            'item' => $item,
            'user' => $user,
            'messages' => $messages,
            '$nego_status' => $nego_status,
            ]);
        
    }
    
    
}
