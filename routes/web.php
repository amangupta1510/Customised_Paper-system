<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route to login and logout


  Route::prefix('/admin')->group(function() {
      Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin-form');
      Route::post('login', 'Auth\AdminLoginController@attemptlogin')->name('admin-login');
      Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin-logout');
      Route::get('/dashboard', 'AdminController@index')->name('admin-dashboard');
      Route::get('/profile', 'AdminController@profile')->name('admin-profile');
      Route::get('/', 'HomeController@indexb');

      //-----------------------------------------Custom paper Template-----------------------------------
      Route::get('/custom_paper_templates', 'AdminCustomPaperController@custom_paper_templates')->name('admin-custom_paper_templates');
      Route::get('/create_custom_paper_templates', 'AdminCustomPaperController@create_custom_paper_templates')->name('admin-create_custom_paper_templates');
      Route::POST('/create_custom_paper_templates_submit', 'AdminCustomPaperController@create_custom_paper_templates_submit')->name('admin-create_custom_paper_templates_submit');
      Route::get('/edit_custom_paper_templates', 'AdminCustomPaperController@edit_custom_paper_templates')->name('admin-edit_custom_paper_templates');
      Route::POST('/edit_custom_paper_templates_submit', 'AdminCustomPaperController@edit_custom_paper_templates_submit')->name('admin-edit_custom_paper_templates_submit');
      Route::get('/custom_paper_list', 'AdminCustomPaperController@custom_paper_list')->name('admin-custom_paper_list');
      Route::POST('/delete_custom_paper_templates', 'AdminCustomPaperController@delete_custom_paper_templates')->name('admin-delete_custom_paper_templates'); 
      Route::POST('/create_custom_papers', 'AdminCustomPaperController@create_custom_papers')->name('admin-create_custom_papers');

      //----------------------------------------Custom Paper---------------------------------------------------
      Route::get('/custom_papers', 'AdminCustomPaperController@custom_papers')->name('admin-custom_papers');
      Route::get('/custom_paper_page/', 'AdminSimplePaperController@custom_papers_page')->name('admin-custom_paper_page');
      Route::get('/edit_custom_papers', 'AdminCustomPaperController@edit_custom_papers')->name('admin-edit_custom_papers');
      Route::POST('/edit_custom_papers_submit', 'AdminCustomPaperController@edit_custom_papers_submit')->name('admin-edit_custom_papers_submit');
      Route::POST('/delete_custom_papers', 'AdminCustomPaperController@delete_custom_papers')->name('admin-delete_custom_papers');
      //Route::get('/custom_paper_templates', 'AdminCustomPaperController@custom_paper_templates')->name('admin-custom_paper_templates');
      Route::get('/cm_ques_upload', 'AdminCustomPaperController@custompaperquesupload')->name('admin-custom_paper_ques_upload');
      Route::POST('/cm_ques_upload_submit', 'AdminCustomPaperController@custompaperquesuploadsubmit')->name('admin-custom_paper_ques_upload_submit');
      Route::POST('/cm_sol_upload_submit', 'AdminCustomPaperController@custompapersoluploadsubmit')->name('admin-custom_paper_sol_upload_submit');
      Route::get('/cm_ans_upload', 'AdminCustomPaperController@custompaperansupload')->name('admin-custom_paper_ans_upload');
      Route::POST('/cm_ans_upload_submit', 'AdminCustomPaperController@custompaperansuploadsubmit')->name('admin-custom_paper_ans_upload_submit');
      Route::get('/get_results_json', 'AdminCustomPaperController@get_results_json')->name('admin-get_results_json');
      Route::POST('/update_results_submit', 'AdminCustomPaperController@update_results_submit')->name('admin-update_results_submit');
      Route::get('/cm_update_result_page', 'AdminCustomPaperController@custompaperupdateresultpage')->name('admin-custom_paper_update_result_page');
      Route::POST('/cm_update_result', 'AdminCustomPaperController@custompaperupdateresult')->name('admin-custom_paper_update_result');
      Route::get('/cm_publish', 'AdminCustomPaperController@custompaperpublish')->name('admin-custom_paper_publish');
      Route::POST('/cm_publish_submit', 'AdminCustomPaperController@custompaperpublishsubmit')->name('admin-custom_paper_publish_submit');
      Route::get('/cm_image/', 'AdminCustomPaperController@customimage')->name('admin-cm_image');
      Route::POST('/delete_image','AdminCustomPaperController@delete_image')->name('admin-delete_image');
      Route::get('/cm_p_summary', 'AdminCustomPaperController@cm_p_summary')->name('admin-custom_paper_summary');
      Route::get('/move_to_test_series/', 'AdminCustomPaperController@move_to_test_series')->name('admin-move_to_test_series');
      Route::get('/list_of_folder/', 'AdminCustomPaperController@list_of_folder')->name('admin-list_of_folder');
      //Route::POST('/deletecmpaper', 'AdminCustomPaperController@deletecmpaper')->name('admin-delete_cm_paper');
      //Route::get('/cm_paper_downtown', 'AdminCustomPaperController@cm_paper_download')->name('admin-cm_paper_download');
      //Route::get('/cm_paper_uptown', 'AdminCustomPaperController@cm_paper_upload')->name('admin-cm_paper_upload');
      //Route::POST('/cm_paper_uptown_submit', 'AdminCustomPaperController@cm_paper_upload_submit')->name('admin-cm_paper_upload_submit');

  });