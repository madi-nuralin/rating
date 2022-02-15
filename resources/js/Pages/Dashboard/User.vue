<template>
    <Head :title="translate[0]('head.title')" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ translate[0]('header') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid gap-6 md:grid-cols-4">

                    <div class="md:col-span-1">
                        <div class="px-6 sm:px-0">
                            <div class="flex md:flex-col space-x-4 md:space-x-0">
                                <img class="inline-block h-16 w-16 md:h-32 md:w-32 xl:h-48 xl:w-48 rounded-full ring-2 ring-white" :src="$page.props.auth.user.profile_photo_path" />
                                <div>
                                    <h3 class="mt-2 text-lg font-bold text-xl text-gray-900">{{ $page.props.auth.user.name }}</h3>
                                    <p class="mt-0 text-sm text-gray-600">{{ $page.props.auth.user.email }}</p>
                                </div>
                            </div>
                            <Link class="mt-4 w-full inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" :href="route('profile.show')">
                                Edit profile
                            </Link>
                        </div>
                    </div>

                    <div class="md:col-span-3">
                        <!-- Cards -->
                        <div class="grid gap-6 mb-8 md:grid-cols-2 _xl:grid-cols-4">
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                                        ></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Total ratings
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $page.props.statistics.total }}
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Active
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                        {{ $page.props.statistics.active }}
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <div>
                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-tl-md sm:rounded-tr-md border-gray-200">
                                    <div class="flex">
                                        <breeze-button-secondary>
                                            {{ $page.props.statistics.total }} total ratings
                                        </breeze-button-secondary>
                                        <breeze-button-secondary :class="'ml-2'">
                                            {{ $page.props.statistics.active }} active
                                        </breeze-button-secondary>
                                    </div>
                                </div>

                                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-bl-md sm:rounded-br-md border-gray-200">
                                    <div class="flex flex-col space-y-4">
                                        <div v-for="rating in $page.props.ratings" :href="route('submission.index', {'rating': rating.id})">
                                            <div>
                                                <Link class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200 hover:underline" :href="route('submission.index', {'rating': rating.id})">
                                                    {{ rating.name }}
                                                </Link>
                                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                                                    {{ rating.description }}
                                                </p>
                                                <div class="flex space-x-2 mt-2 overflow-hidden">
                                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" :src="verifier.user.profile_photo_path" alt="" v-for="verifier in rating.verifiers" v-if="Object.keys(rating.verifiers).length > 0">
                                                    <p class="text-gray-600 text-sm" v-else>Нет участников</p>
                                                </div>
                                                <div class="mt-4 flex justify-between text-gray-600 text-sm">
                                                    <div>10 items</div>
                                                    <div>Finishes at Mon, 12, 2022</div>    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                        
                        <!--ul class="space-y-4">
                            <li v-for="rating in $page.props.ratings">
                                <Link class="font-sans px-4 py-2 bg-white block overflow-hidden border border-gray-300 rounded-md font-semibold text-xs text-gray-700 tracking-widest shadow-sm rounded-none sm:rounded-lg hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" :href="route('submission.index', {'rating': rating.id})">

                                    <div class="">
                                        <div>
                                            <div class="flex items-center justify-between md:justify-start space-x-4">
                                                <span class="flex relative h-2 w-2">
                                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                                </span>
                                                <h3 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200">{{ rating.name }}</h3>
                                            </div>

                                            <div class="flex justify-end space-x-2 mt-2 overflow-hidden">
                                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" :src="verifier.user.profile_photo_path" alt="" v-for="verifier in rating.verifiers" v-if="Object.keys(rating.verifiers).length > 0">
                                                <p class="text-gray-600 text-sm" v-else>Нет участников</p>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex justify-between text-gray-600 text-sm">
                                            <div>10 items</div>
                                            <div>Finishes at Mon, 12, 2022</div>    
                                        </div>
                                    </div>

                                </Link>
                            </li>
                        </ul-->
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import BreezeSectionBorder from '@/Components/SectionBorder.vue'
import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
import BreezeAvatar from '@/Components/Avatar.vue'
import { Link } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        BreezeSectionBorder,
        BreezeButtonSecondary,
        BreezeAvatar,
        Link,
        Head,
    },

    methods: {
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
    },

    computed: {
        translate() {
            var $t = this.$t;

            return [
                function (path) { // [0]
                    return $t(`pages.dashboard.${path}`);
                },
                function (path) { // [1]
                    return $t(`pages.dashboard.partials.view1.${path}`);
                },
                function (path) { // [2]
                    return $t(`pages.dashboard.partials.view2.${path}`);
                },
                function (path) { // [3]
                    return $t(`pages.dashboard.partials.view3.${path}`);
                },
            ]
        }
    },
}
</script>