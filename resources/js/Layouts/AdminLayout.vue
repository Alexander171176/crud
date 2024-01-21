<script setup>
import { ref } from 'vue'
import Sidebar from '@/Partials/Sidebar.vue'
import Header from '@/Partials/Header.vue'
import Banner from '@/Partials/Banner.vue'

const sidebarOpen = ref(false);
</script>

<template>
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <Sidebar :sidebarOpen="sidebarOpen" @close-sidebar="sidebarOpen = false" />

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <Header :sidebarOpen="sidebarOpen" @toggle-sidebar="sidebarOpen = !sidebarOpen" />

            <main>
                <slot/>
            </main>

            <Banner />

        </div>

    </div>
</template>
