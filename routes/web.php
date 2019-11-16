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
Route::resource('story','PostController');//->middleware('auth');

Route::get('/', function() {
    return view('home');
  });

Route::get('/{any}', function ($any) {
    return view('home');
})->where('any', '.*');

Route::post('/profile', [
    'uses' => 'CommunityController@postProfile'
]);
//Route::get('/dashboard', 'DashboardController@index' );
//Route::get('/dashboard/manage', 'DashboardController@manage' );//->middleware('role:superadministrator');;7
//Route::get('/dashboard/twitter', 'DashboardController@userTimeline' );
//Route::get('/dashboard', function(){   return response()->json(['message' => 'Could not create user!'], 500);} );

Route::get('about', 'PageController@getAbout');
Route::get('contact', 'PageController@getContact');
Route::post('contact', 'PageController@postContact');

// Comments
Route::resource('comments','CommentsController');//{post_id}
//Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
//Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);


Route::get('blog/{slug}', [ 'as' => 'blog.single', 'uses' => 'blogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['uses' => 'blogController@getIndex', 'as' => 'blog.index']);



//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home'); 



//-----------------------------------------------------------------------------------------
/*Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', function() {
        if($this->user->isAdmin())
            return redirect('/dashboard/admin');
        if($this->user->isManager())
            return redirect('/dashboard/manager');

        return redirect('/home');
    });*/

    //Route::get('dashboard/admin', 'Admin\dashboard@index');
    Route::get('dashboard/manage', 'DashboardController@influence');
    //Route::get('users', 'PagesController@manageUsers');
//});