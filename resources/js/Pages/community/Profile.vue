<script>
import { ref } from 'vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import ProfileSidebar from '@/Partials/community/ProfileSidebar.vue'
import ProfileBody from '@/Partials/community/ProfileBody.vue'
import { Head } from '@inertiajs/vue3'

export default {
    name: 'Profile',
    components: {
        AuthenticatedLayout,
        Head,
        ProfileSidebar,
        ProfileBody,
    },
    setup() {

        const profileSidebarOpen = ref(false)

        return {
            profileSidebarOpen,
        }
    }
}
</script>

<template>
    <Head title="Profile" />
    <AuthenticatedLayout>
        <div class="relative flex">

          <!-- Profile sidebar -->
          <ProfileSidebar :profileSidebarOpen="profileSidebarOpen" @close-profilesidebar="profileSidebarOpen = false" />

          <!-- Profile body -->
          <ProfileBody :profileSidebarOpen="profileSidebarOpen" @toggle-profilesidebar="profileSidebarOpen = !profileSidebarOpen" />

        </div>
    </AuthenticatedLayout>
</template>


