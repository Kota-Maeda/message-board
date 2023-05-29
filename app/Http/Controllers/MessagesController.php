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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new Message;
        
        // メッセージ作成ビューを表示
        return view('messages.create', [
            'message' => $message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //メッセージを作成
        $message = new Message;
        $message->content = $request->content;
        $message->save;
        
        //トップページにダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //メッセージ詳細ビューでそれを表示
        return view('messages.show',[
            'message' => $message,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        
        //メッセージ編集ビューでそれを表示
        return view('messages.edit',[
            'message' => $message,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        //メッセージを更新
        $message->content = $request->content;
        $message->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
