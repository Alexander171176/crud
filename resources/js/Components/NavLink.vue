<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    href: {
        type: String,
        required: true
    },
    active: {
        type: Boolean
    }
})

const lineStyle = computed(() => {
    return {
        borderLeft: props.active ? '2px solid red' : 'none', // Замените 'red' на нужный цвет
        paddingLeft: props.active ? '8px' : '0',
    };
});
</script>

<template>
    <Link :href="href" :class="{ 'inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-100 relative': active }">
        <span class="flex ml-4" :style="lineStyle"><slot></slot></span>
    </Link>
</template>
