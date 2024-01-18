<!-- LogoutComponent.vue -->

<template>
    <div>
        <p>Вы успешно вышли из системы.</p>
        <router-link to="/" class="button">На главную</router-link>
    </div>
</template>

<script>
export default {
    methods: {
        logout() {
            // отправить запрос на выход к Laravel Sanctum
            axios.post('/logout')
                .then(response => {
                    // логика после успешного выхода
                })
                .catch(error => {
                    // обработка ошибок
                });
        }
    }
}
</script>
