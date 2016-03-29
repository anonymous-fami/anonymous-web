<?php

//GET method
Route::get('/', 'IndexController@home');
Route::get('/login','UserController@loginPage');//страница входа


