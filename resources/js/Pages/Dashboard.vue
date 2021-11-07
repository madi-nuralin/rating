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
                    <div class="p-0 bg-white _border-b _border-gray-200">
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
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-500">
                                        <p>Employement information</p>
                                        <ul class="list-disc ml-8 text-xs" v-for="(employement, i) in $page.props.auth.user.employements">
                                           <li>
                                                {{ employement.department.name }}, {{ employement.position.name }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <p>Roles</p>
                                        <ul class="list-disc ml-8 text-xs" v-for="(role, i) in $page.props.auth.user.roles">
                                           <li>
                                                {{ role.name }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 sm:px-20 bg-white border-b border-gray-200 text-gray-500">
                                {{ $t('pages.dashboard.description') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <Link :href="route('assignment.index')" class="underline text-gray-900 dark:text-white">
                                        {{ $t('pages.dashboard.tabs.assignments') }}
                                    </Link>
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    {{ $t('pages.dashboard.tabs.assignment.description') }}
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l" v-if="confirmerContent">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold">
                                    <Link :href="route('confirmation.index')" class="underline text-gray-900 dark:text-white">
                                        {{ $t('pages.dashboard.tabs.confirmations') }}
                                    </Link>
                                </div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    {{ $t('pages.dashboard.tabs.confirmation.description') }}
                                </div>
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
import BreezeButtonSecondary from '@/Components/ButtonSecondary'
import BreezeCheckbox from '@/Components/Checkbox'
import BreezeNavLink from '@/Components/NavLink.vue'
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink'
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeApplicationLogo,
        BreezeButtonSecondary,
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
