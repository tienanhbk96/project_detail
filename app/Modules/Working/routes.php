<?php
$namespace = 'App\Modules\Working\Controllers';


Route::group(
    ['module' => 'Working', 'namespace' => $namespace],
    function() {

        Route::get('/time', [
            'as' => 'time',
            'uses' => 'TimeSearchController@time'
        ]);
        
            
        Route::get('/time-detail', [
            'as' => 'time-detail',
            'uses' => 'TimeSearchController@detail'
        ]);
       

       
        
    }

);