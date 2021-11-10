<template>
    <BreezeActionSection>
        <template #title>
            {{ $t('pages.dashboard.assignments.information.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.assignments.information.description') }}
        </template>

        <template #content>
            <div :class="{'mt-2': i > 0}" v-for="(item, i) in items">
                <div class="grid grid-cols-1 md:grid-cols-2 text-sm">
                    <div class="text-gray-600">
                        {{ item.name }}
                    </div>

                    <div class="flex items-center">
                        {{ item.value }}
                    </div>
                </div>
            </div>
        </template>
    </BreezeActionSection>
</template>

<script>
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import BreezeActionSection from '@/Components/ActionSection.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButtonSecondary,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
            BreezeActionSection,
        },

        props: ['assignment'],

        computed: {
            items() {
                return [
                    {
                        name: this.$t('pages.dashboard.assignments.information.assessment'),
                        value: this.assignment.assessment.name
                    }, {
                        name: this.$t('pages.dashboard.assignments.information.user'),
                        value: this.assignment.user.name + ', ' + this.assignment.user.email
                    }, {
                        name: this.$t('pages.dashboard.assignments.information.employement.department'),
                        value: this.assignment.employement.department.name
                    }, {
                        name: this.$t('pages.dashboard.assignments.information.employement.position'),
                        value: this.assignment.employement.position.name
                    }, {
                        name: this.$t('pages.dashboard.assignments.information.date'),
                        value: new Date(this.assignment.assessment.valid_from).toDateString() + ' - ' +
                               new Date(this.assignment.assessment.valid_to).toDateString()
                    }, {
                        name: this.$t('pages.dashboard.assignments.information.score'),
                        value: this.assignment.score
                    }
                ];
            }
        }
    }
</script>
