<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExtensionsController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TranslationsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\DownloadController;
use App\Http\Controllers\Install\InstallController;
use App\Http\Controllers\Admin\ManageController;
use App\Http\Controllers\Admin\PagesController as AdminPagesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\User\FilesController as UserFilesController;
use App\Http\Controllers\Pages\PagesController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Pages\BlogController;
use App\Http\Controllers\Pages\UploadController;
use Illuminate\Support\Facades\Route;

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

//install group
Route::prefix('install')->group(function () {
    Route::get('/', [InstallController::class, 'index'])->name('install');
    Route::post('/', [InstallController::class, 'installRequirement'])->name('install');
    Route::get('/database', [InstallController::class, 'indexcheckDatabase'])->name('install.database');
    Route::post('/database', [InstallController::class, 'checkDatabase'])->name('install.database');
    Route::get('/account', [InstallController::class, 'indexaccount'])->name('install.account');
    Route::post('/account', [InstallController::class, 'installDB'])->name('install.account');
    Route::get('/complete', [InstallController::class, 'complete'])->name('install.complete');
});

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/faq', [PagesController::class, 'showFaq'])->name('faq');
Route::get('/blog', [BlogController::class, 'showBlog'])->name('blog');
Route::get('/blog/post/{id}', [BlogController::class, 'view_blog_post'])->name('view.blog.post');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact');

Route::get('/file/request/{id}', [DownloadController::class, 'request'])->name('download.request');
Route::get('/dl/{id}', [DownloadController::class, 'downloadFile'])->name('download.file');
Route::get('/file/{id}', [DownloadController::class, 'download'])->name('download');

