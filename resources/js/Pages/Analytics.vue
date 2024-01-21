<script setup>
import {ref} from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Datepicker from '@/Components/Datepicker.vue'
import AnalyticsCard01 from '@/Partials/analytics/AnalyticsCard01.vue'
import AnalyticsCard02 from '@/Partials/analytics/AnalyticsCard02.vue'
import AnalyticsCard03 from '@/Partials/analytics/AnalyticsCard03.vue'
import AnalyticsCard04 from '@/Partials/analytics/AnalyticsCard04.vue'
import AnalyticsCard05 from '@/Partials/analytics/AnalyticsCard05.vue'
import AnalyticsCard06 from '@/Partials/analytics/AnalyticsCard06.vue'
import AnalyticsCard07 from '@/Partials/analytics/AnalyticsCard07.vue'
import AnalyticsCard08 from '@/Partials/analytics/AnalyticsCard08.vue'
import AnalyticsCard09 from '@/Partials/analytics/AnalyticsCard09.vue'
import AnalyticsCard10 from '@/Partials/analytics/AnalyticsCard10.vue'
import AnalyticsCard11 from '@/Partials/analytics/AnalyticsCard11.vue'
import {Head} from '@inertiajs/vue3'

const sidebarOpen = ref(false)

</script>

<template>
    <Head title="Analytics"/>
    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-8">

                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Analytics ✨</h1>
                </div>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                </div>

            </div>

            <!-- Cards -->
            <div class="grid grid-cols-12 gap-6">

                <!-- Line chart (Analytics) -->
                <AnalyticsCard01/>
                <!--  Line chart (Active Users Right Now) -->
                <AnalyticsCard02/>
                <!-- Stacked bar chart (Acquisition Channels) -->
                <AnalyticsCard03/>
                <!-- Horizontal bar chart (Audience Overview) -->
                <AnalyticsCard04/>
                <!-- Report card (Top Channels) -->
                <AnalyticsCard05/>
                <!-- Report card (Top Pages) -->
                <AnalyticsCard06/>
                <!-- Report card (Top Countries) -->
                <AnalyticsCard07/>
                <!-- Doughnut chart (Sessions By Device) -->
                <AnalyticsCard08/>
                <!-- Doughnut chart (Visit By Age Category) -->
                <AnalyticsCard09/>
                <!-- Polar chart (Sessions By Gender) -->
                <AnalyticsCard10/>
                <!-- Table (Top Products) -->
                <AnalyticsCard11/>

            </div>

        </div>
    </AdminLayout>
</template>
