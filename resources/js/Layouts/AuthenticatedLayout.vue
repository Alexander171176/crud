<script setup>
import {ref} from 'vue'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import NavLink from '@/Components/NavLink.vue'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import Navigation from '@/Layouts/Navigation.vue';
import TopMenu from "@/Layouts/TopMenu.vue";
import NavigationMobile from '@/Layouts/NavigationMobile.vue';
import {Link} from '@inertiajs/vue3'

const showingNavigationDropdown = ref(false)
</script>

<template>
    <div>
        <div class="flex h-screen bg-gray-50">
            <Navigation/>
            <NavigationMobile/>

            <div class="flex flex-col flex-1 w-full">
                <TopMenu/>

                <main class="h-full overflow-y-auto">
                    <div class="container px-6 mx-auto grid">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700">
                            <slot name="header"/>
                        </h2>

                        <slot/>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>
