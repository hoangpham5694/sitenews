<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('{type}.xml', 'RssController@index');

Route::get('fbinstant.rss', 'RssController@fbinstant');

Route::get('{type}.json', 'RssController@json');


Route::get('/', ['uses'=>'HomeController@getIndex']);
Route::get('danh-muc/{cateslug}.{cateid}.html',['uses'=>'HomeController@getListPosts']);

Route::get('{cateslug}/{slug}.{id}.html',['uses'=>'HomeController@getDetailPost']);


Route::get('tim-kiem.html',['uses'=>'HomeController@getSearchPost']);
Route::group(['prefix' => 'api'], function(){
	
	Route::group(['prefix' => 'post'], function(){
		Route::get('list-posts/{max}/{page}',['uses'=>'PostController@getListPostsWithCateAjax']);
    Route::get('search-posts/{max}/{page}',['uses'=>'PostController@getListPostsSearchAjax']);
	});
	


});


Route::get('login',['uses'=>'LoginController@getLogin']);
Route::post('login',['as'=>'getLogin','uses'=>'LoginController@postLogin']);
Route::get('logout',['uses'=>'LoginController@getLogout']);
Route::group(['middleware'=>'isroleadmin'], function(){
	Route::group(['prefix' => 'adminsites'], function(){
		Route::get('/', function(){
    		return view('admins.dashboard.main');
    	});
    	Route::group(['prefix' => 'category'], function(){
    		Route::get('list',['uses'=>'CategoryController@getCateList']);

    		Route::group(['prefix' => 'ajax'], function(){
    			Route::get('list/{max}/{page}',['uses'=>'CategoryController@getCateListAjax']);
    			Route::get('total',['uses'=>'CategoryController@getTotalCategoriesAjax']);
    			Route::get('add',['uses'=>'CategoryController@getAddCateAjax']);
                Route::get('edit',['uses'=>'CategoryController@getEditCateAjax']);
                Route::get('delete/{id}',['uses'=>'CategoryController@getDeleteCateAjax']);
    		});
    	});
      Route::group(['prefix' => 'systempost'], function(){
        Route::get('list',['uses'=>'SystemPostController@getSystemPostLisAdmin']);
        Route::get('add',['uses'=>'SystemPostController@getAddSystemPostAdmin']);
        Route::post('add',['uses'=>'SystemPostController@postAddSystemPostAdmin']);
        Route::get('edit/{id}',['uses'=>'SystemPostController@getEditSystemPostAdmin']);
        Route::post('edit/{id}',['uses'=>'SystemPostController@postEditSystemPostAdmin']);
        Route::get('detail/{id}',['uses'=>'SystemPostController@getDetailSystemPostAdmin']);
        Route::group(['prefix' => 'ajax'], function(){
            Route::get('list/{max}/{page}',['uses'=>'SystemPostController@getSystemPostListAjax']);
            Route::get('total',['uses'=>'SystemPostController@getTotalSystemPostAjax']);
            Route::get('setstatus/{softwareid}/{status}',['uses'=>'SystemSystemPostController@getSetStatusAjax']);
            Route::get('delete/{id}',['uses'=>'SystemPostController@getDeleteSystemPostAjax']);
            Route::get('make-feature/{id}',['uses'=>'SystemPostController@getMakeFeatureSystemPostAjax']);
            Route::get('undo-feature/{id}',['uses'=>'SystemPostController@getUndoFeatureSystemPostAjax']);
        });
      });
        Route::group(['prefix' => 'user'], function(){
            Route::get('list',['uses'=>'UserController@getUserList']);
            Route::get('add',['uses'=>'UserController@getUserAdd']);
            Route::post('add',['uses'=>'UserController@postUserAdd']);
            Route::get('edit/{id}',['uses'=>'UserController@getUserEdit']);
            Route::post('edit/{id}',['uses'=>'UserController@postUserEdit']);

            Route::group(['prefix' => 'ajax'], function(){
                Route::get('list/{max}/{page}',['uses'=>'UserController@getListUserAjax']);
                Route::get('total',['uses'=>'UserController@getTotalUserAjax']);
                Route::get('delete/{id}',['uses'=>'UserController@getDeleteUserAjax']);
                Route::get('checkunique/{username?}',['uses'=>'UserController@getCheckUniqueUserAjax']);
            });
        });
        Route::group(['prefix' => 'account'], function(){
    		Route::get('edit-profile',['uses'=>'AccountController@getEditProfile']);
            Route::post('edit-profile',['uses'=>'AccountController@postEditProfile']);

    	});
	});
});
Route::group(['middleware'=>'isrolemanager'], function(){
	Route::group(['prefix' => 'managersites'], function(){
		Route::get('/', function(){
          return view('managers.dashboard.main');
      });

        Route::group(['prefix' => 'post'], function(){
           Route::get('add',['uses'=>'PostController@getAddPostManager']);
           Route::post('add',['uses'=>'PostController@postAddPostManager']);
           Route::get('edit/{id}',['uses'=>'PostController@getEditPostManager']);
           Route::post('edit/{id}',['uses'=>'PostController@postEditPostManager']);
           Route::get('detail/{id}',['uses'=>'PostController@getDetailPostManager']);
           Route::get('list',['uses'=>'PostController@getListPostManager']);
           Route::group(['prefix' => 'ajax'], function(){
            Route::get('list/{max}/{page}',['uses'=>'PostController@getPostListAjax']);
            Route::get('total',['uses'=>'PostController@getTotalPostAjax']);
            Route::get('setstatus/{softwareid}/{status}',['uses'=>'PostController@getSetStatusAjax']);
            Route::get('delete/{id}',['uses'=>'PostController@getDeletePostAjax']);
            Route::get('make-feature/{id}',['uses'=>'PostController@getMakeFeaturePostAjax']);
            Route::get('undo-feature/{id}',['uses'=>'PostController@getUndoFeaturePostAjax']);
        });
       });

    });

});
