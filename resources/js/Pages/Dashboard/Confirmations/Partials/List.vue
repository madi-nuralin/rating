<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('pages.dashboard.confirmations.list.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.confirmations.list.description') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <div class="max-w-xl text-sm text-gray-600">
                    {{ $t('pages.dashboard.confirmations.list.form.listInfo') }}
                </div>
            </div>
                
            <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer col-span-6 sm:col-span-4">
                <button class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200" type="button" v-for="(confirmation, i) in confirmations" :key="confirmation.id" :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(confirmations).length - 1}">

                    <div class="w-full">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-600 text-left">
                                {{ confirmation.assignment.assessment.name }}
                            </div>

                            <Link 
                                class="w-4 mr-2 transform text-gray-400 hover:text-blue-400 hover:scale-110"
                                :href="route('confirmation.show', {'id': confirmation.id})">
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
                            <div class="flex flex-col">
                                <div>{{ confirmation.assignment.assessment.description }}</div>

                                <ul class="list-disc list-inside mt-2">
                                    <li>
                                        {{ confirmation.assignment.user.name }}</li>
                                    <li>
                                        {{ confirmation.assignment.employement.department.name }}</li>
                                    <li>
                                        {{ confirmation.assignment.employement.position.name }}</li>
                                    <li>
                                        {{ confirmation.assignment.score }} pts.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </template>

        <template #actions>
        </template>
    </BreezeFormSection>
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

        props: ['confirmations'],
    }
</script>