<script>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import DropdownClassic from '@/Components/DropdownClassic.vue'
import DropdownFull from '@/Components/DropdownFull.vue'
import DropdownFilter from '@/Components/DropdownFilter.vue'
import DropdownProfile from '@/Components/DropdownProfile.vue'
import DropdownSwitch from '@/Components/DropdownSwitch.vue'
import DropdownNotifications from '@/Components/DropdownNotifications.vue'
import DropdownHelp from '@/Components/DropdownHelp.vue'
import DropdownEditMenu from '@/Components/DropdownEditMenu.vue'
import Datepicker from '@/Components/Datepicker.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'DropdownPage',
    components: {
        AdminLayout,
        Head,
        DropdownClassic,
        DropdownFull,
        DropdownFilter,
        DropdownProfile,
        DropdownSwitch,
        DropdownNotifications,
        DropdownHelp,
        DropdownEditMenu,
        Datepicker,
    }
}
</script>

<template>
    <Head title="DropdownPage"/>
    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="mb-8">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Dropdown ✨</h1>
            </div>

            <div class="border-t border-slate-200">

                <!-- Components -->
                <div class="space-y-8 mt-8 mb-80">

                    <!-- Classic Dropdown -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Classic Dropdown</h2>
                        <!-- Start -->
                        <DropdownClassic/>
                        <!-- End -->
                    </div>

                    <!-- Full-width Dropdown -->
                    <div class="w-80">
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Full-width Dropdown</h2>
                        <DropdownFull/>
                    </div>

                    <!-- Filter -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Filter</h2>
                        <DropdownFilter/>
                    </div>

                    <!-- Profile -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Profile</h2>
                        <DropdownProfile/>
                    </div>

                    <!-- Switch Account -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Switch Account</h2>
                        <DropdownSwitch/>
                    </div>

                    <!-- Notification -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Notification</h2>
                        <DropdownNotifications/>
                    </div>

                    <!-- Help Center -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Help Center</h2>
                        <DropdownHelp/>
                    </div>

                    <!-- Quick Selection -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Quick Selection</h2>
                        <DropdownEditMenu class="relative inline-flex">
                            <li>
                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                                   href="#0">Option 1</a>
                            </li>
                            <li>
                                <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex py-1 px-3"
                                   href="#0">Option 2</a>
                            </li>
                            <li>
                                <a class="font-medium text-sm text-rose-500 hover:text-rose-600 flex py-1 px-3"
                                   href="#0">Remove</a>
                            </li>
                        </DropdownEditMenu>
                    </div>

                    <!-- Datepicker (built with flatpickr) -->
                    <div>
                        <h2 class="text-2xl text-slate-800 font-bold mb-6">Datepicker (built with <a
                            class="underline hover:no-underline" href="https://github.com/flatpickr/flatpickr"
                            target="_blank" rel="noreferrer">flatpickr</a>)</h2>
                        <Datepicker/>
                    </div>

                </div>

            </div>

        </div>
    </AdminLayout>
</template>


