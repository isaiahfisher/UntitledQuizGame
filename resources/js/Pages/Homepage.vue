<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Untitled Quiz Game!" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-stone-900 sm:items-center sm:pt-0"
    >
        <div
            v-if="canLogin"
            class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
        >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline"
                >Dashboard</Link
            >
            

            <template v-else>
                <Link
                    :href="route('login')"
                    class="text-sm text-green-700 dark:text-green-500 underline"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-green-700 dark:text-green-500 underline"
                    >Register</Link
                >

                
            </template>
        </div>
        <div>
            <h1>Welcome to the Untitled Quiz Game!</h1>
            <p class="subtitle">to start, login or register</p>
        </div>
    </div>
</template>

<style>

h1 {
    font-size: clamp(1rem, 3vw + 1rem, 4rem);
    position: relative;
    font-family: "Source Code Pro", monospace;
    position: relative;
    width: max-content;
    color: #22c55e;
}

.subtitle {
    color: #22c55e;
    font-size: 2rem;
    font-weight: 400;
    opacity: 0;
    transform: translateY(3rem);
    animation: fadeInUp 2s ease 8s forwards;
}

h1::before,
h1::after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

h1::before {
    background: #1c1917;
    animation: typewriter 6.5s steps(32) 1s forwards;
}

h1::after {
    width: 0.125em;
    background: #22c55e;
    animation: typewriter 6.5s steps(32) 1s forwards,
        blink 750ms steps(32) infinite;
}
/* typewriter animation */
@keyframes typewriter {
    to {
        left: 100%;
    }
}
/* cursor animation */
@keyframes cursor {
    to {
        background: transparent;
    }
}

@keyframes blink {
    to {
        background: transparent;
    }
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
