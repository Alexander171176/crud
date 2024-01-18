<?php

use App\Http\Controllers\Admin\Analytics\AnalyticsController;
use App\Http\Controllers\Admin\Calendar\CalendarController;
use App\Http\Controllers\Admin\Campaigns\CampaignsController;
use App\Http\Controllers\Admin\Community\FeedController;
use App\Http\Controllers\Admin\Community\ForumController;
use App\Http\Controllers\Admin\Community\ForumPostController;
use App\Http\Controllers\Admin\Community\MeetupsController;
use App\Http\Controllers\Admin\Community\MeetupsPostController;
use App\Http\Controllers\Admin\Community\UsersTabsController;
use App\Http\Controllers\Admin\Community\UsersTilesController;
use App\Http\Controllers\Admin\Component\AccordionPageController;
use App\Http\Controllers\Admin\Component\AlertPageController;
use App\Http\Controllers\Admin\Component\AvatarPageController;
use App\Http\Controllers\Admin\Component\BadgePageController;
use App\Http\Controllers\Admin\Component\BreadcrumbPageController;
use App\Http\Controllers\Admin\Component\ButtonPageController;
use App\Http\Controllers\Admin\Component\DropdownPageController;
use App\Http\Controllers\Admin\Component\FormPageController;
use App\Http\Controllers\Admin\Component\IconsPageController;
use App\Http\Controllers\Admin\Component\ModalPageController;
use App\Http\Controllers\Admin\Component\PaginationPageController;
use App\Http\Controllers\Admin\Component\TabsPageController;
use App\Http\Controllers\Admin\Component\TooltipPageController;
use App\Http\Controllers\Admin\Ecommerce\CartOneController;
use App\Http\Controllers\Admin\Ecommerce\CartThreeController;
use App\Http\Controllers\Admin\Ecommerce\CartTwoController;
use App\Http\Controllers\Admin\Ecommerce\CustomersController;
use App\Http\Controllers\Admin\Ecommerce\InvoicesController;
use App\Http\Controllers\Admin\Ecommerce\OrdersController;
use App\Http\Controllers\Admin\Ecommerce\PayController;
use App\Http\Controllers\Admin\Ecommerce\ProductController;
use App\Http\Controllers\Admin\Ecommerce\ShopOneController;
use App\Http\Controllers\Admin\Ecommerce\ShopTwoController;
use App\Http\Controllers\Admin\Finance\CreditCardsController;
use App\Http\Controllers\Admin\Finance\TransactionDetailsController;
use App\Http\Controllers\Admin\Finance\TransactionsController;
use App\Http\Controllers\Admin\Fintech\FintechController;
use App\Http\Controllers\Admin\Inbox\InboxController;
use App\Http\Controllers\Admin\Job\CompanyProfileController;
use App\Http\Controllers\Admin\Job\JobListingController;
use App\Http\Controllers\Admin\Job\JobPostController;
use App\Http\Controllers\Admin\LogoutController;
use App\Http\Controllers\Admin\Messages\MessagesController;
use App\Http\Controllers\Admin\Onboarding\OnboardingFourController;
use App\Http\Controllers\Admin\Onboarding\OnboardingOneController;
use App\Http\Controllers\Admin\Onboarding\OnboardingThreeController;
use App\Http\Controllers\Admin\Onboarding\OnboardingTwoController;
use App\Http\Controllers\Admin\ResetPassword\ResetPasswordController;
use App\Http\Controllers\Admin\Settings\AccountController;
use App\Http\Controllers\Admin\Settings\AppsController;
use App\Http\Controllers\Admin\Settings\BillingController;
use App\Http\Controllers\Admin\Settings\FeedbackController;
use App\Http\Controllers\Admin\Settings\NotificationsController;
use App\Http\Controllers\Admin\Settings\PlansController;
use App\Http\Controllers\Admin\Signin\SigninController;
use App\Http\Controllers\Admin\Signup\SignupController;
use App\Http\Controllers\Admin\Tasks\TasksKanbanController;
use App\Http\Controllers\Admin\Tasks\TasksListController;
use App\Http\Controllers\Admin\Utility\ChangelogController;
use App\Http\Controllers\Admin\Utility\EmptyStateController;
use App\Http\Controllers\Admin\Utility\FaqsController;
use App\Http\Controllers\Admin\Utility\KnowledgeBaseController;
use App\Http\Controllers\Admin\Utility\PageNotFoundController;
use App\Http\Controllers\Admin\Utility\RoadmapController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::post('/logout', [LogoutController::class, 'index'])->name('logout');// Маршрут для Logout

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

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Группа маршрутов для панели управления
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');// Маршрут для Analytics
    Route::get('/fintech', [FintechController::class, 'index'])->name('fintech');// Маршрут для Fintech
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');// Маршрут для Calendar
    Route::get('/campaigns', [CampaignsController::class, 'index'])->name('campaigns');// Маршрут для Campaigns
    Route::get('/inbox', [InboxController::class, 'index'])->name('inbox');// Маршрут для Inbox
    Route::get('/messages', [MessagesController::class, 'index'])->name('messages');// Маршрут для Messages
    Route::get('/signin', [SigninController::class, 'index'])->name('signin');// Маршрут для Signin
    Route::get('/signup', [SignupController::class, 'index'])->name('signup');// Маршрут для Signup
    Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset-password');// Маршрут для ResetPassword
    Route::get('/onboarding-01', [OnboardingOneController::class, 'index'])->name('onboarding-01');// Маршрут для Onboarding01
    Route::get('/onboarding-02', [OnboardingTwoController::class, 'index'])->name('onboarding-02');// Маршрут для Onboarding02
    Route::get('/onboarding-03', [OnboardingThreeController::class, 'index'])->name('onboarding-03');// Маршрут для Onboarding03
    Route::get('/onboarding-04', [OnboardingFourController::class, 'index'])->name('onboarding-04');// Маршрут для Onboarding04

    // Маршруты для группы 'ecommerce'
    Route::group(['prefix' => 'ecommerce'], function () {
        Route::get('/customers', [CustomersController::class, 'index'])->name('customers');// Маршрут для Customers
        Route::get('/orders', [OrdersController::class, 'index'])->name('orders');// Маршрут для Orders
        Route::get('/invoices', [InvoicesController::class, 'index'])->name('invoices');// Маршрут для Invoices
        Route::get('/shop', [ShopOneController::class, 'index'])->name('shop');// Маршрут для Shop
        Route::get('/shop2', [ShopTwoController::class, 'index'])->name('shop2');// Маршрут для Shop2
        Route::get('/product', [ProductController::class, 'index'])->name('product');// Маршрут для Product
        Route::get('/cart', [CartOneController::class, 'index'])->name('cart');// Маршрут для Cart
        Route::get('/cart-2', [CartTwoController::class, 'index'])->name('cart2');// Маршрут для Cart2
        Route::get('/cart-3', [CartThreeController::class, 'index'])->name('cart3');// Маршрут для Cart3
        Route::get('/pay', [PayController::class, 'index'])->name('pay');// Маршрут для Pay
        // Другие маршруты для 'ecommerce'...
    });

    Route::get('/community/users-tabs', [UsersTabsController::class, 'index'])->name('users-tabs');// Маршрут для UsersTabs
    Route::get('/community/users-tiles', [UsersTilesController::class, 'index'])->name('users-tiles');// Маршрут для UsersTiles
    Route::get('/community/profile', [App\Http\Controllers\Admin\Community\ProfileController::class, 'index'])->name('profile');// Маршрут для Profile
    Route::get('/community/feed', [FeedController::class, 'index'])->name('feed');// Маршрут для Feed
    Route::get('/community/forum', [ForumController::class, 'index'])->name('forum');// Маршрут для Forum
    Route::get('/community/forum-post', [ForumPostController::class, 'index'])->name('forum-post');// Маршрут для ForumPost
    Route::get('/community/meetups', [MeetupsController::class, 'index'])->name('meetups');// Маршрут для Meetups
    Route::get('/community/meetups-post', [MeetupsPostController::class, 'index'])->name('meetups-post');// Маршрут для MeetupsPost
    Route::get('/finance/cards', [CreditCardsController::class, 'index'])->name('cards');// Маршрут для CreditCards
    Route::get('/finance/transactions', [TransactionsController::class, 'index'])->name('transactions');// Маршрут для Transactions
    Route::get('/finance/transaction-details', [TransactionDetailsController::class, 'index'])->name('transaction-details');// Маршрут для TransactionDetails
    Route::get('/job/job-listing', [JobListingController::class, 'index'])->name('job-listing');// Маршрут для JobListing
    Route::get('/job/job-post', [JobPostController::class, 'index'])->name('job-post');// Маршрут для JobPost
    Route::get('/job/company-profile', [CompanyProfileController::class, 'index'])->name('company-profile');// Маршрут для CompanyProfile
    Route::get('/tasks/kanban', [TasksKanbanController::class, 'index'])->name('tasks-kanban');// Маршрут для TasksKanban
    Route::get('/tasks/list', [TasksListController::class, 'index'])->name('tasks-list');// Маршрут для TasksList
    Route::get('/settings/account', [AccountController::class, 'index'])->name('account');// Маршрут для Account
    Route::get('/settings/notifications', [NotificationsController::class, 'index'])->name('notifications');// Маршрут для Notifications
    Route::get('/settings/apps', [AppsController::class, 'index'])->name('apps');// Маршрут для Apps
    Route::get('/settings/plans', [PlansController::class, 'index'])->name('plans');// Маршрут для Plans
    Route::get('/settings/billing', [BillingController::class, 'index'])->name('billing');// Маршрут для Billing
    Route::get('/settings/feedback', [FeedbackController::class, 'index'])->name('feedback');// Маршрут для Feedback
    Route::get('/utility/changelog', [ChangelogController::class, 'index'])->name('changelog');// Маршрут для Changelog
    Route::get('/utility/roadmap', [RoadmapController::class, 'index'])->name('roadmap');// Маршрут для Roadmap
    Route::get('/utility/faqs', [FaqsController::class, 'index'])->name('faqs');// Маршрут для Faqs
    Route::get('/utility/empty-state', [EmptyStateController::class, 'index'])->name('empty-state');// Маршрут для EmptyState
    Route::get('/utility/404', [PageNotFoundController::class, 'index'])->name('page-not-found');// Маршрут для PageNotFound
    Route::get('/utility/knowledge-base', [KnowledgeBaseController::class, 'index'])->name('knowledge-base');// Маршрут для KnowledgeBase
    Route::get('/component/button', [ButtonPageController::class, 'index'])->name('button-page');// Маршрут для ButtonPage
    Route::get('/component/form', [FormPageController::class, 'index'])->name('form-page');// Маршрут для FormPage
    Route::get('/component/dropdown', [DropdownPageController::class, 'index'])->name('dropdown-page');// Маршрут для DropdownPage
    Route::get('/component/alert', [AlertPageController::class, 'index'])->name('alert-page');// Маршрут для AlertPage
    Route::get('/component/modal', [ModalPageController::class, 'index'])->name('modal-page');// Маршрут для ModalPage
    Route::get('/component/pagination', [PaginationPageController::class, 'index'])->name('pagination-page');// Маршрут для PaginationPage
    Route::get('/component/tabs', [TabsPageController::class, 'index'])->name('tabs-page');// Маршрут для TabsPage
    Route::get('/component/breadcrumb', [BreadcrumbPageController::class, 'index'])->name('breadcrumb-page');// Маршрут для BreadcrumbPage
    Route::get('/component/badge', [BadgePageController::class, 'index'])->name('badge-page');// Маршрут для BadgePage
    Route::get('/component/avatar', [AvatarPageController::class, 'index'])->name('avatar-page');// Маршрут для AvatarPage
    Route::get('/component/tooltip', [TooltipPageController::class, 'index'])->name('tooltip-page');// Маршрут для TooltipPage
    Route::get('/component/accordion', [AccordionPageController::class, 'index'])->name('accordion-page');// Маршрут для AccordionPage
    Route::get('/component/icons', [IconsPageController::class, 'index'])->name('icons-page');// Маршрут для IconsPage

    // Другие маршруты...
});

require __DIR__.'/auth.php';
