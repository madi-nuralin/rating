<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links" :key="key">
                <div v-if="link.url === null" class="inline-flex items-center justify-center mr-1 mb-1 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-400 uppercase tracking-widest shadow-sm dark:bg-gray-600 dark:border-gray-600" v-html="link.label" />
                <Link v-else class="inline-flex items-center justify-center mr-1 mb-1 px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition dark:bg-gray-600 dark:border-gray-600 dark:text-white" :class="{ 'underline': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';
    export default {
        components: {
            Link,
        },
        props: {
            links: Array,
        }
    }
</script>