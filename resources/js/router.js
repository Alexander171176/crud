// router.js

import { createWebHistory, createRouter } from 'vue-router';

// Импортируйте ваши компоненты
import Dashboard from './Pages/Dashboard.vue'; // Используйте относительный путь
import Analytics from './Pages/Analytics.vue'
import Fintech from './Pages/Fintech.vue'
import Customers from './Pages/ecommerce/Customers.vue'
import Orders from './Pages/ecommerce/Orders.vue'
import Invoices from './Pages/ecommerce/Invoices.vue'
import Shop from './Pages/ecommerce/Shop.vue'
import Shop2 from './Pages/ecommerce/Shop2.vue'
import Product from './Pages/ecommerce/Product.vue'
import Cart from './Pages/ecommerce/Cart.vue'
import Cart2 from './Pages/ecommerce/Cart2.vue'
import Cart3 from './Pages/ecommerce/Cart3.vue'
import Pay from './Pages/ecommerce/Pay.vue'
import Campaigns from './Pages/Campaigns.vue'
import UsersTabs from './Pages/community/UsersTabs.vue'
import UsersTiles from './Pages/community/UsersTiles.vue'
import Profile from './Pages/community/Profile.vue'
import Feed from './Pages/community/Feed.vue'
import Forum from './Pages/community/Forum.vue'
import ForumPost from './Pages/community/ForumPost.vue'
import Meetups from './Pages/community/Meetups.vue'
import MeetupsPost from './Pages/community/MeetupsPost.vue'
import CreditCards from './Pages/finance/CreditCards.vue'
import Transactions from './Pages/finance/Transactions.vue'
import TransactionDetails from './Pages/finance/TransactionDetails.vue'
import JobListing from './Pages/job/JobListing.vue'
import JobPost from './Pages/job/JobPost.vue'
import CompanyProfile from './Pages/job/CompanyProfile.vue'
import Messages from './Pages/Messages.vue'
import TasksKanban from './Pages/tasks/TasksKanban.vue'
import TasksList from './Pages/tasks/TasksList.vue'
import Inbox from './Pages/Inbox.vue'
import Calendar from './Pages/Calendar.vue'
import Account from './Pages/settings/Account.vue'
import Notifications from './Pages/settings/Notifications.vue'
import Apps from './Pages/settings/Apps.vue'
import Plans from './Pages/settings/Plans.vue'
import Billing from './Pages/settings/Billing.vue'
import Feedback from './Pages/settings/Feedback.vue'
import Changelog from './Pages/utility/Changelog.vue'
import Roadmap from './Pages/utility/Roadmap.vue'
import Faqs from './Pages/utility/Faqs.vue'
import EmptyState from './Pages/utility/EmptyState.vue'
import PageNotFound from './Pages/utility/PageNotFound.vue'
import KnowledgeBase from './Pages/utility/KnowledgeBase.vue'
import Signin from './Pages/Signin.vue'
import Signup from './Pages/Signup.vue'
import ResetPassword from './Pages/ResetPassword.vue'
import Onboarding01 from './Pages/Onboarding01.vue'
import Onboarding02 from './Pages/Onboarding02.vue'
import Onboarding03 from './Pages/Onboarding03.vue'
import Onboarding04 from './Pages/Onboarding04.vue'
import ButtonPage from './Pages/component/ButtonPage.vue'
import FormPage from './Pages/component/FormPage.vue'
import DropdownPage from './Pages/component/DropdownPage.vue'
import AlertPage from './Pages/component/AlertPage.vue'
import ModalPage from './Pages/component/ModalPage.vue'
import PaginationPage from './Pages/component/PaginationPage.vue'
import TabsPage from './Pages/component/TabsPage.vue'
import BreadcrumbPage from './Pages/component/BreadcrumbPage.vue'
import BadgePage from './Pages/component/BadgePage.vue'
import AvatarPage from './Pages/component/AvatarPage.vue'
import TooltipPage from './Pages/component/TooltipPage.vue'
import AccordionPage from './Pages/component/AccordionPage.vue'
import IconsPage from './Pages/component/IconsPage.vue'

