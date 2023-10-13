<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', 'App\Http\Controllers\User\HomeUserController@index')->name('home');
Route::get('/home-v2', 'App\Http\Controllers\User\HomeUserController@index_v2')->name('home_v2');
Route::get('/about', 'App\Http\Controllers\User\HomeUserController@about')->name('about');
Route::get('/program', 'App\Http\Controllers\User\HomeUserController@program')->name('program');
Route::get('/blog', 'App\Http\Controllers\User\HomeUserController@blog')->name('blog');
Route::get('/contact', 'App\Http\Controllers\User\HomeUserController@contact')->name('contact');
Route::get('/altissia', 'App\Http\Controllers\User\HomeUserController@altissia')->name('altissia');
Route::get('/detailblog/{title}', 'App\Http\Controllers\User\HomeUserController@detailblog')->name('detailblog');
Route::post('/sendmessage', 'App\Http\Controllers\User\HomeUserController@sendmessage')->name('sendmessage');
Route::get('/alumni', 'App\Http\Controllers\User\HomeUserController@alumni')->name('alumni');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::post('services/media', 'ServicesController@storeMedia')->name('services.storeMedia');
    Route::post('services/ckmedia', 'ServicesController@storeCKEditorImages')->name('services.storeCKEditorImages');
    Route::post('services/parse-csv-import', 'ServicesController@parseCsvImport')->name('services.parseCsvImport');
    Route::post('services/process-csv-import', 'ServicesController@processCsvImport')->name('services.processCsvImport');
    Route::resource('services', 'ServicesController');

    // Client Partner
    Route::delete('client-partners/destroy', 'ClientPartnerController@massDestroy')->name('client-partners.massDestroy');
    Route::post('client-partners/media', 'ClientPartnerController@storeMedia')->name('client-partners.storeMedia');
    Route::post('client-partners/ckmedia', 'ClientPartnerController@storeCKEditorImages')->name('client-partners.storeCKEditorImages');
    Route::post('client-partners/parse-csv-import', 'ClientPartnerController@parseCsvImport')->name('client-partners.parseCsvImport');
    Route::post('client-partners/process-csv-import', 'ClientPartnerController@processCsvImport')->name('client-partners.processCsvImport');
    Route::resource('client-partners', 'ClientPartnerController');

    // Portfolio
    Route::delete('portfolios/destroy', 'PortfolioController@massDestroy')->name('portfolios.massDestroy');
    Route::post('portfolios/media', 'PortfolioController@storeMedia')->name('portfolios.storeMedia');
    Route::post('portfolios/ckmedia', 'PortfolioController@storeCKEditorImages')->name('portfolios.storeCKEditorImages');
    Route::post('portfolios/parse-csv-import', 'PortfolioController@parseCsvImport')->name('portfolios.parseCsvImport');
    Route::post('portfolios/process-csv-import', 'PortfolioController@processCsvImport')->name('portfolios.processCsvImport');
    Route::resource('portfolios', 'PortfolioController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::post('teams/media', 'TeamController@storeMedia')->name('teams.storeMedia');
    Route::post('teams/ckmedia', 'TeamController@storeCKEditorImages')->name('teams.storeCKEditorImages');
    Route::post('teams/parse-csv-import', 'TeamController@parseCsvImport')->name('teams.parseCsvImport');
    Route::post('teams/process-csv-import', 'TeamController@processCsvImport')->name('teams.processCsvImport');
    Route::resource('teams', 'TeamController');

    // Category Blog
    Route::delete('category-blogs/destroy', 'CategoryBlogController@massDestroy')->name('category-blogs.massDestroy');
    Route::post('category-blogs/parse-csv-import', 'CategoryBlogController@parseCsvImport')->name('category-blogs.parseCsvImport');
    Route::post('category-blogs/process-csv-import', 'CategoryBlogController@processCsvImport')->name('category-blogs.processCsvImport');
    Route::resource('category-blogs', 'CategoryBlogController');

    // Blog
    Route::delete('blogs/destroy', 'BlogController@massDestroy')->name('blogs.massDestroy');
    Route::post('blogs/media', 'BlogController@storeMedia')->name('blogs.storeMedia');
    Route::post('blogs/ckmedia', 'BlogController@storeCKEditorImages')->name('blogs.storeCKEditorImages');
    Route::post('blogs/parse-csv-import', 'BlogController@parseCsvImport')->name('blogs.parseCsvImport');
    Route::post('blogs/process-csv-import', 'BlogController@processCsvImport')->name('blogs.processCsvImport');
    Route::resource('blogs', 'BlogController');

    // Company Profile
    Route::delete('company-profiles/destroy', 'CompanyProfileController@massDestroy')->name('company-profiles.massDestroy');
    Route::post('company-profiles/media', 'CompanyProfileController@storeMedia')->name('company-profiles.storeMedia');
    Route::post('company-profiles/ckmedia', 'CompanyProfileController@storeCKEditorImages')->name('company-profiles.storeCKEditorImages');
    Route::post('company-profiles/parse-csv-import', 'CompanyProfileController@parseCsvImport')->name('company-profiles.parseCsvImport');
    Route::post('company-profiles/process-csv-import', 'CompanyProfileController@processCsvImport')->name('company-profiles.processCsvImport');
    Route::resource('company-profiles', 'CompanyProfileController');

    // Header Description
    Route::delete('header-descriptions/destroy', 'HeaderDescriptionController@massDestroy')->name('header-descriptions.massDestroy');
    Route::post('header-descriptions/media', 'HeaderDescriptionController@storeMedia')->name('header-descriptions.storeMedia');
    Route::post('header-descriptions/ckmedia', 'HeaderDescriptionController@storeCKEditorImages')->name('header-descriptions.storeCKEditorImages');
    Route::post('header-descriptions/parse-csv-import', 'HeaderDescriptionController@parseCsvImport')->name('header-descriptions.parseCsvImport');
    Route::post('header-descriptions/process-csv-import', 'HeaderDescriptionController@processCsvImport')->name('header-descriptions.processCsvImport');
    Route::resource('header-descriptions', 'HeaderDescriptionController');

    // Inbox
    Route::delete('inboxes/destroy', 'InboxController@massDestroy')->name('inboxes.massDestroy');
    Route::post('inboxes/parse-csv-import', 'InboxController@parseCsvImport')->name('inboxes.parseCsvImport');
    Route::post('inboxes/process-csv-import', 'InboxController@processCsvImport')->name('inboxes.processCsvImport');
    Route::resource('inboxes', 'InboxController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Category Product
    Route::delete('category-products/destroy', 'CategoryProductController@massDestroy')->name('category-products.massDestroy');
    Route::post('category-products/parse-csv-import', 'CategoryProductController@parseCsvImport')->name('category-products.parseCsvImport');
    Route::post('category-products/process-csv-import', 'CategoryProductController@processCsvImport')->name('category-products.processCsvImport');
    Route::resource('category-products', 'CategoryProductController');

    // Category Content
    Route::delete('category-contents/destroy', 'CategoryContentController@massDestroy')->name('category-contents.massDestroy');
    Route::post('category-contents/media', 'CategoryContentController@storeMedia')->name('category-contents.storeMedia');
    Route::post('category-contents/ckmedia', 'CategoryContentController@storeCKEditorImages')->name('category-contents.storeCKEditorImages');
    Route::post('category-contents/parse-csv-import', 'CategoryContentController@parseCsvImport')->name('category-contents.parseCsvImport');
    Route::post('category-contents/process-csv-import', 'CategoryContentController@processCsvImport')->name('category-contents.processCsvImport');
    Route::resource('category-contents', 'CategoryContentController');

    // Other Content
    Route::delete('other-contents/destroy', 'OtherContentController@massDestroy')->name('other-contents.massDestroy');
    Route::post('other-contents/media', 'OtherContentController@storeMedia')->name('other-contents.storeMedia');
    Route::post('other-contents/ckmedia', 'OtherContentController@storeCKEditorImages')->name('other-contents.storeCKEditorImages');
    Route::post('other-contents/parse-csv-import', 'OtherContentController@parseCsvImport')->name('other-contents.parseCsvImport');
    Route::post('other-contents/process-csv-import', 'OtherContentController@processCsvImport')->name('other-contents.processCsvImport');
    Route::resource('other-contents', 'OtherContentController');

    // Testimonials
    Route::delete('testimonials/destroy', 'TestimonialsController@massDestroy')->name('testimonials.massDestroy');
    Route::post('testimonials/media', 'TestimonialsController@storeMedia')->name('testimonials.storeMedia');
    Route::post('testimonials/ckmedia', 'TestimonialsController@storeCKEditorImages')->name('testimonials.storeCKEditorImages');
    Route::post('testimonials/parse-csv-import', 'TestimonialsController@parseCsvImport')->name('testimonials.parseCsvImport');
    Route::post('testimonials/process-csv-import', 'TestimonialsController@processCsvImport')->name('testimonials.processCsvImport');
    Route::resource('testimonials', 'TestimonialsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
