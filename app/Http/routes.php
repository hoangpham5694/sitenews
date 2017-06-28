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

Route::get('/', ['uses'=>'HomeController@getIndex']);
Route::get('danh-muc/{cateslug}.{cateid}',['uses'=>'HomeController@getListSoftwareSWithCate']);
Route::get('he-dieu-hanh/{systemslug}.{systemid}',['uses'=>'HomeController@getListSoftwaresWithSystem']);
Route::get('{softwareslug}.{softwareid}.html',['uses'=>'HomeController@getDetailSoftware']);
Route::get('download/{softwareslug}.{softwareid}.html',['uses'=>'HomeController@getDownloadSoftware']);
Route::get('tim-kiem.html',['uses'=>'HomeController@getSearchSoftware']);
Route::group(['prefix' => 'api'], function(){
	Route::group(['prefix' => 'system'], function(){
		Route::get('list-systems',['uses'=>'SystemController@getListSystemSimpleAjax']);
	});
	Route::group(['prefix' => 'category'], function(){
		Route::get('list-cates',['uses'=>'CategoryController@getListCateAjax']);
	});
	Route::group(['prefix' => 'software'], function(){
		Route::get('most-download/{number?}',['uses'=>'SoftwareController@getMostDownloadSoftwareAjax']);
		Route::get('highest-view-in-system/{sysid?}',['uses'=>'SoftwareController@getHighestViewSoftwareInsystemAjax']);
		Route::get('list-newest/{offset?}/{max?}',['uses'=>'SoftwareController@getListNewestSoftwareAjax']);
		Route::get('list-last-update/{offset?}/{max?}',['uses'=>'SoftwareController@getListLastUpdateAjax']);
		Route::get('list-random/{max?}',['uses'=>'SoftwareController@getListRandomAjax']);
		Route::get('list-with-cate/{max}/{page}',['uses'=>'SoftwareController@getListSoftwareWithCateAjax']);
		//Route::get('total-with-cate/{cateid}',['uses'=>'SoftwareController@getTotalSoftwareWithCateAjax']);
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
    	Route::group(['prefix' => 'system'], function(){
    		Route::get('list',['uses'=>'SystemController@getSystemList']);
            
    		Route::group(['prefix' => 'ajax'], function(){
    			Route::get('list/{max}/{page}',['uses'=>'SystemController@getSystemListAjax']);
    			Route::get('total',['uses'=>'SystemController@getTotalSystemAjax']);
    			Route::get('add',['uses'=>'SystemController@getAddSystemAjax']);
                Route::get('edit',['uses'=>'SystemController@getEditSystemAjax']);
                Route::get('delete/{id}',['uses'=>'SystemController@getDeleteSystemAjax']);
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
	    Route::group(['prefix' => 'software'], function(){
	    	Route::get('add',['uses'=>'SoftwareController@getAddSoftwareManager']);
	        Route::post('add',['uses'=>'SoftwareController@postAddSoftwareManager']);
	        Route::get('edit/{id}',['uses'=>'SoftwareController@getEditSoftwareManager']);
	        Route::post('edit/{id}',['uses'=>'SoftwareController@postEditSoftwareManager']);
	        Route::get('detail/{id}',['uses'=>'SoftwareController@getDetailSoftwareManager']);
	        Route::get('list',['uses'=>'SoftwareController@getListSoftwareManager']);
	    	Route::group(['prefix' => 'ajax'], function(){
	    		Route::get('list/{max}/{page}',['uses'=>'SoftwareController@getSoftwareListAjax']);
      			Route::get('total',['uses'=>'SoftwareController@getTotalSoftwareAjax']);
      			Route::get('setstatus/{softwareid}/{status}',['uses'=>'SoftwareController@getSetStatusAjax']);
      			Route::get('delete/{id}',['uses'=>'SoftwareController@getDeleteSoftwareAjax']);
	    	});
	    });
    	
	});
	
});