Route::post('/upload', [UploadController::class, 'store'])->name('upload');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get("redirect/{provider}", [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get("callback/{provider}", [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::get('/pages/{slug}', [PagesController::class, 'showPage'])->name('show.page');
Route::get('/pages/privacy-policy', [PagesController::class, 'indexPrivacyPolicy'])->name('privacyPolicy');
Route::get('/pages/terms-service', [PagesController::class, 'indexTermsService'])->name('termsService');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->name('forget-password');
Route::post('/forgot-password', [ForgetPasswordController::class, 'forget'])->name('forget-password');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('reset-password');

Route::post('/reports/add', [DownloadController::class, 'addReport'])->name('reports.add');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware('admin')->group(function () {
        //dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //pages
        Route::get('/pages', [AdminPagesController::class, 'list'])->name('pages.list');
        Route::get('/pages/edit/{id}', [AdminPagesController::class, 'showEdit'])->name('pages.edit');
        Route::get('/pages/add', [AdminPagesController::class, 'showAdd'])->name('pages.add');
        Route::post('/pages/edit/{id}', [AdminPagesController::class, 'update'])->name('pages.edit');
        Route::post('/pages/add', [AdminPagesController::class, 'create'])->name('pages.add');

        //faqs
        Route::get('/faqs', [FaqsController::class, 'list'])->name('faqs.list');
        Route::get('/faqs/edit/{id}', [FaqsController::class, 'indexEdit'])->name('faqs.edit');
        Route::get('/faqs/add', [FaqsController::class, 'indexAdd'])->name('faqs.add');
        Route::post('/faqs/edit/{id}', [FaqsController::class, 'update'])->name('faqs.edit');
        Route::post('/faqs/add', [FaqsController::class, 'create'])->name('faqs.add');

        //faqs
        Route::get('/extensions', [ExtensionsController::class, 'list'])->name('extensions.list');
        Route::get('/extensions/edit/{id}', [ExtensionsController::class, 'indexEdit'])->name('extensions.edit');
        Route::get('/extensions/add', [ExtensionsController::class, 'indexAdd'])->name('extensions.add');
        Route::post('/extensions/edit/{id}', [ExtensionsController::class, 'update'])->name('extensions.edit');
        Route::post('/extensions/add', [ExtensionsController::class, 'create'])->name('extensions.add');

        //category
        Route::get('/categories', [CategoriesController::class, 'list'])->name('categories.list');
        Route::get('/categories/edit/{id}', [CategoriesController::class, 'showEdit'])->name('categories.edit');
        Route::get('/categories/add', [CategoriesController::class, 'showAdd'])->name('categories.add');
        Route::post('/categories/edit/{id}', [CategoriesController::class, 'update'])->name('categories.edit');
        Route::post('/categories/add', [CategoriesController::class, 'create'])->name('categories.add');

        //posts
        Route::get('/posts', [PostsController::class, 'list'])->name('posts.list');
        Route::get('/posts/edit/{id}', [PostsController::class, 'showEdit'])->name('posts.edit');
        Route::get('/posts/add', [PostsController::class, 'showAdd'])->name('posts.add');
        Route::post('/posts/edit/{id}', [PostsController::class, 'update'])->name('posts.edit');
        Route::post('/posts/add', [PostsController::class, 'create'])->name('posts.add');

        //users
        Route::get('/users', [UsersController::class, 'list'])->name('users.list');
        Route::get('/users/edit/{id}', [UsersController::class, 'indexEdit'])->name('users.edit');
        Route::get('/users/add', [UsersController::class, 'indexAdd'])->name('users.add');
        Route::post('/users/edit/{id}', [UsersController::class, 'update'])->name('users.edit');
        Route::post('/users/add', [UsersController::class, 'create'])->name('users.add');

        //uploads
        Route::get('/uploads', [FilesController::class, 'list'])->name('files.list');
        Route::get('/uploads/view/{id}', [FilesController::class, 'showEdit'])->name('files.view');
        Route::get('/uploads/download/{id}', [FilesController::class, 'download'])->name('files.download');
        Route::get('/uploads/delete/{id}', [FilesController::class, 'delete'])->name('files.delete');

        //manage ads
        Route::get('/ads', [ManageController::class, 'index'])->name('ads');
        Route::post('/ads', [ManageController::class, 'store'])->name('ads');

        //reports
        Route::get('/reports', [ReportsController::class, 'list'])->name('reports.list');
        Route::get('/reports/delete/{id}', [ReportsController::class, 'delete'])->name('reports.delete');

        Route::get('/account', [UsersController::class, 'accountAdmin'])->name('admin.account');
        Route::post('/account/email', [UsersController::class, 'changeAdminEmail'])->name('admin.account.email');
        Route::post('/account/password', [UsersController::class, 'changeAdminPassword'])->name('admin.account.password');

        //settings
        Route::get('/settings/general', [SettingsController::class, 'general'])->name('settings.general');
        Route::get('/settings/facebook-login-api', [SettingsController::class, 'showFacebookLoginApi'])->name('settings.facebook.login.api');
        Route::get('/settings/email', [SettingsController::class, 'email'])->name('settings.email');
        Route::get('/settings/appareance', [SettingsController::class, 'appareance'])->name('settings.appareance');
        Route::get('/settings/captcha', [SettingsController::class, 'captcha'])->name('settings.captcha');
        Route::get('/settings/pages', [SettingsController::class, 'pages'])->name('settings.pages');
        Route::get('/settings/storage/amazon', [SettingsController::class, 'storageAmazon'])->name('settings.storage.amazon');
        Route::get('/settings/storage/wasabi', [SettingsController::class, 'storageWasabi'])->name('settings.storage.wasabi');

        Route::post('/settings/general', [SettingsController::class, 'generalUpdate'])->name('settings.general');
        Route::post('/settings/facebook-login-api', [SettingsController::class, 'storeFacebookLoginApi'])->name('settings.facebook.login.api');
        Route::post('/settings/email', [SettingsController::class, 'emailUpdate'])->name('settings.email');
        Route::post('/settings/appareance', [SettingsController::class, 'appareanceUpdate'])->name('settings.appareance');
        Route::post('/settings/captcha', [SettingsController::class, 'captchaUpdate'])->name('settings.captcha');
        Route::post('/settings/pages', [SettingsController::class, 'pagesUpdate'])->name('settings.pages');
        Route::post('/settings/storage/amazon', [SettingsController::class, 'storageAmazonUpdate'])->name('settings.storage.amazon');
        Route::post('/settings/storage/wasabi', [SettingsController::class, 'storageWasabiUpdate'])->name('settings.storage.wasabi');

        //translation
        Route::get('/translations', [TranslationsController::class, 'index'])->name('translations.list');
        Route::get('/translations/add', [TranslationsController::class, 'add'])->name('translations.add');
        Route::post('/translations/add', [TranslationsController::class, 'create'])->name('translations.add');
        Route::get('/translations/edit/{id}', [TranslationsController::class, 'edit'])->name('translations.edit');
        Route::post('/translations/edit/{id}', [TranslationsController::class, 'update'])->name('translations.edit');
    });

    Route::get('/my_files', [UserFilesController::class, 'list'])->name('user.files.list');
    Route::get('/my_files/view/{id}', [UserFilesController::class, 'view'])->name('user.files.view');
    Route::get('/my_files/download/{id}', [UserFilesController::class, 'download'])->name('user.files.download');
    Route::get('/account', [UsersController::class, 'account'])->name('user.account');
    Route::post('/my_files/delete', [UserFilesController::class, 'delete'])->name('user.files.delete');
    Route::post('/account/email', [UsersController::class, 'changeEmail'])->name('user.account.email');
    Route::post('/account/password', [UsersController::class, 'changePassword'])->name('user.account.password');
});
