<template>
    <div>
        
        <BreezeBanner />

        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="bg-white border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="'/'">
                                    <BreezeApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <!--BreezeNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    {{ $t('layouts.authenticated.links.dashboard') }}
                                </BreezeNavLink-->
                                <BreezeNavLink :href="route('feed')" :active="route().current('feed')">
                                    <div class="flex flex-col items-center">
                                        <div>
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9"/>
                                                <path d="M9 22V12h6v10M2 10.6L12 2l10 8.6"/>
                                            </svg>
                                        </div>
                                        <div>
                                            {{ $t('layouts.authenticated.links.dashboardUser') }}
                                        </div>
                                    </div>
                                </BreezeNavLink>
                                <BreezeNavLink :href="route('dashboard-approver')" :active="route().current('dashboard-approver')" v-if="content('approver')">
                                    <div class="flex flex-col items-center">
                                        <div>
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/>
                                                <circle cx="12" cy="10" r="3"/>
                                                <circle cx="12" cy="12" r="10"/>
                                            </svg>
                                        </div>
                                        <div>
                                            {{ $t('layouts.authenticated.links.dashboardApprover') }}
                                        </div>
                                    </div>
                                </BreezeNavLink>
                                <BreezeNavLink :href="route('dashboard-verifier')" :active="route().current('dashboard-verifier')" v-if="content('verifier')">
                                    <div class="flex flex-col items-center">
                                        <div>
                                            <svg 
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                        <div>
                                            {{ $t('layouts.authenticated.links.dashboardVerifier') }}
                                        </div>
                                    </div>
                                </BreezeNavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Administration Dropdown -->
                            <div class="ml-3 relative" v-if="content('admin')">
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $t('layouts.authenticated.triggers.administration') }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ $t('layouts.authenticated.linkGroups.siteSettings') }}
                                        </div>
                                    </template>
                                </BreezeDropdown>
                            </div>

                            <!-- Management Dropdown -->
                            <div class="ml-3 relative" v-if="content('manager')">
                                <BreezeDropdown align="right" width="80">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 dark:text-gray-400 dark:hover:text-gray-300">
                                                {{ $t('layouts.authenticated.triggers.management') }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ $t('layouts.authenticated.linkGroups.manageEntities') }}
                                        </div>
                                        
                                        <BreezeDropdownLink :href="route('position.index')">
                                            {{ $t('layouts.authenticated.links.positions') }}
                                        </BreezeDropdownLink>
                                        <BreezeDropdownLink :href="route('department.index')">
                                            {{ $t('layouts.authenticated.links.departments') }}
                                        </BreezeDropdownLink>
                                        <BreezeDropdownLink :href="route('user.index')">
                                            {{ $t('layouts.authenticated.links.users') }}
                                        </BreezeDropdownLink>
                                        <BreezeDropdownLink :href="route('role.index')">
                                            {{ $t('layouts.authenticated.links.roles') }}
                                        </BreezeDropdownLink>
                                        <BreezeDropdownLink :href="route('employement.index')">
                                            {{ $t('layouts.authenticated.links.employements') }}
                                        </BreezeDropdownLink>

                                        <!-- Manage ratings-->
                                        <div class="border-t border-gray-100 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ $t('layouts.authenticated.linkGroups.manageRating') }}
                                        </div>

                                        <BreezeDropdownLink :href="route('rating.index')">
                                            {{ $t('layouts.authenticated.links.ratings') }}
                                        </BreezeDropdownLink>
                                        <BreezeDropdownLink :href="route('parameter.index')">
                                            {{ $t('layouts.authenticated.links.parameters') }}
                                        </BreezeDropdownLink>
                                    </template>
                                </BreezeDropdown>
                            </div>

                            <!-- Theme -->
                            <div class="ml-3 relative">
                                <span class="inline-flex items-center rounded-md">
                                    <BreezeTheme @update-theme="setTheme"/>
                                </span>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 dark:text-gray-400 dark:hover:text-gray-300">
                                                <img :src="$page.props.auth.user.profile_photo_path" class="object-cover rounded-full w-9 h-9 hover:shadow">
                                                <span class="ml-2">{{ $page.props.auth.user.name }}</span>

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <BreezeDropdownLink :href="route('profile.show')">
                                            {{ $t('layouts.authenticated.links.profile') }}
                                        </BreezeDropdownLink>

                                        <!-- Authentication -->
                                        <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                            {{ $t('layouts.authenticated.links.logout') }}
                                        </BreezeDropdownLink>

                                        <div class="border-t border-gray-100 dark:border-gray-600"></div>

                                        <!-- Locale -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ $t('layouts.authenticated.triggers.locale') }}
                                        </div>

                                        <BreezeDropdownLink :href="route('locale', {'locale': locale})" v-on:click="setLocale(locale)"
                                            v-for="locale in $page.props.locales">
                                            {{ $t(`layouts.authenticated.links.locales.${locale}`) }}
                                        </BreezeDropdownLink>
                                    </template>
                                </BreezeDropdown>
                            </div>

                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out dark:hover:bg-gray-900">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <!--BreezeResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            {{ $t('layouts.authenticated.links.dashboard') }}
                        </BreezeResponsiveNavLink-->
                        <BreezeResponsiveNavLink :href="route('feed')" :active="route().current('feed')">
                            {{ $t('layouts.authenticated.links.dashboardUser') }}
                        </BreezeResponsiveNavLink>
                        <BreezeResponsiveNavLink :href="route('dashboard-verifier')" :active="route().current('dashboard-verifier')" v-if="content('verifier')">
                            {{ $t('layouts.authenticated.links.dashboardVerifier') }}
                        </BreezeResponsiveNavLink>
                        <BreezeResponsiveNavLink :href="route('dashboard-approver')" :active="route().current('dashboard-approver')" v-if="content('approver')">
                            {{ $t('layouts.authenticated.links.dashboardApprover') }}
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                        <div class="flex items-center px-4">
                            <div class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_path" :alt="$page.props.auth.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800 dark:text-gray-100">{{ $page.props.auth.user.name }}</div>
                                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('profile.show')">
                                {{ $t('layouts.authenticated.links.profile') }}
                            </BreezeResponsiveNavLink>
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                {{ $t('layouts.authenticated.links.logout') }}
                            </BreezeResponsiveNavLink>

                            <!-- Responsive Management -->
                            <template v-if="content('manager')">
                                <div class="border-t border-gray-200 dark:border-gray-600"></div>
                                
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ $t('layouts.authenticated.triggers.management') }}
                                </div>

                                <BreezeResponsiveNavLink :href="route('position.index')">
                                    {{ $t('layouts.authenticated.links.positions') }}
                                </BreezeResponsiveNavLink>
                                <BreezeResponsiveNavLink :href="route('department.index')">
                                    {{ $t('layouts.authenticated.links.departments') }}
                                </BreezeResponsiveNavLink>
                                <BreezeResponsiveNavLink :href="route('user.index')">
                                    {{ $t('layouts.authenticated.links.users') }}
                                </BreezeResponsiveNavLink>
                                <BreezeResponsiveNavLink :href="route('role.index')">
                                    {{ $t('layouts.authenticated.links.roles') }}
                                </BreezeResponsiveNavLink>
                                <BreezeResponsiveNavLink :href="route('employement.index')">
                                    {{ $t('layouts.authenticated.links.employements') }}
                                </BreezeResponsiveNavLink>

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>
                                
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ $t('layouts.authenticated.linkGroups.manageRating') }}
                                </div>
                                <BreezeResponsiveNavLink :href="route('rating.index')">
                                    {{ $t('layouts.authenticated.links.ratings') }}
                                </BreezeResponsiveNavLink>
                                <BreezeResponsiveNavLink :href="route('parameter.index')">
                                    {{ $t('layouts.authenticated.links.parameters') }}
                                </BreezeResponsiveNavLink>
                            </template>

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Responsive Locale -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ $t('layouts.authenticated.triggers.locale') }}
                            </div>

                            <BreezeResponsiveNavLink :href="route('locale', {'locale': locale})" v-on:click="setLocale(locale)"
                                            v-for="locale in $page.props.locales">
                                {{ $t(`layouts.authenticated.links.locales.${locale}`) }}
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow dark:bg-gray-800" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
                        <slot name="header" />
                    </h2>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeBanner from '@/Components/Banner.vue'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeNavLink from '@/Components/NavLink.vue'
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import BreezeTheme from '@/Components/Theme.vue'
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeApplicationLogo,
        BreezeBanner,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        BreezeTheme,
        Link,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },

    methods: {
        setLocale(locale) {
            this.$root.$i18n.locale = locale;
            this.$store.commit('setAppLocale', locale);
        },

        setTheme(theme) {
            this.$store.commit('setAppTheme', theme);
        },

        content(context) {
            var roles = this.$page.props.auth.user.roles;
            if (roles) {
                for (var i=0; i < roles.length; ++i) {
                    if (roles[i].context == context) {
                        return true;
                    }
                }
            }
            return false;
        }
    }
}
</script>
