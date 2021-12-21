<template>
    <BreezeSectionTitle class="flex-col">
        <template #title>
            {{ $t('pages.dashboard.assignments.list.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.assignments.list.description') }}
        </template>

        <template #aside>
            <div class="w-full mt-5 grid grid-cols-1 sm:grid-cols-4 md:grid-cols-5 gap-0 sm:gap-6">
                <Link class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-sm text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" v-for="(assignment, i) in assignments" :href="route('assignment.show', {'id': assignment.id})">
                    <div class="flex flex-row sm:flex-col items-center h-full text-left sm:text-center">
                        <div class="flex-shrink">
                            <img :src="'https://ui-avatars.com/api/?name=' + assignment.assessment.name + '&color=7F9CF5&background=EBF4FF'" class="object-contain rounded-lg pointer-events-none sm:m-2 w-12 h-12 sm:w-20 sm:h-20">
                        </div>
                        
                        <div class="flex items-center h-full ml-2 sm:ml-0">
                            <p class="sm:p-2">
                                {{ assignment.assessment.name }}
                            </p>
                        </div>
                    </div>
                </Link>
            </div>
        </template>
    </BreezeSectionTitle>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeSectionTitle from '@/Components/SectionTitle.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeSectionTitle,
            Link,
        },

        props: ['assignments'],
    }
</script>