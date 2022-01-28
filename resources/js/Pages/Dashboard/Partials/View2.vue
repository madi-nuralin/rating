<template>
	<BreezeAccordion :triggerClass="'px-4 sm:px-0'">
        <template #trigger>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight normal-case">
                {{ translate('title') }}
            </h2>
        </template>
    
        <template #content>
            <div class="mt-4 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <ul class="list-disc list-inside">
                        <li v-for="element in elements">
                            <span>{{ element.year }}</span>
                            <ul class="list-disc list-inside ml-5">
                                <li v-for="rating in element.ratings">
                                    <span>{{rating.name}}</span>
                                    <ul class="list-disc list-inside ml-10">
                                        <li v-for="user in rating.users">
                                            <Link class="text-indigo-700 tracking-wide underline" :href="route('verification.index', {'verifier': rating.verifier.id, 'rating': rating.id, 'user': user.id})">
                                                {{user.name}}
                                            </Link>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </template>
    </BreezeAccordion>
</template>

<script>
    import BreezeBadge from '@/Components/Badge.vue'
    import BreezeAccordion from '@/Components/Accordion.vue'
    import { Link } from '@inertiajs/inertia-vue3';
    export default {
        components: {
            BreezeAccordion,
            BreezeBadge,
            Link,
        },

        props: ['elements', 'translate'],
/*
<svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62.9 56" aria-hidden="true" height="56" width="56">
    <path d="m31.9 27.99a1 1 0 0 1 -1-1v-4.1a1 1 0 1 1 2 0v4.1a1 1 0 0 1 -1 1z" fill="#2088ff"></path>
    <path d="m37.6 41.99h-29.1a1 1 0 0 1 0-2h29.1a1 1 0 0 1 0 2zm-14.44 6.1h-14.66a1 1 0 0 1 0-2h14.66a1 1 0 0 1 0 2zm28.74-2.9h-2.3a1 1 0 0 1 -1-1v-2.1a1 1 0 0 1 2 0v1.1h1.3a1 1 0 0 1 0 2z" fill="#79b8ff"></path>
    <path d="m49.7 50.79a6.6 6.6 0 1 1 6.6-6.6 6.61 6.61 0 0 1 -6.6 6.6zm0-11.2a4.6 4.6 0 1 0 4.6 4.6 4.61 4.61 0 0 0 -4.6-4.6z" fill="#79b8ff"></path>
    <path d="m60.9 23.79h-58.9a2.08 2.08 0 0 1 -2-2v-19.8a1.93 1.93 0 0 1 1.86-2h59a1.93 1.93 0 0 1 2 1.86v19.94a1.93 1.93 0 0 1 -1.87 2zm-58.9-2.06 58.9.06v-19.8h-58.9z" fill="#2088ff"></path>
    <path d="m60.9 55.99h-58.9a2.08 2.08 0 0 1 -2-2v-19.8a1.93 1.93 0 0 1 1.86-2h59a1.93 1.93 0 0 1 2 1.86v19.94a1.93 1.93 0 0 1 -1.86 2zm-58.9-2.06 58.9.06v-19.8h-58.9z" fill="#79b8ff"></path>
    <g fill="#2088ff">
        <path d="m37.6 9.79h-29.1a1 1 0 0 1 0-2h29.1a1 1 0 0 1 0 2zm-14.44 6h-14.66a1 1 0 0 1 0-2h14.66a1 1 0 0 1 0 2zm28.74-2.9h-2.3a1 1 0 0 1 -1-1v-2.1a1 1 0 0 1 2 0v1.1h1.3a1 1 0 0 1 0 2z"></path>
        <path d="m49.7 18.49a6.6 6.6 0 1 1 6.6-6.6 6.61 6.61 0 0 1 -6.6 6.6zm0-11.2a4.6 4.6 0 1 0 4.6 4.6 4.61 4.61 0 0 0 -4.6-4.6z"></path>
    </g>
</svg>
*/
    }
</script>
