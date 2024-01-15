// router.js

import { createWebHistory, createRouter } from 'vue-router';

// Импортируйте ваши компоненты
import Dashboard from './Pages/Dashboard.vue'; // Используйте относительный путь

const routes = [
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
        meta: { middleware: ['auth', 'verified'] },
    },
    // Добавьте другие маршруты здесь, если необходимо
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
