<template>
    <div>
        
        <BreezeBanner />

        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="flex-shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <BreezeApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <BreezeNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    {{ $t('layouts.authenticated.links.dashboard') }}
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
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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
                                        <BreezeDropdownLink :href="route('employement.index')">
                                            {{ $t('layouts.authenticated.links.employements') }}
                                        </BreezeDropdownLink>

                                        <!-- Manage ratings-->
                                        <div class="border-t border-gray-100"></div>

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

                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <BreezeDropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <img :src="$page.props.auth.user.profile_photo_path" class="block rounded-full w-9 h-9 hover:shadow">
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

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Locale -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ $t('layouts.authenticated.triggers.locale') }}
                                        </div>

                                        <BreezeDropdownLink :href="route('locale', {locale:'ru'})" v-on:click="setLocale('ru')">
                                            {{ $t('layouts.authenticated.links.locales.ru') }}
                                        </BreezeDropdownLink>
                                        <BreezeDropdownLink :href="route('locale', {locale:'en'})" v-on:click="setLocale('en')">
                                            {{ $t('layouts.authenticated.links.locales.en') }}
                                        </BreezeDropdownLink>
                                    </template>
                                </BreezeDropdown>
                            </div>

                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
                        <BreezeResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            {{ $t('layouts.authenticated.links.dashboard') }}
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div class="flex-shrink-0 mr-3" >
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_path" :alt="$page.props.auth.user.name" />
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
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
                                <div class="border-t border-gray-200"></div>
                                
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
                                <BreezeResponsiveNavLink :href="route('employement.index')">
                                    {{ $t('layouts.authenticated.links.employements') }}
                                </BreezeResponsiveNavLink>

                                <div class="border-t border-gray-200"></div>
                                
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

                            <div class="border-t border-gray-200"></div>

                            <!-- Responsive Locale -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ $t('layouts.authenticated.triggers.locale') }}
                            </div>

                            <BreezeResponsiveNavLink :href="route('locale', {locale:'en'})" v-on:click="setLocale('en')">
                                {{ $t('layouts.authenticated.links.locales.en') }}
                            </BreezeResponsiveNavLink>
                            <BreezeResponsiveNavLink :href="route('locale', {locale:'ru'})" v-on:click="setLocale('ru')">
                                {{ $t('layouts.authenticated.links.locales.ru') }}
                            </BreezeResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
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
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeApplicationLogo,
        BreezeBanner,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeResponsiveNavLink,
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
