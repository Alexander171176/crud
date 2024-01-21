<script>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import SettingsSidebar from '@/Partials/settings/SettingsSidebar.vue'
import FeedbackPanel from '@/Partials/settings/FeedbackPanel.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'Apps',
    components: {
        AdminLayout,
        Head,
        SettingsSidebar,
        FeedbackPanel,
    }
}
</script>

<template>
    <Head title="Feedback"/>
    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <!-- Page header -->
            <div class="mb-8">
                <!-- Title -->
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Account Settings ✨</h1>
            </div>

            <!-- Content -->
            <div class="bg-white shadow-lg rounded-sm mb-8">
                <div class="flex flex-col md:flex-row md:-mr-px">
                    <SettingsSidebar/>
                    <FeedbackPanel/>
                </div>
            </div>

        </div>
    </AdminLayout>
</template>


