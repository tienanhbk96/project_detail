<?php
$namespace = 'App\Modules\User\Controllers';


Route::group(
    ['module' => 'User', 'namespace' => $namespace],
    function() {
        Route::get('index', [
            'as' => 'index',
            'uses' => 'UserController@index'
        ]);
        
        
        Route::post('search', [
            'as' => 'search',
            'uses' => 'UserController@search'
        ]);

        Route::get('index/fetch_data', [
            'as' => 'index
            
            /fetch_data',
            'uses' => 'UserController@fetch_data'
        ]);

        Route::get('insert', [
            'as' => 'insert',
            'uses' => 'DetailController@insert'
        ]);

        

        Route::get('/detail/{id}', [
            'as' => 'detail/{id}',
            'uses' => 'DetailController@detail'
        ]);

        Route::post('update', [
            'as' => 'update',
            'uses' => 'DetailController@update'
        ]);
            
        Route::get('detail/remove/{id}', [
            'as' => 'detail/remove/{id}',
            'uses' => 'DetailController@remove'
        ]);

        Route::post('insert/search', [
            'as' => 'insert/search',
            'uses' => 'DetailController@search'
        ]);

        Route::post('insert/save', [
            'as' => 'insert/save',
            'uses' => 'DetailController@save'
        ]);
        
    }

);