// router.js

import { createWebHistory, createRouter } from 'vue-router';
import {getCurrentInstance} from "vue";

const routes = [
    {
        path: '/dashboard',
        component: () => import('./Pages/Dashboard.vue'),
        name: 'dashboard',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/analytics',
        component: () => import('./Pages/Analytics.vue'),
        name: 'analytics',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/fintech',
        component: () => import('./Pages/Fintech.vue'),
        name: 'fintech',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/calendar',
        component: () => import('./Pages/Calendar.vue'),
        name: 'calendar',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/campaigns',
        component: () => import('./Pages/Campaigns.vue'),
        name: 'campaigns',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/inbox',
        component: () => import('./Pages/Inbox.vue'),
        name: 'inbox',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/messages',
        component: () => import('./Pages/Messages.vue'),
        name: 'messages',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/signin',
        component: () => import('./Pages/Signin.vue'),
        name: 'signin',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/signup',
        component: () => import('./Pages/Signup.vue'),
        name: 'signup',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/reset-password',
        component: () => import('./Pages/ResetPassword.vue'),
        name: 'reset-password',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-01',
        component: () => import('./Pages/Onboarding01.vue'),
        name: 'onboarding-01',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-02',
        component: () => import('./Pages/Onboarding02.vue'),
        name: 'onboarding-02',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-03',
        component: () => import('./Pages/Onboarding03.vue'),
        name: 'onboarding-03',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-04',
        component: () => import('./Pages/Onboarding04.vue'),
        name: 'onboarding-04',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/customers',
        component: () => import('./Pages/ecommerce/Customers.vue'),
        name: 'customers',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/orders',
        component: () => import('./Pages/ecommerce/Orders.vue'),
        name: 'orders',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/invoices',
        component: () => import('./Pages/ecommerce/Invoices.vue'),
        name: 'invoices',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/shop',
        component: () => import('./Pages/ecommerce/Shop.vue'),
        name: 'shop',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/shop2',
        component: () => import('./Pages/ecommerce/Shop2.vue'),
        name: 'shop2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/product',
        component: () => import('./Pages/ecommerce/Product.vue'),
        name: 'product',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/cart',
        component: () => import('./Pages/ecommerce/Cart.vue'),
        name: 'cart',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/cart-2',
        component: () => import('./Pages/ecommerce/Cart2.vue'),
        name: 'cart2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/cart-3',
        component: () => import('./Pages/ecommerce/Cart3.vue'),
        name: 'cart3',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/pay',
        component: () => import('./Pages/ecommerce/Pay.vue'),
        name: 'pay',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/users-tabs',
        component: () => import('./Pages/community/UsersTabs.vue'),
        name: 'users-tabs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/users-tiles',
        component: () => import('./Pages/community/UsersTiles.vue'),
        name: 'users-tiles',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/profile',
        component: () => import('./Pages/community/Profile.vue'),
        name: 'profile',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/feed',
        component: () => import('./Pages/community/Feed.vue'),
        name: 'feed',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/forum',
        component: () => import('./Pages/community/Forum.vue'),
        name: 'forum',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/forum-post',
        component: () => import('./Pages/community/ForumPost.vue'),
        name: 'forum-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/meetups',
        component: () => import('./Pages/community/Meetups.vue'),
        name: 'meetups',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/meetups-post',
        component: () => import('./Pages/community/MeetupsPost.vue'),
        name: 'meetups-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/finance/cards',
        component: () => import('./Pages/finance/CreditCards.vue'),
        name: 'cards',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/finance/transactions',
        component: () => import('./Pages/finance/Transactions.vue'),
        name: 'transactions',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/finance/transaction-details',
        component: () => import('./Pages/finance/TransactionDetails.vue'),
        name: 'transaction-details',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/job/job-listing',
        component: () => import('./Pages/job/JobListing.vue'),
        name: 'job-listing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/job/job-post',
        component: () => import('./Pages/job/JobPost.vue'),
        name: 'job-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/job/company-profile',
        component: () => import('./Pages/job/CompanyProfile.vue'),
        name: 'company-profile',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/tasks/kanban',
        component: () => import('./Pages/tasks/TasksKanban.vue'),
        name: 'tasks-kanban',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/tasks/list',
        component: () => import('./Pages/tasks/TasksList.vue'),
        name: 'tasks-list',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/account',
        component: () => import('./Pages/settings/Account.vue'),
        name: 'account',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/notifications',
        component: () => import('./Pages/settings/Notifications.vue'),
        name: 'notifications',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/apps',
        component: () => import('./Pages/settings/Apps.vue'),
        name: 'apps',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/plans',
        component: () => import('./Pages/settings/Plans.vue'),
        name: 'plans',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/billing',
        component: () => import('./Pages/settings/Billing.vue'),
        name: 'billing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/feedback',
        component: () => import('./Pages/settings/Feedback.vue'),
        name: 'feedback',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/changelog',
        component: () => import('./Pages/utility/Changelog.vue'),
        name: 'changelog',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/roadmap',
        component: () => import('./Pages/utility/Roadmap.vue'),
        name: 'roadmap',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/faqs',
        component: () => import('./Pages/utility/Faqs.vue'),
        name: 'faqs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/empty-state',
        component: () => import('./Pages/utility/EmptyState.vue'),
        name: 'empty-state',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/404',
        component: () => import('./Pages/utility/PageNotFound.vue'),
        name: 'page-not-found',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/knowledge-base',
        component: () => import('./Pages/utility/KnowledgeBase.vue'),
        name: 'knowledge-base',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/button',
        component: () => import('./Pages/component/ButtonPage.vue'),
        name: 'button-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/form',
        component: () => import('./Pages/component/FormPage.vue'),
        name: 'form-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/dropdown',
        component: () => import('./Pages/component/DropdownPage.vue'),
        name: 'dropdown-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/alert',
        component: () => import('./Pages/component/AlertPage.vue'),
        name: 'alert-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/modal',
        component: () => import('./Pages/component/ModalPage.vue'),
        name: 'modal-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/pagination',
        component: () => import('./Pages/component/PaginationPage.vue'),
        name: 'pagination-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/tabs',
        component: () => import('./Pages/component/TabsPage.vue'),
        name: 'tabs-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/breadcrumb',
        component: () => import('./Pages/component/BreadcrumbPage.vue'),
        name: 'breadcrumb-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/badge',
        component: () => import('./Pages/component/BadgePage.vue'),
        name: 'badge-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/avatar',
        component: () => import('./Pages/component/AvatarPage.vue'),
        name: 'avatar-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/tooltip',
        component: () => import('./Pages/component/TooltipPage.vue'),
        name: 'tooltip-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/accordion',
        component: () => import('./Pages/component/AccordionPage.vue'),
        name: 'accordion-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/icons',
        component: () => import('./Pages/component/IconsPage.vue'),
        name: 'icons-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/:pathMatch(.*)*',
        component: () => import('./Pages/utility/PageNotFound.vue'),
        name: 'page-not-found',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/logout',
        component: () => import('./Components/LogoutComponent.vue'),
        name: 'logout',
        meta: { middleware: ['auth', 'verified'] },
    },
    // Добавьте другие маршруты здесь, если необходимо
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
