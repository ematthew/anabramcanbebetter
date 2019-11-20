<?php
/*
|--------------------------------------------------------------------------
| ENTRY SECTION
|--------------------------------------------------------------------------
*/
Route::get('/', 				'ExternalPageController@index');
Route::get('/events', 			'ExternalPageController@events')->name('events');
Route::get('/musics', 			'ExternalPageController@musics')->name('musics');
Route::get('/articles', 		'ExternalPageController@articles')->name('articles');
Route::get('/article/{id}', 	'ExternalPageController@article')->name('article');
Route::get('/music/{id}', 		'ExternalPageController@music')->name('music');
Route::get('/view/article/{title}',	'ExternalPageController@articleByTitle')->name('article_by_title');
Route::get('/shows', 			'ExternalPageController@shows')->name('shows');
Route::get('/charts', 			'ExternalPageController@charts')->name('charts');
Route::get('/privacy/policy',	'ExternalPageController@privacyPolicy')->name('privacy_policy');
Route::get('/terms/conditions',	'ExternalPageController@termsConditions')->name('terms_conditions');
Route::get('/google3fdba9c0c9b14cfc', 'ExternalPageController@googleFile');

/*
|--------------------------------------------------------------------------
| FETCH ARTICLES SECTION
|--------------------------------------------------------------------------
*/
Route::get('clients/articles',	'ClientJsonResponseController@fetchArticles');
Route::get('clients/trending/articles', 'ClientJsonResponseController@fetchTrendingArticles');

/*
|--------------------------------------------------------------------------
| ADD COMMENTS SECTION
|--------------------------------------------------------------------------
*/
Route::post('add/new/comment',	'CommentJsonController@addNewComment');
Route::get('get/all/comments',	'CommentJsonController@fetchAllComments');


/*
|--------------------------------------------------------------------------
| ADMIN PAGE SECTION
|--------------------------------------------------------------------------
*/
Route::get('admin/login', 		'AdminPageController@login')->name('login_admin_view');
Route::get('admin/dashboard',	'AdminPageController@dashboard')->name('admin_dashboard');
Route::get('admin/articles',	'AdminPageController@articles')->name('admin_articles');
Route::get('admin/musics',		'AdminPageController@musics')->name('admin_musics');
Route::get('admin/events',		'AdminPageController@events')->name('admin_events');
Route::get('admin/videos',		'AdminPageController@videos')->name('admin_videos');
Route::get('admin/charts',		'AdminPageController@charts')->name('admin_charts');
Route::get('admin/settings',	'AdminPageController@settings')->name('admin_settings');
Route::get('admin/users',		'AdminPageController@users')->name('admin_users');
Route::get('admin/wnews',		'AdminPageController@wnews')->name('admin_wnews');
Route::get('admin/unauthorized','AdminPageController@unauthorized')->name('admin_unauthorized');
Route::get('admin/logout',		'AdminPageController@logout')->name('admin_logout');


/*
|--------------------------------------------------------------------------
| ADMIN JSON SECTION
|--------------------------------------------------------------------------
*/
Route::post('admin/login', 'AdminJsonResponseController@doLogin')->name('login_admin');
Route::post('create/new/user', 'AdminJsonResponseController@createUser');


/*
|--------------------------------------------------------------------------
| ADMIN ARTICLE JSON SECTION
|--------------------------------------------------------------------------
*/
Route::post('add/new/article', 'ArticleJsonController@addArticle')->name('add_article');
Route::get('get/all/articles', 'ArticleJsonController@getArticles')->name('get_articles');
Route::post('delete/article',	'ArticleJsonController@deleteArticle')->name('delete_article');
Route::get('fetch/article/by/{id}',	'ArticleJsonController@getArticle')->name('get_article_by_id');
Route::get('fetch/related/articles', 'ArticleJsonController@getRelatedArticle');
// Route::get('fetch/article/{title}',	'ArticleJsonController@getArticleByTitle')->name('get_article_by_id');
Route::post('update/new/article', 'ArticleJsonController@updateArticle')->name('update_article');
Route::post('update/remote/news', 'ArticleJsonController@updateRemoteNews');


/*
|--------------------------------------------------------------------------
| ADMIN ARTICLE JSON SECTION
|--------------------------------------------------------------------------
*/
Route::post('add/new/music', 'MusicJsonController@addNewMusic')->name('add_music');
Route::get('get/all/musics', 'MusicJsonController@getAllMusics')->name('get_musics');
Route::post('search/all/musics', 'MusicJsonController@searchMusics')->name('search_musics');

/*
|--------------------------------------------------------------------------
| FOR DEVELOPERS ONLY AND DEVS OPS
|--------------------------------------------------------------------------
*/
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('migrate',	function(){
	Artisan::call('migrate');
	return redirect()->back();
});

Route::get('flush',	function(){
	Artisan::call('migrate:reset');
	return redirect()->back();
});

Route::get('rollback',	function(){
	Artisan::call('migrate:rollback');
	return redirect()->back();
});

Route::get('server-up',	function(){
	Artisan::call('up');
	return redirect()->back();
});

Route::get('server-down',	function(){
	Artisan::call('down');
	return redirect()->back();
});

Route::get('server-reset',	function(){
	Artisan::call('config:clear');
	Artisan::call('route:clear');
	Artisan::call('view:clear');
	Artisan::call('cache:clear');
	return redirect()->back();
});