<?php

/*
 * 127.0.0.1:8000/でアクセスされた場合にitems.indexにリダイレクトさせる
 */
Route::get('/', function () {
    return redirect()->route('items.index');
});

/*
 * 商品関連
 */
Route::resource('items', 'ItemController');
Route::get('/items/create', 'ItemController@create')->name('items.create');
Route::post('items/store', 'ItemController@store')->name('items.store');

/*
 * カテゴリ関連
 */
Route::resource('categories', 'CategoryController');
Route::get('categories/create', 'CategoryController@create')->name('categories.create');
Route::post('categories/store', 'CategoryController@store')->name('categories.store');
