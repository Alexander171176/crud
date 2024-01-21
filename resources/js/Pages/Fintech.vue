<script setup>
import {ref} from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import Datepicker from '@/Components/Datepicker.vue'
import FintechIntro from '@/Partials/fintech/FintechIntro.vue'
import FintechCard01 from '@/Partials/fintech/FintechCard01.vue'
import FintechCard02 from '@/Partials/fintech/FintechCard02.vue'
import FintechCard03 from '@/Partials/fintech/FintechCard03.vue'
import FintechCard04 from '@/Partials/fintech/FintechCard04.vue'
import FintechCard05 from '@/Partials/fintech/FintechCard05.vue'
import FintechCard06 from '@/Partials/fintech/FintechCard06.vue'
import FintechCard07 from '@/Partials/fintech/FintechCard07.vue'
import FintechCard08 from '@/Partials/fintech/FintechCard08.vue'
import FintechCard09 from '@/Partials/fintech/FintechCard09.vue'
import FintechCard10 from '@/Partials/fintech/FintechCard10.vue'
import FintechCard11 from '@/Partials/fintech/FintechCard11.vue'
import FintechCard12 from '@/Partials/fintech/FintechCard12.vue'
import FintechCard13 from '@/Partials/fintech/FintechCard13.vue'
import FintechCard14 from '@/Partials/fintech/FintechCard14.vue'
import {Head} from '@inertiajs/vue3'

const sidebarOpen = ref(false)

</script>

<template>
    <Head title="Fintech"/>

    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="sm:flex sm:justify-between sm:items-center mb-5">

                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Fintech ✨</h1>
                </div>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                    <!-- Datepicker built with flatpickr -->
                    <Datepicker align="right"/>

                    <!-- Add account button -->
                    <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                            <path
                                d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z"/>
                        </svg>
                        <span class="hidden xs:block ml-2">Add Account</span>
                    </button>

                </div>

            </div>

            <!-- Cards -->
            <div class="grid grid-cols-12 gap-6">

                <!-- Page Intro -->
                <FintechIntro/>
                <!-- Line chart (Portfolio Returns) -->
                <FintechCard01/>
                <!-- Credit Card -->
                <FintechCard02/>
                <!-- Bar chart (Cash Flow) -->
                <FintechCard03/>
                <!-- Horizontal bar chart (Cash Flow by Account) -->
                <FintechCard04/>
                <!-- Table (Recent Expenses) -->
                <FintechCard05/>
                <!-- Table (Recent Earnings) -->
                <FintechCard06/>
                <!-- Line chart (Saving Goals) -->
                <FintechCard07/>
                <!-- Line chart (Growth Portfolio) -->
                <FintechCard08/>
                <!-- Pie chart (Portfolio Value) -->
                <FintechCard09/>
                <!-- Line charts (Stock graphs) -->
                <FintechCard10/>
                <FintechCard11/>
                <FintechCard12/>
                <FintechCard13/>
                <!-- Table (Market Trends) -->
                <FintechCard14/>

            </div>

        </div>
    </AdminLayout>
</template>
