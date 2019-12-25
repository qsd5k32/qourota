<?php


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::get('{path}', function () {
    return file_get_contents(public_path('index.html'));
})->where('path', '(.*)');


