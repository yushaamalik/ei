<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@home')->name('dashboard');
Route::get('/', 'HomeController@home')->name('dashboard');

Route::middleware(['auth:admin'])->group(function () {
        Route::get('/acl/add-role', 'AclController@addRole')->name('acl.addRole');
        Route::post('/acl/save-role', 'AclController@saveRole')->name('acl.saveRole');

        Route::get('/acl/roles', 'AclController@rolesListing')->name('acl.rolesListing');
	Route::get('/acl/role-view/{id}', 'AclController@viewRole')->name('acl.viewRole');

        Route::get('/acl/role-edit/{id}', 'AclController@editRole')->name('acl.editRole');
	Route::put('/acl/role-update/{id}', 'AclController@updateRole')->name('acl.updateRole');
	Route::put('/acl/role-delete/{id}', 'AclController@deleteRole')->name('acl.deleteRole');

        Route::get('/acl/permissions','AclController@permissionsListing')->name('acl.permissionsListing');
        Route::get('/acl/add-permission', 'AclController@addPermission')->name('acl.addPermission');
        Route::post('/acl/save-permission-action', 'AclController@savePermission')->name('acl.savePermission');
        Route::get('/acl/permission-view/{id}','AclController@viewPermission')->name('acl.viewPermission');
        Route::get('/acl/permission-edit/{id}','AclController@editPermission')->name('acl.editPermission');
	Route::put('/acl/permission-update/','AclController@updatePermission')->name('acl.updatePermission');
	Route::put('/acl/permission-delete/{id}','AclController@deletePermission')->name('acl.deletePermission');


        Route::get('/acl/assign-role', 'AclController@assignRole')->name('acl.assignRole');
        Route::post('/acl/assign-role-save', 'AclController@assignRoleSave')->name('acl.assignRoleSave');


        Route::get('/acl/add-user', 'AclController@addUser')->name('acl.addUser');
        Route::post('/acl/add-user-save', 'AclController@saveUser')->name('acl.saveUser');

        //Students

        Route::get('/students/add-student', 'StudentsController@addStudent')->name('student.addStudent');
        Route::post('/students/save-student', 'StudentsController@saveStudent')->name('student.saveStudent');


        //Attendance

        Route::get('/attendance/run-face-recognition', 'AttendancesController@runFaceRecognition')->name('attendance.runFaceRecognition');

        //Lectures

        Route::get('/lecture/speech-to-text', 'LecturesController@speechToText')->name('lecture.speechToText');
        

});








