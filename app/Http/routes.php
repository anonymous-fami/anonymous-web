<?php

//GET method
Route::get('/','CabinetController@indexPage');//старотовая страница кабинета
Route::get('/login','IndexController@loginPage');//страница входа
Route::get('/logout','CabinetController@logout');//страница выхода
Route::get('/registration', 'IndexController@registrationPage');//Страница регистрации нового аккаунта
Route::get('/api_access', 'CabinetController@apiAccessPage');//Страница доступа по api
Route::get('/store_results', 'CabinetController@storeResultsPage');//Страница хранилища результатов


//POST method
Route::post('/login', 'IndexController@login');//авторизация пользователя
Route::post('/registration','IndexController@registration');//регистрация нового пользователя

//AJAX method
Route::post('/ajax/generate_key', 'AjaxController@generateKey');//генерация ключа api
Route::post('/ajax/delete_key', 'AjaxController@deleteKey');//удаление ключа api