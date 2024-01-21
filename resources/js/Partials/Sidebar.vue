<script setup>
import {ref, onMounted, onUnmounted, watch} from 'vue'
import {useRouter} from 'vue-router'
import SidebarLinkGroup from './SidebarLinkGroup.vue'

import LinkGroup from './LinkGroup.vue'
import {Link} from '@inertiajs/vue3';

const props = defineProps(['sidebarOpen'])
const emit = defineEmits()

const trigger = ref(null)
const sidebar = ref(null)
const storedSidebarExpanded = localStorage.getItem('sidebar-expanded')
const sidebarExpanded = ref(storedSidebarExpanded === null ? false : storedSidebarExpanded === 'true')
const currentRoute = useRouter().currentRoute.value

// close on click outside
const clickHandler = ({target}) => {
    if (!sidebar.value || !trigger.value) return
    if (!props.sidebarOpen || sidebar.value.contains(target) || trigger.value.contains(target)) return
    emit('close-sidebar')
}

// close if the esc key is pressed
const keyHandler = ({keyCode}) => {
    if (!props.sidebarOpen || keyCode !== 27) return
    emit('close-sidebar')
}

onMounted(() => {
    document.addEventListener('click', clickHandler)
    document.addEventListener('keydown', keyHandler)
})

onUnmounted(() => {
    document.removeEventListener('click', clickHandler)
    document.removeEventListener('keydown', keyHandler)
})

watch(sidebarExpanded, () => {
    localStorage.setItem('sidebar-expanded', sidebarExpanded.value)
    if (sidebarExpanded.value) {
        document.querySelector('body').classList.add('sidebar-expanded')
    } else {
        document.querySelector('body').classList.remove('sidebar-expanded')
    }
})

// не забудьте вернуть переменные
{
    trigger, sidebar, sidebarExpanded, currentRoute
}
</script>

