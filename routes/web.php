<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify' => true]); // ПОДТВЕРЖДЕНИЕ емейла на почту
// Auth::routes(['register' => false]); // выключение регистрации

Route::get('/', 'Front\FrontController@index')->name('home')->middleware('visit:main');
Route::view('/how-it-work', 'front.pages.howtwork')->name('howitwork')->middleware('visit:how-it-work');
Route::view('/faq', 'front.pages.faq')->name('faq')->middleware('visit:faq');
Route::get('/main-price', 'Front\FrontController@main_price')->name('main_price')->middleware('visit:price');
Route::get('/price', 'Front\FrontController@price')->name('price');
Route::post('/request', 'Front\FrontController@request')->name('front.request');


//--------------------- Cabinet route AUTH ------------------------------------------------------------------

Route::group(['middleware' => 'auth', 'namespace' => 'Cabinet', 'prefix' => 'cabinet'],  function()
{
    Route::get('/', 'CabinetController@cabinet')->name('cabinet')->middleware('visit:cabinet');
    Route::get('/profile', 'CabinetController@profile')->name('profile')->middleware('visit:profile');
    Route::get('/document/select', 'CabinetController@selectFirm')->name('selectFirm');
    Route::get('/report/{firmId}/show', 'CabinetController@showReport')->name('show.report');

    Route::get('/firm/{firmId}/edit-constituent_documents', 'DocumentController@edit_constituent_documents')->name('edit_constituent.documents');
    Route::get('/scan-document/firm/{firmId}/show-scan', 'DocumentController@invoicesIndex')->name('invoice.index');

    Route::post('/scan-document/store', 'MediaController@filepondStoreScan')->name('filepondStoreScan');
    Route::post('/firm/revert', 'MediaController@filepondDeleteScan')->name('filepondDeleteScan');
    Route::post('/firm/{firmId}/document/media', 'MediaController@addMediaScan')->name('addMediaScan');
    Route::get('/firm/{firmId}/media/{mediaId}/delete', 'MediaController@mediaDelete')->name('mediaDelete');
    Route::get('/image/{mediaId}/firm/{firmId}/name/{mediaName}/show_thumb', 'MediaController@showThumb')->name('image.show.thumb');
    Route::get('/image/user/{userId}/avatar', 'MediaController@showAvatar')->name('showAvatar');
    Route::get('/image-big/{mediaId}/firm/{firmId}/name/{mediaName}/show_thumb', 'MediaController@showBigPicture')->name('image.show.pic');
    Route::get('/image/{mediaId}/firm/{firmId}/name/{mediaName}/download_file', 'MediaController@downloadMediaFile')->name('image.download_file');
    Route::get('/image/verified/{mediaId}', 'MediaController@verifiedMediaFile')->name('image.verified');

    Route::get('reports','CabinetController@reports')->name('reports')->middleware('visit:report');

    Route::post('/send-mail','CabinetController@sendMail' )->name('sendMail');

    Route::get('/chat', [ChatController::class, 'index'])->name('chat');

    Route::get('payment-card','PaymentController@index')->name('payment')->middleware('visit:payment');
    Route::post('charge','PaymentController@charge')->name('stripe.charge');
    Route::get('check/{firm}','PaymentController@check')->name('check');
    Route::get('bill/{firm}','PaymentController@bill')->name('bill');
    Route::get('score/','PaymentController@score')->name('score');
    Route::get('mix/','PaymentController@mix')->name('mix');

    Route::resource('/users', 'UsersController');
    Route::resource('/firms', 'FirmsController');

});

// ----------------------Admin route ------------------------------------------------------------------------

 Route::group(['middleware' => ['auth', 'isAdmin'], 'namespace' => 'Admin', 'prefix' => 'admin'], function()
 {
     Route::get('/','MainController@index')->name('admin.index');
     Route::post('/getevent','EventController@getEvent')->name('admin.event');
     Route::get('/firm/create', 'FirmController@create')->name('create.firm');
     Route::get('/statistic', 'MainController@stat')->name('admin.stat');
     Route::get('/firm/deletedFirmIndex', 'FirmController@deletedFirmIndex')->name('deletedFirmIndex');
     Route::get('/firm/restore/{firm}', 'FirmController@restore')->name('restoreFirm');
     Route::get('/firm/docVerify/{firm}', 'FirmController@docVerify')->name('docVerify');
     Route::get('/firm/checkVerify/{firm}', 'FirmController@checkVerify')->name('checkVerify');
     Route::get('/firm/sendReport/{firm}', 'FirmController@sendReport')->name('send.report');
     Route::get('/contact', 'MainController@showContact')->name('showContact');
     Route::get('/contact/{id}/delete', 'MainController@deleteContact')->name('deleteContact');
     Route::get('/admin-chat', [ChatController::class, 'adminindex'])->name('admin.chat');
     Route::get('/show-mail/{user_id}','MainController@adminMailShow' )->name('AdminMailShow');
     Route::post('/mail/{user_id}/send','MainController@adminMailSend' )->name('AdminMailSend');
     Route::get('/profile','MainController@adminProfile' )->name('admin.profile');
     Route::put('{id}/change-password', 'MainController@changePassword')->name('pass');

     Route::delete('/firm/permanentDestroy/{firm}', 'FirmController@permanentDestroy')->name('permanentDestroy');

     Route::resource('/firm', 'FirmController',['only' => ['index', 'edit', 'destroy','update', 'store']]);
     Route::resource('/event', 'EventController',['only' => ['store', 'edit', 'destroy']]);
     Route::resource('/tariff', 'TariffController');
     Route::resource('/user', 'UserController');
     Route::resource('/post', 'PostController');
});

