<script>
import { ref, onMounted, watch } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import MessagesSidebar from '@/Partials/messages/MessagesSidebar.vue'
import MessagesHeader from '@/Partials/messages/MessagesHeader.vue'
import MessagesBody from '@/Partials/messages/MessagesBody.vue'
import MessagesFooter from '@/Partials/messages/MessagesFooter.vue'
import { Head } from '@inertiajs/vue3'

export default {
    name: 'Messages',
    components: {
        Head,
        AuthenticatedLayout,
        MessagesSidebar,
        MessagesHeader,
        MessagesBody,
        MessagesFooter,
    },
    setup() {

        const msgSidebarOpen = ref(true)
        const contentArea = ref(null)

        const handleScroll = () => {
            contentArea.value.scrollTop = 99999999
        }

        onMounted(() => {
            handleScroll()
        })

        watch(msgSidebarOpen, () => {
            handleScroll()
        })

        return {
            msgSidebarOpen,
            contentArea,
        }
    }
}
</script>

<template>
    <Head title="Messages" />
    <AuthenticatedLayout>
        <div class="relative flex">

          <!-- Messages sidebar -->
          <MessagesSidebar :msgSidebarOpen="msgSidebarOpen" @close-msgsidebar="msgSidebarOpen = false" />

          <!-- Messages body -->
          <div class="grow flex flex-col md:translate-x-0 transition-transform duration-300 ease-in-out" :class="msgSidebarOpen ? 'translate-x-1/3' : 'translate-x-0'">
            <MessagesHeader :msgSidebarOpen="msgSidebarOpen" @toggle-msgsidebar="msgSidebarOpen = !msgSidebarOpen" />
            <MessagesBody />
            <MessagesFooter />
          </div>

        </div>
    </AuthenticatedLayout>
</template>
