<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの出品一覧を作成日時の降順で取得
        $items = $user->items()->orderBy('created_at', 'desc')->paginate(10);
        
        // ユーザ出品一覧ビューでそれを表示
        return view('myitems.show', [
            'user' => $user,
            'items' => $items,
        ]);
    }
}
