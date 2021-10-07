<template>
    <div class="md:col-span-1 flex justify-between pb-2">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">
                {{ assessment.name }}
            </h3>

            <p class="mt-1 text-sm text-gray-600">
                {{ assessment.description }}
            </p>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-lg">
            <div class="grid grid-cols-3 gap-2 text-sm">
                <div class="col-span-1 overflow-ellipsis overflow-hidden">{{ $t('pages.dashboard.assignments.list.employement.department') }}</div>
                <div class="col-span-2 overflow-ellipsis overflow-hidden">{{ employement.department.name }}</div>
                <div class="col-span-1 overflow-ellipsis overflow-hidden">{{ $t('pages.dashboard.assignments.list.employement.position') }}</div>
                <div class="col-span-2 overflow-ellipsis overflow-hidden">{{ employement.position.name }}</div>
                <div class="col-span-1 overflow-ellipsis overflow-hidden">{{ $t('pages.dashboard.assignments.list.validDate') }}</div>
                <div class="col-span-2 overflow-ellipsis overflow-hidden">{{ assessment.valid_from + ', ' + assessment.valid_to }}</div>
                <div class="col-span-1 overflow-ellipsis overflow-hidden">{{ $t('pages.dashboard.assignments.list.score') }}</div>
                <div class="col-span-2 overflow-ellipsis overflow-hidden">{{ 0.0 }}</div>
            </div>
        </div>
    </div>

</template>

<script>
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButtonSecondary,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
        },

        props: ['assessment', 'employement'],
    }
</script>
