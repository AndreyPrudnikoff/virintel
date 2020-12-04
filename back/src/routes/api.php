<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
   
});

Route::group(['prefix'=>'auth'], function() {
    Route::post('login', 'LoginController@login');
    Route::post('register', 'RegisterController@register');
    Route::group(['middleware'=>'auth:api'], function() {
        Route::get('logout', 'LoginController@logout');
    });
});

Route::group(['prefix'=>'user', 'middleware'=>'auth:api'], function (){
    Route::group(['middleware'=>'scope:user'], function (){
        Route::get('myTests/{virintel_id}','FileController@getReportPdf');
        Route::get('getUrl/{id}','FileController@getUrlPdf');
    });

    Route::group(['middleware'=>'scope:laboratory'], function(){
            Route::post('store-file', 'FileController@store');
            Route::get('check-result','FileController@allNormalFile');
            Route::get('check-result/{id}','FileController@oneNormalFile');
    
            Route::get('check-bad-result/{id}','FileController@oneBadFile');
            Route::get('genPdf/{id}','FileController@pdfexport');
            Route::get('pdf-reports/{id}','FileController@getReportPdLaboratory');
            Route::get('getUrl/{id}','FileController@getUrlPdf');
            
        });

    Route::group(['middleware'=>'scope:administrator'], function (){
        Route::get('/admin-scope', function() {
            return response()->json([
                'message'=>'Admin can acces this',
                'status_code'=>200
            ]);
        });
    });
});

// Route::prefix('v1')->group(function(){
//     Route::post('store-file', 'FileController@store');
//     Route::get('check-result','FileController@allNormalFile');
//     Route::get('check-result/{id}','FileController@oneNormalFile');
    
//     Route::get('check-bad-result/{id}','FileController@oneBadFile');
//     Route::get('genPdf/{id}','FileController@pdfexport');
//     Route::get('myTests/{virintel_id}','FileController@getReportPdf');
//     Route::get('getUrl/{id}','FileController@getUrlPdf');
// });

