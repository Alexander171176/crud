<script>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InboxSidebar from '@/Partials/inbox/InboxSidebar.vue'
import InboxBody from '@/Partials/inbox/InboxBody.vue'
import { Head } from '@inertiajs/vue3'

export default {
    name: 'Inbox',
    components: {
        Head,
        AuthenticatedLayout,
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
    <Head title="Inbox" />
    <AuthenticatedLayout>
        <div class="relative flex">

          <!-- Inbox sidebar -->
          <InboxSidebar :inboxSidebarOpen="inboxSidebarOpen" @close-inboxsidebar="inboxSidebarOpen = false" />

          <!-- Inbox body -->
          <InboxBody :inboxSidebarOpen="inboxSidebarOpen" @toggle-inboxsidebar="inboxSidebarOpen = !inboxSidebarOpen" />

        </div>
    </AuthenticatedLayout>
</template>

