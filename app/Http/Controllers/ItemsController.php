<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Item;
use App\Category;
use App\User;
use App\Message;
use Storage;

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
        
        $request->validate([
            'image_file_name' => ['file', 'mimes:jpeg,png,jpg,bmb', 'max:2048'],
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            'category_id' => 'required',
        ]);
        
        //dd($request->all());
        
        if($file = $request->image_file_name){
            

            $fileName =time(). '.' .$file->getClientOriginalExtension();
            
            //$target_path = public_path('/uploads/');
            
            
            //$file->move($target_path,$fileName);
            
            
    
        }else{
            $fileName = "";
        }
        // dd($request->name);
        $item = $request->user()->items()->create([
            'image_file_name' => $fileName,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'time_limit' => $request->time_limit,
        ]);
        
        
        
        
        if ($request->hasFile('image_file_name')) {
            
            
            $image = $request->file('image_file_name');
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            $item->imgpath = Storage::disk('s3')->url($path);
            $imgpath = $item->imgpath;
            $item->save();
    
        }else{
            $fileName = "";
        }
        
        
        
        
        
        
        /**
        if($file = $request->image_file_name){
            

            $fileName =time(). '.' .$file->getClientOriginalExtension();
            
            //$target_path = public_path('/uploads/');
            
            
            //$file->move($target_path,$fileName);
            
            
    
        }else{
            $fileName = "";
        }
        // dd($request->name);
        $request->user()->items()->create([
            'image_file_name' => $fileName,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'time_limit' => $request->time_limit,
        ]);
        
        **/
        
        /**
        $file_name = time() . '.' . request()->image_file_name->getClientOriginalName();
        // file??????????????????
        // Unique????????????????????????????????????????????????time()?????????????????????
        
        $request->file('image_file_name')->storeAs('public',$file_name);
        // storage????????????public????????????????????????$file_name?????????
        
        // ????????????????????????????????????Up???????????????Path?????????
        $imagepath = '/storage/' . $file_name;
        
        $loginId = Auth::id();
        $profileInfo = User::find($loginId);
        // Model?????????
        
        $profileInfo->imagepath = $imagepath;
        // imagepath??????????????????????????????
        $profileInfo->save();
        
        **/
        
        // ??????URL??????????????????????????????
        return redirect('/');
        // return view('welcome');
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
        if (\Auth::check()) { // ?????????????????????
            
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
        $item->save();
        
        return view('items.show', [
            'item' => $item,
            'user' => $user,
            'messages' => $messages,
            '$nego_status' => $nego_status,
            ]);
        
    }
    
    
}
