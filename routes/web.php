<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/info','ClientController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*Route::get('/asd',function(){
    if(!function_exists('get_avatar')){
        function get_avatar($str){
            $acronym="";
            $word="";
            $words = preg_split("/(\s|\-|\.)/", $str);
            foreach($words as $w) {
                $acronym .= substr($w,0,1);
            }
            $word = $word . $acronym ;
            return $word;
        }
    }
    echo(strtoupper(get_avatar("gooo mddd")));
});
Route::get('/num',function(){
    return(str_pad(99, 5, '0', STR_PAD_LEFT));
});
*/