<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Группа маршрутов для панели управления
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {

    // Маршрут для Analytics
    Route::get('/analytics', function () {
        return Inertia::render('Analytics');
    })->name('analytics');

    // Маршрут для Fintech
    Route::get('/fintech', function () {
        return Inertia::render('Fintech');
    })->name('fintech');

    // Маршрут для Calendar
    Route::get('/calendar', function () {
        return Inertia::render('Calendar');
    })->name('calendar');

    // Маршрут для Campaigns
    Route::get('/campaigns', function () {
        return Inertia::render('Campaigns');
    })->name('campaigns');

    // Маршрут для Inbox
    Route::get('/inbox', function () {
        return Inertia::render('Inbox');
    })->name('inbox');

    // Маршрут для Messages
    Route::get('/messages', function () {
        return Inertia::render('Messages');
    })->name('messages');

    // Маршрут для Signin
    Route::get('/signin', function () {
        return Inertia::render('Signin');
    })->name('signin');

    // Маршрут для Signup
    Route::get('/signup', function () {
        return Inertia::render('Signup');
    })->name('signup');

    // Маршрут для ResetPassword
    Route::get('/reset-password', function () {
        return Inertia::render('ResetPassword');
    })->name('reset-password');

    // Маршрут для Onboarding01
    Route::get('/onboarding-01', function () {
        return Inertia::render('Onboarding01');
    })->name('onboarding-01');

    // Маршрут для Onboarding02
    Route::get('/onboarding-02', function () {
        return Inertia::render('Onboarding02');
    })->name('onboarding-02');

    // Маршрут для Onboarding03
    Route::get('/onboarding-03', function () {
        return Inertia::render('Onboarding03');
    })->name('onboarding-03');

    // Маршрут для Onboarding04
    Route::get('/onboarding-04', function () {
        return Inertia::render('Onboarding04');
    })->name('onboarding-04');

    // Маршрут для Customers
    Route::get('/ecommerce/customers', function () {
        return Inertia::render('ecommerce/Customers');
    })->name('customers');

    // Маршрут для Orders
    Route::get('/ecommerce/orders', function () {
        return Inertia::render('ecommerce/Orders');
    })->name('orders');

    // Маршрут для Invoices
    Route::get('/ecommerce/invoices', function () {
        return Inertia::render('ecommerce/Invoices');
    })->name('invoices');

    // Маршрут для Shop
    Route::get('/ecommerce/shop', function () {
        return Inertia::render('ecommerce/Shop');
    })->name('shop');

    // Маршрут для Shop2
    Route::get('/ecommerce/shop2', function () {
        return Inertia::render('ecommerce/Shop2');
    })->name('shop2');

    // Маршрут для Product
    Route::get('/ecommerce/product', function () {
        return Inertia::render('ecommerce/Product');
    })->name('product');

    // Маршрут для Cart
    Route::get('/ecommerce/cart', function () {
        return Inertia::render('ecommerce/Cart');
    })->name('cart');

    // Маршрут для Cart2
    Route::get('/ecommerce/cart-2', function () {
        return Inertia::render('ecommerce/Cart2');
    })->name('cart2');

    // Маршрут для Cart3
    Route::get('/ecommerce/cart-3', function () {
        return Inertia::render('ecommerce/Cart3');
    })->name('cart3');

    // Маршрут для Pay
    Route::get('/ecommerce/pay', function () {
        return Inertia::render('ecommerce/Pay');
    })->name('pay');

    // Маршрут для UsersTabs
    Route::get('/community/users-tabs', function () {
        return Inertia::render('community/UsersTabs');
    })->name('users-tabs');

    // Маршрут для UsersTiles
    Route::get('/community/users-tiles', function () {
        return Inertia::render('community/UsersTiles');
    })->name('users-tiles');

    // Маршрут для Profile
    Route::get('/community/profile', function () {
        return Inertia::render('community/Profile');
    })->name('profile');

    // Маршрут для Feed
    Route::get('/community/feed', function () {
        return Inertia::render('community/Feed');
    })->name('feed');

    // Маршрут для Forum
    Route::get('/community/forum', function () {
        return Inertia::render('community/Forum');
    })->name('forum');

    // Маршрут для ForumPost
    Route::get('/community/forum-post', function () {
        return Inertia::render('community/ForumPost');
    })->name('forum-post');

    // Маршрут для Meetups
    Route::get('/community/meetups', function () {
        return Inertia::render('community/Meetups');
    })->name('meetups');

    // Маршрут для MeetupsPost
    Route::get('/community/meetups-post', function () {
        return Inertia::render('community/MeetupsPost');
    })->name('meetups-post');

    // Маршрут для CreditCards
    Route::get('/finance/cards', function () {
        return Inertia::render('finance/CreditCards');
    })->name('cards');

    // Маршрут для Transactions
    Route::get('/finance/transactions', function () {
        return Inertia::render('finance/Transactions');
    })->name('transactions');

    // Маршрут для TransactionDetails
    Route::get('/finance/transaction-details', function () {
        return Inertia::render('finance/TransactionDetails');
    })->name('transaction-details');

    // Маршрут для JobListing
    Route::get('/job/job-listing', function () {
        return Inertia::render('job/JobListing');
    })->name('job-listing');

    // Маршрут для JobPost
    Route::get('/job/job-post', function () {
        return Inertia::render('job/JobPost');
    })->name('job-post');

    // Маршрут для CompanyProfile
    Route::get('/job/company-profile', function () {
        return Inertia::render('job/CompanyProfile');
    })->name('company-profile');

    // Маршрут для TasksKanban
    Route::get('/tasks/kanban', function () {
        return Inertia::render('tasks/TasksKanban');
    })->name('tasks-kanban');

    // Маршрут для TasksList
    Route::get('/tasks/list', function () {
        return Inertia::render('tasks/TasksList');
    })->name('tasks-list');

    // Маршрут для Account
    Route::get('/settings/account', function () {
        return Inertia::render('settings/Account');
    })->name('account');

    // Маршрут для Notifications
    Route::get('/settings/notifications', function () {
        return Inertia::render('settings/Notifications');
    })->name('notifications');

    // Маршрут для Apps
    Route::get('/settings/apps', function () {
        return Inertia::render('settings/Apps');
    })->name('apps');

    // Маршрут для Plans
    Route::get('/settings/plans', function () {
        return Inertia::render('settings/Plans');
    })->name('plans');

    // Маршрут для Billing
    Route::get('/settings/billing', function () {
        return Inertia::render('settings/Billing');
    })->name('billing');

    // Маршрут для Feedback
    Route::get('/settings/feedback', function () {
        return Inertia::render('settings/Feedback');
    })->name('feedback');

    // Маршрут для Changelog
    Route::get('/utility/changelog', function () {
        return Inertia::render('utility/Changelog');
    })->name('changelog');

    // Маршрут для Roadmap
    Route::get('/utility/roadmap', function () {
        return Inertia::render('utility/Roadmap');
    })->name('roadmap');

    // Маршрут для Faqs
    Route::get('/utility/faqs', function () {
        return Inertia::render('utility/Faqs');
    })->name('faqs');

    // Маршрут для EmptyState
    Route::get('/utility/empty-state', function () {
        return Inertia::render('utility/EmptyState');
    })->name('empty-state');

    // Маршрут для PageNotFound
    Route::get('/utility/404', function () {
        return Inertia::render('utility/PageNotFound');
    })->name('page-not-found');

    // Маршрут для KnowledgeBase
    Route::get('/utility/knowledge-base', function () {
        return Inertia::render('utility/KnowledgeBase');
    })->name('knowledge-base');

    // Маршрут для ButtonPage
    Route::get('/component/button', function () {
        return Inertia::render('component/ButtonPage');
    })->name('button-page');

    // Маршрут для FormPage
    Route::get('/component/form', function () {
        return Inertia::render('component/FormPage');
    })->name('form-page');

    // Маршрут для DropdownPage
    Route::get('/component/dropdown', function () {
        return Inertia::render('component/DropdownPage');
    })->name('dropdown-page');

    // Маршрут для AlertPage
    Route::get('/component/alert', function () {
        return Inertia::render('component/AlertPage');
    })->name('alert-page');

    // Маршрут для ModalPage
    Route::get('/component/modal', function () {
        return Inertia::render('component/ModalPage');
    })->name('modal-page');

    // Маршрут для PaginationPage
    Route::get('/component/pagination', function () {
        return Inertia::render('component/PaginationPage');
    })->name('pagination-page');

    // Маршрут для TabsPage
    Route::get('/component/tabs', function () {
        return Inertia::render('component/TabsPage');
    })->name('tabs-page');

    // Маршрут для BreadcrumbPage
    Route::get('/component/breadcrumb', function () {
        return Inertia::render('component/BreadcrumbPage');
    })->name('breadcrumb-page');

    // Маршрут для BadgePage
    Route::get('/component/badge', function () {
        return Inertia::render('component/BadgePage');
    })->name('badge-page');

    // Маршрут для AvatarPage
    Route::get('/component/avatar', function () {
        return Inertia::render('component/AvatarPage');
    })->name('avatar-page');

    // Маршрут для TooltipPage
    Route::get('/component/tooltip', function () {
        return Inertia::render('component/TooltipPage');
    })->name('tooltip-page');

    // Маршрут для AccordionPage
    Route::get('/component/accordion', function () {
        return Inertia::render('component/AccordionPage');
    })->name('accordion-page');

    // Маршрут для IconsPage
    Route::get('/component/icons', function () {
        return Inertia::render('component/IconsPage');
    })->name('icons-page');

    // Другие маршруты...
});

require __DIR__.'/auth.php';
