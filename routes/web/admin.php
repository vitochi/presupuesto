<?php

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
	
	Route::get('/', 'Dashboard@index')->name('admin_dashboard');

	Route::get('/agenda', function(){

		return 'Admin Agenda';
	
	})->name('admin_agenda');

	
	Route::post('/events/create', function(){

		return 'Event created!';
	});

	Route::catch(function() {

		throw new NotFoundHttpException;

	});