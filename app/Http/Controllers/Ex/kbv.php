<?php
Route::domain('kbv-iss.core' )
->namespace('Ex\Kbv')->group(function () {
  Route::get('/','WelcomeController@index');
  Route::post('/','WelcomeController@login');
});


?>
