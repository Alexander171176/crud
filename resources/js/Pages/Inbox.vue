<script>
import {ref} from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import InboxSidebar from '@/Partials/inbox/InboxSidebar.vue'
import InboxBody from '@/Partials/inbox/InboxBody.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'Inbox',
    components: {
        Head,
        AdminLayout,
        InboxSidebar,
        InboxBody,
    },
    setup() {

        const inboxSidebarOpen = ref(false)

        return {
            inboxSidebarOpen,
        }
    }
}
</script>

<template>
    <Head title="Inbox"/>
    <AdminLayout>
        <div class="relative flex">

            <!-- Inbox sidebar -->
            <InboxSidebar :inboxSidebarOpen="inboxSidebarOpen" @close-inboxsidebar="inboxSidebarOpen = false"/>

            <!-- Inbox body -->
            <InboxBody :inboxSidebarOpen="inboxSidebarOpen"
                       @toggle-inboxsidebar="inboxSidebarOpen = !inboxSidebarOpen"/>

        </div>
    </AdminLayout>
</template>

