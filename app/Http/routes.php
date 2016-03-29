<?php

//GET method
Route::get('/','CabinetController@indexPage');//старотовая страница кабинета
Route::get('/login','IndexController@loginPage');//страница входа
Route::get('/logout','CabinetController@logout');//страница выхода
Route::get('/registration', 'IndexController@registrationPage');//Страница регистрации нового аккаунта


//POST method
Route::post('/login', 'IndexController@login');//авторизация пользователя
Route::post('/registration','IndexController@registration');//регистрация нового пользователя
