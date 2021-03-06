<?php

$namespace ="Survey\Http\Controllers";

Route::group([
    'namespace' => $namespace,
    'prefix'    => 'audit',
    'middleware' => 'web'
],function(){
    Route::get('/','SurveyController@index');

    Route::get('/test','SurveyController@test');
    Route::get('/add' ,'SurveyController@create')->name('survey.create');
    Route::post('/add', 'SurveyController@store')->name('survey.store');
    Route::get('/view/{audit}', 'SurveyController@show')->name('survey.show');
    Route::post('/audit/checklist', 'AuditController@store')->name('audit.checklist.store');

    Route::get('/again', function () {
        return 'I am again';
    });
});