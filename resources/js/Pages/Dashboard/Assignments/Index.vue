<template>
    <Head :title="$t('pages.dashboard.assignments.head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('pages.dashboard.assignments.header') }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1 flex justify-between">
                        <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg w-full">

                            <!-- Assessment -->
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900">
                                    {{ $page.props.assessment.name }}
                                </h3>

                                <p class="mt-1 text-sm text-gray-600">
                                    {{ $page.props.assessment.description }}
                                </p>
                                <!-- Department & Position -->
                                <div class="flex items-center mt-3">
                                    <div class="_mx-auto flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="10" r="3"/>
                                            <path d="M12 21.7C17.3 17 20 13 20 10a8 8 0 1 0-16 0c0 3 2.7 6.9 8 11.7z"/>
                                        </svg>
                                    </div>
                                    <p class="mt-1 ml-4 text-sm text-gray-600">
                                        <p>
                                            <span>
                                                {{ $t('pages.dashboard.assignments.list.employement.department') }}
                                            </span>
                                            <span class="underline">
                                                {{ $page.props.employement.department.name }}
                                            </span>
                                        </p>
                                        <p>
                                            <span>
                                                {{ $t('pages.dashboard.assignments.list.employement.position') }}
                                            </span>
                                            <span class="underline">
                                                {{ $page.props.employement.position.name }}
                                            </span>
                                        </p>
                                    </p>
                                </div>
                                <!-- Valid Date -->
                                <div class="flex items-center mt-3">
                                    <div class="_mx-auto flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <svg class="h-5 w-5 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                    </div>
                                    <p class="mt-1 ml-4 text-sm text-gray-600">
                                        {{
                                            $t('pages.dashboard.assignments.list.valid', {
                                                from: $page.props.assessment.valid_from,
                                                to: $page.props.assessment.valid_to
                                            }) 
                                        }}
                                    </p>
                                </div>
                            </div>

                            <!-- Supervisors -->
                            <div class="mt-4 px-4 sm:px-0">
                                <h4 class="text-md font-medium text-gray-900">
                                    {{ $t('pages.dashboard.assignments.list.supervisors') }}
                                </h4>
                                <div v-for="(supervisor, i) in $page.props.assessment.supervisors">
                                    <div class="flex items-center mt-2">
                                        <img class="w-10 h-10 rounded-full" :src="supervisor.profile_photo_path">

                                        <div class="ml-4 leading-tight">
                                            <div>{{ supervisor.name }}</div>
                                            <div class="text-gray-700 text-sm">{{ supervisor.email }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Score -->
                            <div class="mt-4 px-4 sm:px-0">
                                <h4 class="text-md font-medium text-gray-900">
                                    {{ $t('pages.dashboard.assignments.list.score') }}
                                </h4>
                                <div class="flex items-center justify-center mt-2 text-3xl">
                                    0
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <resource-list :assignments="$page.props.assignments"/>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
    import BreezeSectionBorder from '@/Components/SectionBorder.vue'
    import ResourceList from '@/Pages/Dashboard/Assignments/Partials/List.vue'
    import { Head } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeAuthenticatedLayout,
            BreezeSectionBorder,
            ResourceList,
            Head,
        },
    }
</script>