<template>
    <div>
        <!-- Sidebar backdrop (mobile only) -->
        <div class="fixed inset-0 bg-slate-900 bg-opacity-30 z-40 lg:hidden lg:z-auto transition-opacity duration-200"
             :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true"></div>

        <!-- Sidebar -->
        <div id="sidebar" ref="sidebar"
             class="flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-screen overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-20 lg:sidebar-expanded:!w-64 2xl:!w-64 shrink-0 bg-slate-800 p-4 transition-all duration-200 ease-in-out"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'">

            <!-- Sidebar header -->
            <div class="flex justify-between mb-10 pr-3 sm:px-2">
                <!-- Close button -->
                <button ref="trigger" class="lg:hidden text-slate-500 hover:text-slate-400"
                        @click.stop="$emit('close-sidebar')" aria-controls="sidebar" :aria-expanded="sidebarOpen">
                    <span class="sr-only">Закрыть</span>
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"/>
                    </svg>
                </button>
                <!-- Logo -->
                <Link :href="'/dashboard'">
                    <svg width="32" height="32" viewBox="0 0 32 32">
                        <defs>
                            <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                                <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"/>
                                <stop stop-color="#A5B4FC" offset="100%"/>
                            </linearGradient>
                            <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                                <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"/>
                                <stop stop-color="#38BDF8" offset="100%"/>
                            </linearGradient>
                        </defs>
                        <rect fill="#6366F1" width="32" height="32" rx="16"/>
                        <path
                            d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z"
                            fill="#4F46E5"/>
                        <path
                            d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z"
                            fill="url(#logo-a)"/>
                        <path
                            d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z"
                            fill="url(#logo-b)"/>
                    </svg>
                </Link>
            </div>

            <!-- Links -->
            <div class="space-y-8">
                <!-- Pages group -->
                <div>
                    <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                              aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Страницы</span>
                    </h3>
                    <ul class="mt-3">

                        <!-- Dashboard -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath === '/admin' || currentRoute.fullPath.includes('admin')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               :class="(currentRoute.fullPath === '/admin' || currentRoute.fullPath.includes('dashboard')) ? 'hover:text-slate-200' : 'hover:text-white'"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-500"
                                                  d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"/>
                                            <path class="fill-current text-indigo-600"
                                                  d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"/>
                                            <path class="fill-current text-indigo-200"
                                                  d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Панель Управления</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'admin' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Главная</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'analytics' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/analytics'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Аналитика</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'fintech' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/fintech'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Финансы</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- E-Commerce  -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath.includes('ecommerce')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-300"
                                                  d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"/>
                                            <path class="fill-current text-indigo-500"
                                                  d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"/>
                                            <path class="fill-current text-indigo-500"
                                                  d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Е-Коммерция</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'customers' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/customers'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Клиенты</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'orders' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/orders'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Заказы</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'invoices' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/invoices'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Счета-фактуры</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'shop' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/shop'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Магазин</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'shop2' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/shop-2'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Магазин 2</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'product' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/product'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Товары</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'cart' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/cart'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Корзина</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'cart2' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/cart-2'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Корзина 2</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'cart3' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/cart-3'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Корзина 3</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'pay' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/ecommerce/pay'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Оплата</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Community -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath.includes('community')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-500"
                                                  d="M18.974 8H22a2 2 0 012 2v6h-2v5a1 1 0 01-1 1h-2a1 1 0 01-1-1v-5h-2v-6a2 2 0 012-2h.974zM20 7a2 2 0 11-.001-3.999A2 2 0 0120 7zM2.974 8H6a2 2 0 012 2v6H6v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5H0v-6a2 2 0 012-2h.974zM4 7a2 2 0 11-.001-3.999A2 2 0 014 7z"/>
                                            <path class="fill-current text-indigo-300"
                                                  d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Сообщество</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'users-tabs' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/users-tabs'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Пользователи</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'users-tiles' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/users-tiles'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Плитка</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'profile' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/profile'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Профиль</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'feed' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/feed'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Подписки</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'forum' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/forum'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Форум</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'forum-post' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/forum-post'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Посты</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'meetups' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/meetups'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Встречи</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'meetups-post' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/community/meetups-post'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Повестки</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Finance -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath.includes('finance')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-300"
                                                  d="M13 6.068a6.035 6.035 0 0 1 4.932 4.933H24c-.486-5.846-5.154-10.515-11-11v6.067Z"/>
                                            <path class="fill-current text-indigo-500"
                                                  d="M18.007 13c-.474 2.833-2.919 5-5.864 5a5.888 5.888 0 0 1-3.694-1.304L4 20.731C6.131 22.752 8.992 24 12.143 24c6.232 0 11.35-4.851 11.857-11h-5.993Z"/>
                                            <path class="fill-current text-indigo-600"
                                                  d="M6.939 15.007A5.861 5.861 0 0 1 6 11.829c0-2.937 2.167-5.376 5-5.85V0C4.85.507 0 5.614 0 11.83c0 2.695.922 5.174 2.456 7.17l4.483-3.993Z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Финансы</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'cards' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/finance/cards'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Карты</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'transactions' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/finance/transactions'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Транзакции</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'transaction-details' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/finance/transaction-details'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Детали транзакции</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Job Board -->
                        <SidebarLinkGroup v-slot="parentLink" :activeCondition="currentRoute.fullPath.includes('job')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-600"
                                                  d="M4.418 19.612A9.092 9.092 0 0 1 2.59 17.03L.475 19.14c-.848.85-.536 2.395.743 3.673a4.413 4.413 0 0 0 1.677 1.082c.253.086.519.131.787.135.45.011.886-.16 1.208-.474L7 21.44a8.962 8.962 0 0 1-2.582-1.828Z"/>
                                            <path class="fill-current text-indigo-500"
                                                  d="M10.034 13.997a11.011 11.011 0 0 1-2.551-3.862L4.595 13.02a2.513 2.513 0 0 0-.4 2.645 6.668 6.668 0 0 0 1.64 2.532 5.525 5.525 0 0 0 3.643 1.824 2.1 2.1 0 0 0 1.534-.587l2.883-2.882a11.156 11.156 0 0 1-3.861-2.556Z"/>
                                            <path class="fill-current text-indigo-300"
                                                  d="M21.554 2.471A8.958 8.958 0 0 0 18.167.276a3.105 3.105 0 0 0-3.295.467L9.715 5.888c-1.41 1.408-.665 4.275 1.733 6.668a8.958 8.958 0 0 0 3.387 2.196c.459.157.94.24 1.425.246a2.559 2.559 0 0 0 1.87-.715l5.156-5.146c1.415-1.406.666-4.273-1.732-6.666Zm.318 5.257c-.148.147-.594.2-1.256-.018A7.037 7.037 0 0 1 18.016 6c-1.73-1.728-2.104-3.475-1.73-3.845a.671.671 0 0 1 .465-.129c.27.008.536.057.79.146a7.07 7.07 0 0 1 2.6 1.711c1.73 1.73 2.105 3.472 1.73 3.846Z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Вакансии</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'job-listing' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/job/job-listing'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Список вакансий</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'job-post' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/job/job-post'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Объявления</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'company-profile' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/job/company-profile'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Профиль компании</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Tasks -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath.includes('tasks')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-500"
                                                  d="M8 1v2H3v19h18V3h-5V1h7v23H1V1z"/>
                                            <path class="fill-current text-indigo-500"
                                                  d="M1 1h22v23H1z"/>
                                            <path class="fill-current text-indigo-300"
                                                  d="M15 10.586L16.414 12 11 17.414 7.586 14 9 12.586l2 2zM5 0h14v4H5z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Задачи</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'tasks-kanban' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/tasks/kanban'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Система планирования</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'tasks-list' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/tasks/list'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Список задач</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Settings -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath.includes('settings')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-500"
                                                  d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"/>
                                            <path class="fill-current text-indigo-300"
                                                  d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"/>
                                            <path class="fill-current text-indigo-500"
                                                  d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"/>
                                            <path class="fill-current text-indigo-300"
                                                  d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Настройки</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'account' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/settings/account'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Аккаунт</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'notifications' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/settings/notifications'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Уведомления</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'apps' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/settings/apps'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Приложение</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'plans' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/settings/plans'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Тарифы</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'billing' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/settings/billing'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Выставление счетов</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'feedback' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/settings/feedback'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Обратная связь</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Utility -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath.includes('utility')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <circle class="fill-current text-indigo-300"
                                                    cx="18.5" cy="5.5" r="4.5"/>
                                            <circle class="fill-current text-indigo-500"
                                                    cx="5.5" cy="5.5" r="4.5"/>
                                            <circle class="fill-current text-indigo-500"
                                                    cx="18.5" cy="18.5" r="4.5"/>
                                            <circle class="fill-current text-indigo-300"
                                                    cx="5.5" cy="18.5" r="4.5"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Утилиты</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'changelog' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/utility/changelog'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Журнал изменений</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'roadmap' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/utility/roadmap'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Дорожная карта</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'faqs' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/utility/faqs'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">FAQs</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'empty-state' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/utility/empty-state'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Пустая страница</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'page-not-found' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/utility/404'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">404</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'knowledge-base' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/utility/knowledge-base'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">База знаний</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Components  -->
                        <SidebarLinkGroup v-slot="parentLink"
                                          :activeCondition="currentRoute.fullPath.includes('component')">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <circle class="fill-current text-indigo-500"
                                                    cx="16" cy="8" r="8"/>
                                            <circle class="fill-current text-indigo-300"
                                                    cx="8" cy="16" r="8"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Компоненты </span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'button-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/button'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Кнопки</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'form-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/form'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Формы</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'dropdown-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/dropdown'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Выпадающий</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'alert-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/alert'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Уведомления</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'modal-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/modal'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Модальные окна</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'pagination-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/pagination'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Пагинация</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'tabs-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/tabs'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Табы</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'breadcrumb-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/breadcrumb'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Хлебные крошки</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'badge-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/badge'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Бэйджи</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'avatar-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/avatar'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Аватарки</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'tooltip-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/tooltip'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Тултипы</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'accordion-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/accordion'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Аккордеоны</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'icons-page' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/component/icons'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Иконки</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Messages -->
                        <LinkGroup :href="route('messages.index')" :active="route().current('messages.index')"
                                   class="mt-2 mb-4 block truncate transition duration-150">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-indigo-500"
                                              d="M14.5 7c4.695 0 8.5 3.184 8.5 7.111 0 1.597-.638 3.067-1.7 4.253V23l-4.108-2.148a10 10 0 01-2.692.37c-4.695 0-8.5-3.184-8.5-7.11C6 10.183 9.805 7 14.5 7z"/>
                                        <path class="fill-current text-indigo-300"
                                              d="M11 1C5.477 1 1 4.582 1 9c0 1.797.75 3.45 2 4.785V19l4.833-2.416C8.829 16.85 9.892 17 11 17c5.523 0 10-3.582 10-8s-4.477-8-10-8z"/>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Сообщения</span>
                                </div>
                                <!-- Badge -->
                                <div class="flex flex-shrink-0 ml-2">
                                <span
                                    class="inline-flex items-center justify-center h-5 text-xs font-medium text-white bg-indigo-500 px-2 rounded">4</span>
                                </div>
                            </div>
                        </LinkGroup>

                        <!-- Inbox -->
                        <LinkGroup :href="route('inbox.index')" :active="route().current('inbox.index')"
                                   class="mt-2 mb-4 block truncate transition duration-150">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-indigo-500" d="M16 13v4H8v-4H0l3-9h18l3 9h-8Z"/>
                                        <path class="fill-current text-indigo-300"
                                              d="m23.72 12 .229.686A.984.984 0 0 1 24 13v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-8c0-.107.017-.213.051-.314L.28 12H8v4h8v-4H23.72ZM13 0v7h3l-4 5-4-5h3V0h2Z"/>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Входящие</span>
                                </div>
                            </div>
                        </LinkGroup>

                        <!-- Calendar -->
                        <LinkGroup :href="route('calendar.index')" :active="route().current('calendar.index')"
                                   class="mt-2 mb-4 block truncate transition duration-150">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-indigo-500" d="M1 3h22v20H1z"/>
                                        <path class="fill-current text-indigo-300" d="M21 3h2v4H1V3h2V1h4v2h10V1h4v2Z"/>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Календарь</span>
                                </div>
                            </div>
                        </LinkGroup>

                        <!-- Campaigns -->
                        <LinkGroup :href="route('campaigns.index')" :active="route().current('campaigns.index')"
                                   class="mt-2 mb-4 block truncate transition duration-150">
                            <div class="flex items-center justify-between">
                                <div class="grow flex items-center">
                                    <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                        <path class="fill-current text-indigo-500"
                                              d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"/>
                                        <path class="fill-current text-indigo-300"
                                              d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"/>
                                    </svg>
                                    <span
                                        class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Кампании</span>
                                </div>
                            </div>
                        </LinkGroup>

                    </ul>
                </div>

                <!-- More group -->
                <div>
                    <h3 class="text-xs uppercase text-slate-500 font-semibold pl-3">
                        <span class="hidden lg:block lg:sidebar-expanded:hidden 2xl:hidden text-center w-6"
                              aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Разное</span>
                    </h3>
                    <ul class="mt-3">

                        <!-- Authentication -->
                        <SidebarLinkGroup v-slot="parentLink">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-500"
                                                  d="M8.07 16H10V8H8.07a8 8 0 110 8z"/>
                                            <path class="fill-current text-indigo-300"
                                                  d="M15 12L8 6v5H0v2h8v5z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Идентификация</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'signin' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/signin'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Регистрация</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'signup' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/signup'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Вход</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'reset-password' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/reset-password'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Сброс пароля</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                        <!-- Onboarding -->
                        <SidebarLinkGroup v-slot="parentLink">
                            <a class="block text-slate-200 truncate transition duration-150"
                               href="#0"
                               @click.prevent="sidebarExpanded ? parentLink.handleClick() : sidebarExpanded = true">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="shrink-0 h-6 w-6" viewBox="0 0 24 24">
                                            <path class="fill-current text-indigo-500"
                                                  d="M19 5h1v14h-2V7.414L5.707 19.707 5 19H4V5h2v11.586L18.293 4.293 19 5Z"/>
                                            <path class="fill-current text-indigo-300"
                                                  d="M5 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8ZM5 23a4 4 0 1 1 0-8 4 4 0 0 1 0 8Zm14 0a4 4 0 1 1 0-8 4 4 0 0 1 0 8Z"/>
                                        </svg>
                                        <span
                                            class="text-sm font-medium ml-3 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Пошаговая рег.</span>
                                    </div>
                                    <!-- Icon -->
                                    <div class="flex shrink-0 ml-2">
                                        <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400"
                                             :class="parentLink.expanded && 'rotate-180'" viewBox="0 0 12 12">
                                            <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            <div class="lg:hidden lg:sidebar-expanded:block 2xl:block">
                                <ul class="pl-9 mt-1" :class="!parentLink.expanded && 'hidden'">
                                    <router-link :to="{ name: 'onboarding-01' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/onboarding-01'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Шаг 1</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'onboarding-02' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/onboarding-02'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Шаг 2</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'onboarding-03' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/onboarding-03'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Шаг 3</span>
                                            </a>
                                        </li>
                                    </router-link>
                                    <router-link :to="{ name: 'onboarding-04' }" custom
                                                 v-slot="{ href, navigate, isExactActive }">
                                        <li class="mb-1 last:mb-0">
                                            <a
                                                class="block transition duration-150 truncate"
                                                :class="{
                                                    'text-indigo-500': isExactActive,
                                                    'text-slate-400': !isExactActive,
                                                    'hover:text-slate-200': !isExactActive
                                                }"
                                                :href="href || '/admin/onboarding-04'"
                                                @click="() => { navigate(); }"
                                            >
                                                <span
                                                    class="text-sm font-medium lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">Шаг 4</span>
                                            </a>
                                        </li>
                                    </router-link>
                                </ul>
                            </div>
                        </SidebarLinkGroup>

                    </ul>
                </div>
            </div>

            <!-- Expand / collapse button -->
            <div class="pt-3 hidden lg:inline-flex 2xl:hidden justify-end mt-auto">
                <div class="px-3 py-2">
                    <button @click.prevent="sidebarExpanded = !sidebarExpanded">
                        <span class="sr-only">Expand / collapse sidebar</span>
                        <svg class="w-6 h-6 fill-current sidebar-expanded:rotate-180" viewBox="0 0 24 24">
                            <path class="text-slate-400"
                                  d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"/>
                            <path class="text-slate-600" d="M3 23H1V1h2z"/>
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</template>
