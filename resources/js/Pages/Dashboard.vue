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
                                <div class="flex items-center">
                                    <!--BreezeApplicationLogo class="block h-12 w-auto" /-->
                                    <img :src="$page.props.auth.user.profile_photo_path" class="w-12 h-12 rounded-full shadow" />
                                    <div class="ml-8 flex flex-col">
                                        <div class="text-2xl">
                                            Welcome to your Dashboard!
                                        </div>
                                        <div class="text-sm text-gray-500">
                                           {{ $page.props.auth.user.name }}, {{ $page.props.auth.user.email }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-gray-500">
                                Laravel Jetstream provides a beautiful, robust starting point for your next Laravel application. Laravel is designed
                                    to help you build your application using a development environment that is simple, powerful, and enjoyable. We believe
                                    you should love expressing your creativity through programming, so we have spent time carefully crafting the Laravel
                                    ecosystem to be a breath of fresh air. We hope you love it.
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 bg-gray-200 bg-opacity-25">
                            <div class="p-6">

                                <div class="flex flex-col sm:flex-row items-center">
                                    <div class="flex-shrink-0 flex items-center justify-center rounded-full _bg-gray-100 sm:mx-0 h-10 w-10">
                                        <svg class="h-6 w-6 text-gray-500"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            viewBox="0 0 24 24" >
                                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 text-lg leading-7">
                                        <Link :href="route('assignment.index')" class="text-lg font-thin dark:text-white">
                                            {{ $t('pages.dashboard.tabs.assignments') }}
                                        </Link>
                                    </div>
                                </div>

                                <div class="sm:ml-14">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                                <div class="flex flex-col sm:flex-row items-center">
                                    <div class="flex-shrink-0 flex items-center justify-center rounded-full _bg-gray-100 sm:mx-0 h-10 w-10">
                                        <svg class="h-6 w-6 text-gray-500" 
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4 text-lg leading-7">
                                        <Link :href="route('confirmation.index')" class="text-lg font-thin dark:text-white">
                                            {{ $t('pages.dashboard.tabs.confirmations') }}
                                        </Link>
                                    </div>
                                </div>

                                <div class="sm:ml-14">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                    </div>
                                </div>
                            </div>

                            <!--div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            </div-->

                            <!--div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            </div-->
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
import BreezeCheckbox from '@/Components/Checkbox'
import BreezeNavLink from '@/Components/NavLink.vue'
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink'
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeApplicationLogo,
        BreezeCheckbox,
        BreezeNavLink,
        BreezeResponsiveNavLink,
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
                    return 'p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l';
                case 3:
                    return 'p-6 border-t border-gray-200 dark:border-gray-700';
                case 4:
                    return 'p-6 border-t border-gray-200 dark:border-gray-700 md:border-l';
                default:
                    break;
            }
        }
    },
    computed: {
        confirmerContent() {
            var roles = this.$page.props.auth.user.roles;
            if (roles) {
                for (var i=0; i < roles.length; ++i) {
                    if (roles[i].context == 'confirmer') {
                        return true;
                    }
                }
            }
            return false;
        }
    }
}
</script>
