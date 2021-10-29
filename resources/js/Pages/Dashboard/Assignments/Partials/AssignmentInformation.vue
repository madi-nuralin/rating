<template>
    <BreezeFormCard>
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #form>
            <div class="col-span-6 text-xs">
                <p>
                    {{ t('employement.department') }}
                </p>
                <p class="text-gray-600">
                    {{ assignment.employement.department.name }}
                </p>
            </div>

            <div class="col-span-6 text-xs">
                <p>
                    {{ t('employement.position') }}
                </p>
                <p class="text-gray-600">
                    {{ assignment.employement.position.name }}
                </p>
            </div>

            <div class="col-span-6 text-xs">
                <p>
                    {{ t('valid_date') }}
                </p>
                <p class="text-gray-600">
                    {{
                        new Date(this.assignment.assessment.valid_from).toDateString() + ' - ' +
                        new Date(this.assignment.assessment.valid_to).toDateString()
                    }}
                </p>
            </div>

            <div class="col-span-6 text-xs">
                <p>
                    {{ t('score') }}
                </p>
                <p class="text-gray-600">
                    {{ assignment.score }}
                </p>
            </div>
        </template>
    </BreezeFormCard>
</template>

<script>
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import BreezeFormCard from '@/Components/FormCard.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButtonSecondary,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
            BreezeFormCard,
        },

        props: ['assignment'],

        methods: {
            t(p) {
                return this.$t('pages.dashboard.assignments.assignment_information.' + p);
            },
        }
    }
</script>
