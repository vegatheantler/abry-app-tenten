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


Route::apiResource('message-templates', 'API\MessageTemplateController');
Route::apiResource('messages', 'API\MessageController');
Route::apiResource('rich-message-types', 'API\RichMessageTypeController');
// Route::apiResource('rich-messages', 'API\RichMessageController');
Route::post('/rich-messages', 'API\RichMessageController@store');