<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    users: Array,
});
</script>
<template>
    <header>
        <ul>
            <li><Link href="/dashboard">Dashboard</Link></li>
        </ul>
    </header>

    <div class="p-4">
        <h1 class="text-lg font-bold">ユーザ一覧</h1>
        <ul>
            <li v-for="user in users" :key="user.id">{{ user.name }}</li>
        </ul>
    </div>
</template>