<?php
/*
 * Codecanyon
 * Name:Ajay Kumar choudhary
 * Email:ajay@froiden.com
 */

# Employee Login
    Route::get('/',['as'=>'login','uses'=>'LoginController@index']);
    Route::post('/login',['as'=>'login','uses'=>'LoginController@ajaxLogin']);
    Route::get('logout', ['as'=>'front.logout','uses'=>'LoginController@logout']);

# Employee Panel After Login
Route::group(array('before' => 'auth.employees'), function()
{
    Route::post('/change_password_modal',['as'=>'front.change_password_modal','uses'=>'DashboardController@changePasswordModal']);
    Route::post('/change_password',['as'=>'front.change_password','uses'=>'DashboardController@change_password']);
    Route::get('ajaxApplications/{$id}',['as'=>'front.leave_applications','uses'=> 'DashboardController@ajaxApplications']);

    Route::get('leave',['as'=>'front.leave','uses'=>'DashboardController@leave']);

    Route::post('dashboard/notice/{id}',['as'=>'front.notice_ajax','uses'=>'DashboardController@notice_ajax']);

    Route::post('leave_store',['as'=>'front.leave_store','uses'=>'DashboardController@leave_store']);

    Route::resource('dashboard','DashboardController');
});


# Admin Login
Route::group(array('prefix' => 'admin'), function()
{

	Route::get('/',['as'=>'admin.getlogin','uses'=>'AdminLoginController@index']);
	Route::get('logout',['as'=>'admin.logout','uses'=> 'AdminLoginController@logout']);

    Route::post('login',['as'=>'admin.login','uses'=> 'AdminLoginController@ajaxAdminLogin']);

});


// Admin Panel After Login
Route::group(array('prefix' => 'admin','before' => 'auth.admin|lock'), function()
{

    //	Dashboard Routing
    //Route::resource('dashboard', 'AdminDashboardController');
    Route::resource('dashboard', 'AdminDashboardController',['as' => 'admin']);
	
	Route::resource('payroll', 'PayrollController@index');

    //    Employees Routing
	Route::get('employees/export',['as'=>'admin.employees.export','uses'=>'EmployeesController@export']);
    Route::get('employees/employeeLogin/{id}',['as'=>'admin.employees.employeeLogin','uses'=>'EmployeesController@employeesLogin']);
    Route::resource('employees', 'EmployeesController',['except' => ['show'],'as' => 'admin']);


    //  Awards Routing
    Route::get('ajax_awards/',['as'=>'admin.ajax_awards','uses'=> 'AwardsController@ajax_awards']);
    Route::resource('awards', 'AwardsController',['except'=>['show'],'as' => 'admin']);

    //  Department Routing
    Route::get('departments/ajax_designation/',['as'=>'admin.departments.ajax_designation','uses'=> 'DepartmentsController@ajax_designation']);
    Route::resource('departments', 'DepartmentsController',['except' => ['show','create'],'as' => 'admin']);

    //    Expense Routing
    Route::get('ajax_expenses/',['as'=>'admin.ajax_expenses','uses'=> 'ExpensesController@ajax_expenses']);
    Route::resource('expenses', 'ExpensesController',['except' => ['show'],'as' => 'admin']);

    //    Holiday Routing
    Route::get('holidays/mark_sunday', 'HolidaysController@Sunday');
    Route::resource('holidays', 'HolidaysController',['as' => 'admin']);

    //  Routing for the attendance
    Route::get('attendances/report/{attendances}', ['as'=>'admin.attendance.report','uses'=>'AttendancesController@report']);
    Route::resource('attendances', 'AttendancesController',['as' => 'admin']);

    //    Routing or the leavetypes
    Route::resource('leavetypes', 'LeavetypesController',['except'=>['show'],'as' => 'admin']);

    //    Leave Applications routing
    Route::get('leave_applications/ajaxApplications',['as'=>'admin.leave_applications','uses'=> 'LeaveApplicationsController@ajaxApplications']);
    Route::resource('leave_applications', 'LeaveApplicationsController',['except'=>['create','store','edit'],'as' => 'admin']);

    //   Routing for setting
    Route::resource('settings', 'SettingsController',['only'=>['edit','update'],'as' => 'admin']);

    //    Salary Routing
    Route::resource('salary','SalaryController',['only'=>['destroy','update','store'],'as' => 'admin']);

    //    Profile Setting
    Route::resource('profile_settings', 'ProfileSettingsController',['only'=>['edit','update'],'as' => 'admin']);

    //   Notification Setting

	Route::post('ajax_update_notification',['as'=>'admin.ajax_update_notification','uses'=> 'NotificationSettingsController@ajax_update_notification']);
    Route::resource('notificationSettings', 'NotificationSettingsController',['only'=>['edit','update'],'as' => 'admin']);

    //  Notice Board
    Route::get('ajax_notices/',['as'=>'admin.ajax_notices','uses'=> 'NoticeboardsController@ajax_notices']);
    Route::resource('noticeboards', 'NoticeboardsController',['except'=>['show'],'as' => 'admin']);

});

// Lock Screen Routing
Route::get('screenlock', 'AdminDashboardController@screenlock');

//Event for updating the last login of user
Event::listen('auth.login', function($user)
{
    $user->last_login = new DateTime;
    $user->save();
});
