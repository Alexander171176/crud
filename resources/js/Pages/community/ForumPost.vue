<script>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import ForumLeftContent from '@/Partials/community/ForumLeftContent.vue'
import ForumEntry from '@/Partials/community/ForumEntry.vue'
import ForumRightContent from '@/Partials/community/ForumPostRightContent.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'ForumPost',
    components: {
        AdminLayout,
        Head,
        ForumLeftContent,
        ForumEntry,
        ForumRightContent,
    }
}
</script>

<template>
    <Head title="Dashboard"/>
    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 md:py-0 w-full max-w-9xl mx-auto">

            <div class="xl:flex">

                <!-- Left + Middle content -->
                <div class="md:flex flex-1">

                    <!-- Left content -->
                    <ForumLeftContent/>

                    <!-- Middle content -->
                    <div class="flex-1 md:ml-8 xl:mx-4 2xl:mx-8">
                        <div class="md:py-8">

                            <!-- Forum entry -->
                            <ForumEntry/>

                        </div>
                    </div>

                </div>

                <!-- Right content -->
                <ForumRightContent/>

            </div>

        </div>
    </AdminLayout>
</template>


