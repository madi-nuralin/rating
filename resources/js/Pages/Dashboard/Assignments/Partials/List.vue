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
            <div style="min-height: 400px">
                
            </div>
        </template>

        <template #actions>
        </template>

        
                    
                <!--div class="col-span-5 mt-2" v-for="(activity, i) in assignment.activities">
                    <Link class="text-left text-sm text-gray-600 cursor-pointer hover:text-indigo-500 hover:underline uppercase" :href="route('activity.show', {'id': activity.id})">
                        {{ (i + 1) + '. ' + activity.parameter.name }}
                    </Link>

                    <div class="mt-2 text-xs text-gray-600 text-left">
                        {{ activity.parameter.description }} | Score: {{ activity.score }}
                    </div>
                </div-->

        <!--div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('activity.create', {'assessment': assignment.assessment.id, 'employement': assignment.employement.id})">
                {{ $t('pages.dashboard.assignments.list.actions.createButton') }}
            </Link-->
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

        props: ['assignment'],
    }
</script>