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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['verify' => false]);

Route::get('/', 'SitemapController@welcome')->name('welcome.page');

Route::get('/events', 'SitemapController@eventListings')->name('event.listings');
Route::get('/events/{slug}', 'SitemapController@eventPreview')->name('event.listings.preview');
Route::post('/event/cart/submit/{slug}', 'SitemapController@eventPreviewForm')->name('event.listings.cart.submit');

Route::get('/events/checkout/{slug}', 'SitemapController@eventCheckout')->name('event.listings.checkout');

//Email Subscribe
Route::post('/subscribe/submit', 'SitemapController@userSubscribeForm')->name('user.subscribe.submit');


//User Dashboard
Route::group(['prefix' => 'console'], function () {
    Route::group(['middleware' => ['auth.user']], function () {

        // login protected routes.
        Route::group(['namespace' => 'Client'], function () {
            Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
            Route::get('/social-accounts', 'UserController@userSocialMedia')->name('user.social.media');

            //Event Listings
            Route::get('/events', 'UserController@userEventListings')->name('user.event.list');


            //Profile Settings
            Route::get('/profile-details', 'UserController@userProfileDetails')->name('user.profile.details');
            Route::post('/profile-details/submit', 'UserController@userProfileDetailsForm')->name('user.profile.details.submit');


            Route::get('/transactions', 'UserController@userTransaction')->name('user.transactions');
            Route::get('/transactions/preview/details', 'UserController@userTransactionPreview')->name('user.transactions.preview');

            //Profile Settings
            Route::get('/setting', 'UserController@userSetting')->name('user.setting');
            Route::post('/setting/password/submit', 'UserController@userSettingPassword')->name('user.setting.password.update');

            Route::get('/create-event', 'UserController@userCreateEvent')->name('user.create.event');
            Route::get('/create-event/ticket-information/{slug}', 'UserController@userCreateEventTicketInfo')->name('user.create.event.ticket.info');

            Route::post('/create-event/step-one/submit', 'UserController@userCreateEventStepOneForm')->name('user.create.event.step.one');
            Route::post('/create-event/step-two/submit/{slug}', 'UserController@userCreateEventStepTwoForm')->name('user.create.event.step.two');


        });
    });


});

