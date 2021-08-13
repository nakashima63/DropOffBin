<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;

class ItemsController extends Controller
{
    public function index()
    {   
        return view('welcome');
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
            'image_file_name' => 'required',
            'name' => 'required',
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $request->user()->items()->create([
            'image_file_name' => $request->image_file_name,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'time_limit' => $request->time_limit,
        ]);
        
        // 前のURLへリダイレクトさせる
        return view('welcome');
    }
    
    // ひとまず出品を削除できる機能　後で変更
    public function destroy($id)
    {
        // idの値で出品を検索して取得
        $item = \App\Item::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその出品物の所有者である場合は、出品を削除
        if (\Auth::id() === $item->user_id) {
            $item->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
}
