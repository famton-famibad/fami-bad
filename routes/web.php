<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tbm_teamController;

// Tbw_teamsのルーティング設定　これで登録画面や更新画面のパスが作成される
Route::resource('team', Tbm_teamController::class);

// クエリパラメータを処理するためのルートを追加
Route::get('team/search-by-prefecture/{prefecture}', [Tbm_teamController::class, 'search'])->name('team.search');


// Tbw_taikaisのルーティング設定　これで登録画面や更新画面のパスが作成される
Route::resource('taikai', 'App\Http\Controllers\Tbw_taikaiController');

Route::get('/', function () {
    return view('fami_bad_main.index');
});