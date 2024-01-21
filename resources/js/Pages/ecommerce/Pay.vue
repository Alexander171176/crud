<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {Head} from "@inertiajs/vue3";

export default {
    name: 'Pay',
    components: {
        Head,
        AdminLayout
    }
}
</script>

<template>
    <Head title="Pay"/>
    <AdminLayout>
        <div class="relative pt-8">
            <div class="absolute inset-0 bg-slate-800 overflow-hidden" aria-hidden="true">
                <img class="object-cover h-full w-full filter blur opacity-10" src="../../../images/pay-bg.jpg"
                     width="460" height="180" alt="Pay background"/>
            </div>
            <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto">
                <img class="rounded-t shadow-lg" src="../../../images/pay-bg.jpg" width="460" height="180"
                     alt="Pay background"/>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8 pb-8 max-w-lg mx-auto">
            <div class="bg-white px-8 pb-6 rounded-b shadow-lg">

                <!-- Card header -->
                <div class="text-center mb-6">
                    <div class="mb-2">
                        <img class="-mt-8 inline-flex rounded-full" src="../../../images/user-64-13.jpg" width="64"
                             height="64" alt="User"/>
                    </div>
                    <h1 class="text-xl leading-snug text-slate-800 font-semibold mb-2">Front-End Learning 🔥</h1>
                    <div class="text-sm">
                        Learn how to create real web apps using HTML & CSS. Code templates included.
                    </div>
                </div>

                <!-- Toggle -->
                <div class="flex justify-center mb-6">
                    <div class="relative flex w-full p-1 bg-slate-50 rounded">
            <span class="absolute inset-0 m-1 pointer-events-none" aria-hidden="true">
              <span
                  class="absolute inset-0 w-1/2 bg-white rounded border border-slate-200 shadow-sm transition duration-150 ease-in-out"
                  :class="card ? 'translate-x-0' : 'translate-x-full'"></span>
            </span>
                        <button class="relative flex-1 text-sm font-medium p-1 duration-150 ease-in-out"
                                @click.prevent="card = true">Pay With Card
                        </button>
                        <button class="relative flex-1 text-sm font-medium p-1 duration-150 ease-in-out"
                                @click.prevent="card = false">Pay With PayPal
                        </button>
                    </div>
                </div>

                <!-- Card form -->
                <div>
                    <div class="space-y-4">
                        <!-- Card Number -->
                        <div>
                            <label class="block text-sm font-medium mb-1" for="card-nr">Card Number <span
                                class="text-rose-500">*</span></label>
                            <input id="card-nr" class="form-input w-full" type="text"
                                   placeholder="1234 1234 1234 1234"/>
                        </div>
                        <!-- Expiry and CVC -->
                        <div class="flex space-x-4">
                            <div class="flex-1">
                                <label class="block text-sm font-medium mb-1" for="card-expiry">Expiry Date <span
                                    class="text-rose-500">*</span></label>
                                <input id="card-expiry" class="form-input w-full" type="text" placeholder="MM/YY"/>
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-medium mb-1" for="card-cvc">CVC <span
                                    class="text-rose-500">*</span></label>
                                <input id="card-cvc" class="form-input w-full" type="text" placeholder="CVC"/>
                            </div>
                        </div>
                        <!-- Name on Card -->
                        <div>
                            <label class="block text-sm font-medium mb-1" for="card-name">Name on Card <span
                                class="text-rose-500">*</span></label>
                            <input id="card-name" class="form-input w-full" type="text" placeholder="John Doe"/>
                        </div>
                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium mb-1" for="card-email">Email <span
                                class="text-rose-500">*</span></label>
                            <input id="card-email" class="form-input w-full" type="email"
                                   placeholder="john@company.com"/>
                        </div>
                    </div>
                    <!-- Form footer -->
                    <div class="mt-6">
                        <div class="mb-4">
                            <button class="btn w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Pay
                                $253.00
                            </button>
                        </div>
                        <div class="text-xs text-slate-500 italic text-center">You'll be charged $253, including $48
                            for
                            VAT in Italy
                        </div>
                    </div>
                </div>

                <!-- PayPal form -->
                <div>
                    <div>
                        <div class="mb-4">
                            <button class="btn w-full bg-indigo-500 hover:bg-indigo-600 text-white" href="#0">Pay
                                with
                                PayPal - $253.00
                            </button>
                        </div>
                        <div class="text-xs text-slate-500 italic text-center">You'll be charged $253, including $48
                            for
                            VAT in Italy
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>


