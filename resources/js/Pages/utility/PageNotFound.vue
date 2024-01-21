<script>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'PageNotFound',
    components: {
        AdminLayout,
        Head,
    }
}
</script>

<template>
    <Head title="PageNotFound"/>
    <AdminLayout>
        <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

            <div class="max-w-2xl m-auto mt-16">

                <div class="text-center px-4">
                    <div class="inline-flex mb-8">
                        <img src="../../../images/404-illustration.svg" width="176" height="176"
                             alt="404 illustration"/>
                    </div>
                    <div class="mb-6">Hmm...this page doesn’t exist. Try searching for something else!</div>
                    <router-link :to="{ name: 'dashboard' }" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                        Back To Dashboard
                    </router-link>
                </div>

            </div>

        </div>
    </AdminLayout>
</template>


