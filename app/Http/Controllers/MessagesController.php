<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;
use App\Category;
use App\User;

class MessagesController extends Controller
{
    public function index($id)
    {
        
        if (\Auth::check()) { // 認証済みの場合
            
            $item = Item::findOrFail($id);
            $user = \Auth::user();
            
            $messages = $item->messages()->orderBy('created_at', 'desc')->paginate(10);
            
            return view('messages.messages', [
                'user' => $user,
                'item' => $item,
                'messages' => $messages,
            ]);

            
        }

    }
    
    public function store(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        $request->user()->messages()->create([
            'item_id' => $id,
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $message = \App\Message::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $message->user_id) {
            $message->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
