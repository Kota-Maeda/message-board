<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class MessagesController extends Controller
{
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        // メッセージ一覧を取得
        $messages = Message::all();         // 追加

        // メッセージ一覧ビューでそれを表示
        return view('messages.index', [     // 追加
            'messages' => $messages,        // 追加
        ]);                                 // 追加
    }
    
    public function create()
    {
        $message = new Message;
        
        // メッセージ作成ビューを表示
        return view('messages.create', [
            'message' => $message,
        ]);
    }
    
    public function store(Request $request)
    {
        //バリデーション(検証)
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
        
        //メッセージを作成
        $message = new Message;
        $message->title = $request->title;
        $message->content = $request->content;
        $message->save;
        
        //トップページにダイレクトさせる
        return redirect('/');
    }
    
    public function show($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //メッセージ詳細ビューでそれを表示
        return view('messages.show',[
            'message' => $message,
            ]);
    }
    
    public function edit($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //メッセージ編集ビューでそれを表示
        return view('messages.edit',[
            'message' => $message,
            ]);
    }
    
    public function update(Request $request, $id)
    {
        //バリデーション（検証）
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
        
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        //メッセージを更新
        $message->title = $request->title;
        $message->content = $request->content;
        $message->save();
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        //メッセージを削除
        $message->delete();
        
        //トップページへリダイレクトさせる
        return redirect('/');
    }
}