const routes = [
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/analytics',
        component: Analytics,
        name: 'analytics',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/dashboard/fintech',
        component: Fintech,
        name: 'fintech',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/customers',
        component: Customers,
        name: 'customers',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/orders',
        component: Orders,
        name: 'orders',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/invoices',
        component: Invoices,
        name: 'invoices',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/shop',
        component: Shop,
        name: 'shop',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/shop2',
        component: Shop2,
        name: 'shop2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/product',
        component: Product,
        name: 'product',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/cart',
        component: Cart,
        name: 'cart',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/cart-2',
        component: Cart2,
        name: 'cart2',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/cart-3',
        component: Cart3,
        name: 'cart3',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/ecommerce/pay',
        component: Pay,
        name: 'pay',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/campaigns',
        component: Campaigns,
        name: 'campaigns',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/users-tabs',
        component: UsersTabs,
        name: 'users-tabs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/users-tiles',
        component: UsersTiles,
        name: 'users-tiles',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/profile',
        component: Profile,
        name: 'profile',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/feed',
        component: Feed,
        name: 'feed',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/forum',
        component: Forum,
        name: 'forum',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/forum-post',
        component: ForumPost,
        name: 'forum-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/meetups',
        component: Meetups,
        name: 'meetups',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/community/meetups-post',
        component: MeetupsPost,
        name: 'meetups-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/finance/cards',
        component: CreditCards,
        name: 'cards',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/finance/transactions',
        component: Transactions,
        name: 'transactions',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/finance/transaction-details',
        component: TransactionDetails,
        name: 'transaction-details',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/job/job-listing',
        component: JobListing,
        name: 'job-listing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/job/job-post',
        component: JobPost,
        name: 'job-post',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/job/company-profile',
        component: CompanyProfile,
        name: 'company-profile',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/messages',
        component: Messages,
        name: 'messages',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/tasks/kanban',
        component: TasksKanban,
        name: 'tasks-kanban',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/tasks/list',
        component: TasksList,
        name: 'tasks-list',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/inbox',
        component: Inbox,
        name: 'inbox',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/calendar',
        component: Calendar,
        name: 'calendar',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/account',
        component: Account,
        name: 'account',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/notifications',
        component: Notifications,
        name: 'notifications',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/apps',
        component: Apps,
        name: 'settings-apps',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/plans',
        component: Plans,
        name: 'plans',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/billing',
        component: Billing,
        name: 'billing',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/settings/feedback',
        component: Feedback,
        name: 'feedback',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/changelog',
        component: Changelog,
        name: 'changelog',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/roadmap',
        component: Roadmap,
        name: 'roadmap',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/faqs',
        component: Faqs,
        name: 'faqs',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/empty-state',
        component: EmptyState,
        name: 'empty-state',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/404',
        component: PageNotFound,
        name: 'page-not-found',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/utility/knowledge-base',
        component: KnowledgeBase,
        name: 'knowledge-base',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/signin',
        component: Signin,
        name: 'signin',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/signup',
        component: Signup,
        name: 'signup',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/reset-password',
        component: ResetPassword,
        name: 'reset-password',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-01',
        component: Onboarding01,
        name: 'onboarding-01',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-02',
        component: Onboarding02,
        name: 'onboarding-02',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-03',
        component: Onboarding03,
        name: 'onboarding-03',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/onboarding-04',
        component: Onboarding04,
        name: 'onboarding-04',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/button',
        component: ButtonPage,
        name: 'button-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/form',
        component: FormPage,
        name: 'form-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/dropdown',
        component: DropdownPage,
        name: 'dropdown-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/alert',
        component: AlertPage,
        name: 'alert-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/modal',
        component: ModalPage,
        name: 'modal-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/pagination',
        component: PaginationPage,
        name: 'pagination-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/tabs',
        component: TabsPage,
        name: 'tabs-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/breadcrumb',
        component: BreadcrumbPage,
        name: 'breadcrumb-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/badge',
        component: BadgePage,
        name: 'badge-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/avatar',
        component: AvatarPage,
        name: 'avatar-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/tooltip',
        component: TooltipPage,
        name: 'tooltip-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/accordion',
        component: AccordionPage,
        name: 'accordion-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/component/icons',
        component: IconsPage,
        name: 'icons-page',
        meta: { middleware: ['auth', 'verified'] },
    },
    {
        path: '/:pathMatch(.*)*',
        component: PageNotFound,
        name: 'pageNotFound',
        meta: { middleware: ['auth', 'verified'] },
    },
    // Добавьте другие маршруты здесь, если необходимо
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
