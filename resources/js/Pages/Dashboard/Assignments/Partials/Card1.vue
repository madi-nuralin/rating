<template>
    <Card>
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #content>
            <div class="grid grid-cols-3 gap-2 text-xs">
                <div class="col-span-3 text-sm">{{ t('employement.department') }}</div>
                <div class="col-span-3 text-gray-600">{{ assignment.employement.department.name }}</div>
                <div class="col-span-3 text-sm">{{ t('employement.position') }}</div>
                <div class="col-span-3 text-gray-600">{{ assignment.employement.position.name }}</div>
                <div class="col-span-3 text-sm">{{ t('valid_date') }}</div>
                <div class="col-span-3 text-gray-600">
                    {{ new Date(assignment.assessment.valid_from).toDateString() + ' - ' + new Date(assignment.assessment.valid_to).toDateString() }}
                </div>
                <div class="col-span-3 text-sm">{{ t('score') }}</div>
                <div class="col-span-3 text-gray-600">{{ assignment.score }}</div>
            </div>
        </template>
    </Card>
</template>

<script>
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import Card from '@/Pages/Dashboard/Assignments/Partials/Card.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButtonSecondary,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
            Card,
        },

        props: ['assignment'],

        methods: {
            t(p) {
                return this.$t('pages.dashboard.assignments.card1.' + p);
            }
        }
    }
</script>
