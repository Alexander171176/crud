<script setup>
import { defineProps } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    href: {
        type: String,
        required: true
    },
    activeClass: {
        type: String,
        default: 'text-indigo-500' // Замените на класс для активного состояния
    },
    inactiveClass: {
        type: String,
        default: 'text-white' // Замените на класс для неактивного состояния
    },
    active: Boolean
});
</script>

<template>
    <Link :href="href" :class="{ 'inline-flex items-center w-full text-sm font-semibold dark:relative': active, [activeClass]: active, [inactiveClass]: !active }">
        <span class="flex ml-3"><slot></slot></span>
    </Link>
</template>
