<?php
Route::get('/',                                 ['as' => 'frontend.index',      'uses' => 'Frontend\IndexController@index']);


// Authentication Routes...
Route::get('/login',                            ['as' => 'show_login_form',     'uses' => 'Frontend\Auth\LoginController@showLoginForm']);
Route::post('login',                            ['as' => 'login',               'uses' => 'Frontend\Auth\LoginController@login']);
Route::post('logout',                           ['as' => 'logout',              'uses' => 'Frontend\Auth\LoginController@logout']);
Route::get('register',                          ['as' => 'show_register_form',  'uses' => 'Frontend\Auth\RegisterController@showRegistrationForm']);
Route::post('register',                         ['as' => 'register',            'uses' => 'Frontend\Auth\RegisterController@register']);
Route::get('password/reset',                    ['as' => 'password.request',    'uses' => 'Frontend\Auth\ForgotPasswordController@showLinkRequestForm']);
Route::post('password/email',                   ['as' => 'password.email',      'uses' => 'Frontend\Auth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('password/reset/{token}',            ['as' => 'password.reset',      'uses' => 'Frontend\Auth\ResetPasswordController@showResetForm']);
Route::post('password/reset',                   ['as' => 'password.update',     'uses' => 'Frontend\Auth\ResetPasswordController@reset']);
Route::get('email/verify',                      ['as' => 'verification.notice', 'uses' => 'Frontend\Auth\VerificationController@show']);
Route::get('/email/verify/{id}/{hash}',         ['as' => 'verification.verify', 'uses' => 'Frontend\Auth\VerificationController@verify']);
Route::post('email/resend',                     ['as' => 'verification.resend', 'uses' => 'Frontend\Auth\VerificationController@resend']);


Route::group(['prefix' => 'admin'], function () {
    // Authentication Routes...
    Route::get('/login',                            ['as' => 'admin.show_login_form',       'uses' => 'Backend\Auth\LoginController@showLoginForm']);
    Route::post('login',                            ['as' => 'admin.login',                 'uses' => 'Backend\Auth\LoginController@login']);
    Route::post('logout',                           ['as' => 'admin.logout',                'uses' => 'Backend\Auth\LoginController@logout']);
    Route::get('password/reset',                    ['as' => 'admin.password.request',      'uses' => 'Backend\Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email',                   ['as' => 'admin.password.email',        'uses' => 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}',            ['as' => 'admin.password.reset',        'uses' => 'Backend\Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset',                   ['as' => 'admin.password.update',       'uses' => 'Backend\Auth\ResetPasswordController@reset']);
    Route::get('email/verify',                      ['as' => 'admin.verification.notice',   'uses' => 'Backend\Auth\VerificationController@show']);
    Route::get('/email/verify/{id}/{hash}',         ['as' => 'admin.verification.verify',   'uses' => 'Backend\Auth\VerificationController@verify']);
    Route::post('email/resend',                     ['as' => 'admin.verification.resend',   'uses' => 'Backend\Auth\VerificationController@resend']);


});

Route::get('/contact-us',                       ['as' => 'frontend.contact',                'uses' => 'Frontend\IndexController@contact']);
Route::post('/contact-us',                      ['as' => 'frontend.do_contact',             'uses' => 'Frontend\IndexController@do_contact']);
Route::get('/category/{category_slug}',         ['as' => 'frontend.category.posts',         'uses' => 'Frontend\IndexController@category']);
Route::get('/archive/{date}',                   ['as' => 'frontend.archive.posts',          'uses' => 'Frontend\IndexController@archive']);
Route::get('/author/{username}',                ['as' => 'frontend.author.posts',           'uses' => 'Frontend\IndexController@author']);
Route::get('/search',                           ['as' => 'frontend.search',                 'uses' => 'Frontend\IndexController@search']);
Route::get('/{post}',                           ['as' => 'posts.show',                      'uses' => 'Frontend\IndexController@post_show']);
Route::post('/{post}',                          ['as' => 'posts.add_comment',               'uses' => 'Frontend\IndexController@store_comment']);