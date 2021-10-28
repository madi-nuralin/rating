<template>
    <BreezeFormCard>
        <template #title>
            <h3 class="text-lg font-medium text-gray-900">
                {{ assignment.assessment.name }}
            </h3>
        </template>

        <template #description>
            <p class="text-sm text-gray-600">
                {{ assignment.assessment.description }}
            </p>
        </template>

        <template #form>
            <div v-if="assignment.activities.length <= 0" style="min-height: 400px">
            </div>
            <div v-else class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer col-span-6 sm:col-span-4">
                <button class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200" type="button" v-for="(activity, i) in assignment.activities" :key="activity.id" :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(assignment.activities).length - 1}">

                    <div class="w-full">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-600 text-left">
                                {{ activity.parameter.name }}
                            </div>

                            <Link 
                                class="w-4 mr-2 transform text-gray-400 hover:text-blue-400 hover:scale-110"
                                :href="route('activity.show', {'id': activity.id})">
                                <svg class="ml-2 h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M7 17l9.2-9.2M17 17V7H7"/>
                                </svg>
                            </Link>
                        </div>

                        <div class="mt-2 text-xs text-gray-600 text-left">
                            {{ activity.parameter.description }}
                        </div>
                    </div>
                </button>
            </div>
        </template>

        <template #actions>
        </template>
    </BreezeFormCard>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormCard from '@/Components/FormCard.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormCard,
            Link,
        },

        props: ['assignment']
    }
</script>