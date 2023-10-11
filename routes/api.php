<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Services
    Route::post('services/media', 'ServicesApiController@storeMedia')->name('services.storeMedia');
    Route::apiResource('services', 'ServicesApiController');

    // Client Partner
    Route::post('client-partners/media', 'ClientPartnerApiController@storeMedia')->name('client-partners.storeMedia');
    Route::apiResource('client-partners', 'ClientPartnerApiController');

    // Portfolio
    Route::post('portfolios/media', 'PortfolioApiController@storeMedia')->name('portfolios.storeMedia');
    Route::apiResource('portfolios', 'PortfolioApiController');

    // Team
    Route::post('teams/media', 'TeamApiController@storeMedia')->name('teams.storeMedia');
    Route::apiResource('teams', 'TeamApiController');

    // Category Blog
    Route::apiResource('category-blogs', 'CategoryBlogApiController');

    // Blog
    Route::post('blogs/media', 'BlogApiController@storeMedia')->name('blogs.storeMedia');
    Route::apiResource('blogs', 'BlogApiController');

    // Company Profile
    Route::post('company-profiles/media', 'CompanyProfileApiController@storeMedia')->name('company-profiles.storeMedia');
    Route::apiResource('company-profiles', 'CompanyProfileApiController');

    // Header Description
    Route::post('header-descriptions/media', 'HeaderDescriptionApiController@storeMedia')->name('header-descriptions.storeMedia');
    Route::apiResource('header-descriptions', 'HeaderDescriptionApiController');

    // Inbox
    Route::apiResource('inboxes', 'InboxApiController');

    // Product
    Route::post('products/media', 'ProductApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductApiController');

    // Category Product
    Route::apiResource('category-products', 'CategoryProductApiController');

    // Category Content
    Route::post('category-contents/media', 'CategoryContentApiController@storeMedia')->name('category-contents.storeMedia');
    Route::apiResource('category-contents', 'CategoryContentApiController');

    // Other Content
    Route::post('other-contents/media', 'OtherContentApiController@storeMedia')->name('other-contents.storeMedia');
    Route::apiResource('other-contents', 'OtherContentApiController');

    // Testimonials
    Route::post('testimonials/media', 'TestimonialsApiController@storeMedia')->name('testimonials.storeMedia');
    Route::apiResource('testimonials', 'TestimonialsApiController');
});
