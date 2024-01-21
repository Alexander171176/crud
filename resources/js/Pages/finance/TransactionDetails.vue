<script>
import {ref} from 'vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import DeleteButton from '@/Partials/actions/DeleteButton.vue'
import SearchForm from '@/Components/SearchForm.vue'
import DropdownTransaction from '@/Components/DropdownTransaction.vue'
import TransactionsTable from '@/Partials/finance/TransactionsTable02.vue'
import TransactionPanel from '@/Partials/finance/TransactionPanel.vue'
import PaginationClassic from '@/Components/PaginationClassic.vue'
import {Head} from '@inertiajs/vue3'

export default {
    name: 'TransactionDetails',
    components: {
        AdminLayout,
        Head,
        DeleteButton,
        SearchForm,
        DropdownTransaction,
        TransactionsTable,
        TransactionPanel,
        PaginationClassic,
    },
    setup() {
        const selectedItems = ref([])
        const transactionPanelOpen = ref(true)

        const updateSelectedItems = (selected) => {
            selectedItems.value = selected
        }

        return {
            selectedItems,
            transactionPanelOpen,
            updateSelectedItems,
        }
    },
}
</script>

<template>
    <Head title="TransactionDetails"/>
    <AdminLayout>
        <div class="relative">

            <!-- Content -->
            <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

                <!-- Page header -->
                <div class="sm:flex sm:justify-between sm:items-center mb-4 md:mb-2">

                    <!-- Left: Title -->
                    <div class="mb-4 sm:mb-0">
                        <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">$47,347.09</h1>
                    </div>

                    <!-- Right: Actions  -->
                    <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                        <!-- Delete button -->
                        <DeleteButton :selectedItems="selectedItems"/>

                        <!-- Search form -->
                        <div class="hidden sm:block">
                            <SearchForm/>
                        </div>

                        <!-- Export button -->
                        <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white">Export Transactions</button>

                    </div>

                </div>

                <div class="mb-5">
                    <span>Transactions from </span>
                    <DropdownTransaction/>
                </div>

                <!-- Filters -->
                <div class="mb-5">
                    <ul class="flex flex-wrap -m-1">
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm bg-indigo-500 text-white duration-150 ease-in-out">
                                View All
                            </button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                                Completed
                            </button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                                Pending
                            </button>
                        </li>
                        <li class="m-1">
                            <button
                                class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-slate-200 hover:border-slate-300 shadow-sm bg-white text-slate-500 duration-150 ease-in-out">
                                Canceled
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- Table -->
                <TransactionsTable @change-selection="updateSelectedItems($event)"
                                   @open-transactionpanel="transactionPanelOpen = true"/>

                <!-- Pagination -->
                <div class="mt-8">
                    <PaginationClassic/>
                </div>

            </div>

            <TransactionPanel :transactionPanelOpen="transactionPanelOpen"
                              @close-transactionpanel="transactionPanelOpen = false"/>

        </div>
    </AdminLayout>
</template>


