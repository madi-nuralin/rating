<template>
    <breeze-form-section>
        <template #title>
            Update employement information
        </template>

        <template #description>
            Update your employement information: choose departments and positions.
        </template>

        <template #form>
            <div class="col-span-6">
                <div class="max-w-xl text-sm text-gray-600">
                    The list of resources which are registered. Use link button to view and edit each item
                </div>
            </div>

            <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer col-span-6 sm:col-span-4">
                <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200" v-for="(employement, i) in user.employements" :key="employement.id" :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(user.employements).length - 1}">
                    <div class="w-full">
                        <!-- Position Name -->
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-600">
                                {{ employement.position.name }}
                            </div>

                            <Link class="w-4 mr-2 transform text-gray-400 hover:text-blue-400 hover:scale-110" :href="route('employement.show', {'id': employement.id})">
                                <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M7 17l9.2-9.2M17 17V7H7"/>
                                </svg>
                            </Link>
                        </div>

                        <!-- Position Description -->
                        <div class="mt-2 text-xs text-gray-600 text-left">
                            <span>Department: {{ employement.department.name }}</span>
                        </div>
                    </div>
                </button>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('employement.create')">
                Add New
            </Link>
        </template>
    </breeze-form-section>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            Link,
        },

        props: ['user'],
    }
</script>