<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MessagesController::class, 'index']);
Route::resource('messages', MessagesController::class);

// CRUD
// メッセージの個別詳細ページ表示
Route::get('messages/{id}', [MessagesController::class, 'show'])->name('messages.show');
// メッセージの新規登録を処理（新規登録画面を表示するためのものではありません）
Route::post('messages', [MessagesController::class, 'store'])->name('messages.store');
// メッセージの更新処理（編集画面を表示するためのものではありません）
Route::put('messages/{id}', [MessagesController::class, 'update'])->name('messages.update');
// メッセージを削除
Route::delete('messages/{id}', [MessagesController::class, 'destroy'])->name('messages.destory');

// index: showの補助ページ
Route::get('messages', [MessagesController::class, 'index'])->name('messages.index');
// create: 新規作成用のフォームページ
Route::get('messages/create', [MessagesController::class, 'create'])->name('messages.create');
// edit: 更新用のフォームページ
Route::get('messages/{id}/edit', [MessagesController::class, 'edit'])->name('messages.edit');
