<?php
	
	Route::get('/', 'Dashboard@index')->name('admin_dashboard');

	Route::get('/agenda', function(){

		return 'Admin Agenda';
	
	})->name('admin_agenda');