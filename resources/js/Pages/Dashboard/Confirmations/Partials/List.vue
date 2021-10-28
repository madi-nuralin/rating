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
            <div v-else class="col-span-5 mt-2" v-for="(activity, i) in assignment.activities">
                <Link class="text-left text-sm text-gray-600 cursor-pointer hover:text-indigo-500 hover:underline uppercase" :href="route('activity.show', {'id': activity.id})">
                    {{ (i + 1) + '. ' + activity.parameter.name }}
                </Link>

                <div class="mt-2 text-xs text-gray-600 text-left">
                    {{ activity.parameter.description }} | Score: {{ activity.score }}
                </div>
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