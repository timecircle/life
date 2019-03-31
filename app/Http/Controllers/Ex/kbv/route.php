<?php
Route::domain('kbv-iss.core' )->group(function () {
  Route::post('/','Ex\WelcomeController@login');
  Route::get('/{page}','Ex\PageController@index');
});
?>
