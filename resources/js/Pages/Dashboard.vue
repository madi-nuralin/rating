<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-0 bg-white border-b border-gray-200">
                        <div>
                            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                                <div>
                                    <BreezeApplicationLogo class="block h-12 w-auto" />
                                </div>

                                <div class="mt-8 text-2xl">
                                    Welcome to your Dashboard!
                                </div>

                                <div class="mt-6 text-gray-500">
                                    Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                                    to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                                    you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                                    ecosystem to be a breath of fresh air. We hope you love it.
                                </div>
                            </div>

                            <div class="bg-gray-100 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                                <div class="p-6 py-3 text-center uppercase" @click="content = 'assignments'" :class="content == 'assignments' ? 'bg-gray-200 border-indigo-400 border-b-2' : ''">
                                    My assignments
                                </div>
                                <div class="p-6 py-3 text-center uppercase" @click="content = 'confirmation'" :class="content == 'confirmation' ? 'bg-gray-200 border-indigo-400 border-b-2' : ''">
                                    Confirmation
                                </div>
                            </div>

                            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2" v-if="content == 'assignments'">
                                <template v-for="(assignment, i) in $page.props.assignments">              
                                    <div :class="gridClass(i+1)">
                                        <div class="flex items-center">
                                            <svg fill="none"
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                viewBox="0 0 24 24"
                                                class="w-8 h-8 text-gray-400">
                                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                                                <a href="https://laravel.com/docs">
                                                    {{ assignment.assessment.name }}
                                                </a>
                                                <p class="text-sm text-gray-500">
                                                    {{ assignment.assessment.description }}
                                                </p>
                                                <p class="text-sm text-gray-400 mt-2">
                                                    <span class="underline">{{ assignment.employement.department.name }}</span>
                                                    <span>, </span>
                                                    <span class="underline">{{ assignment.employement.position.name }}</span>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="ml-12">
                                            <Link :href="route('assignment.show', {'id': assignment.id})">
                                                <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                                                    <div>Go to activity</div>

                                                    <div class="ml-1 text-indigo-500">
                                                        <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </Link>
                                        </div>
                                    </div>   
                                </template>
                            </div>

                            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2" v-if="content == 'confirmation'">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeApplicationLogo,
        Link,
        Head,
    },

    data() {
        return {
            content: 'assignments'
        };
    },

    methods: {
        gridClass(v) {
            switch (v % 4) {
                case 1:
                    return 'p-6';
                case 2:
                    return 'p-6 border-t border-gray-200 md:border-t-0 md:border-l';
                case 3:
                    return 'p-6 border-gray-200';
                case 4:
                    return 'p-6 border-gray-200 md:border-l';
                default:
                    break;
            }
        }
    },
}
</script>
