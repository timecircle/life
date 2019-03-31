<?php
Route::domain('kbv-iss.core' )
->namespace('Kbv\Controllers')->group(function () {
  Route::get('/','WelcomeController@index');
  Route::post('/','WelcomeController@login');
  Route::get('/{page}','PageController@index');
});


?>
