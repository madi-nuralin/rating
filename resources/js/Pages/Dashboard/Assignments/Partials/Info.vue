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
            <div class="grid grid-cols-6 gap-4">

                <div class="col-span-6 sm:col-span-5 text-sm">
                    <BreezeLabel for="department" :value="$t('pages.dashboard.assignments.list.employement.department')" />
                    <BreezeInput id="department" type="text" class="mt-1 block w-full text-sm" v-model="employement.department.name" :disabled="true" />
                </div>

                <div class="col-span-6 sm:col-span-5 text-sm">
                    <BreezeLabel for="position" :value="$t('pages.dashboard.assignments.list.employement.position')" />
                    <BreezeInput id="position" type="text" class="mt-1 block w-full text-sm" v-model="employement.position.name" :disabled="true" />
                </div>

                <div class="col-span-6 sm:col-span-5 text-sm">
                    <BreezeLabel for="valid_from" :value="$t('pages.dashboard.assignments.list.employement.position')" />
                    <BreezeInput id="valid_from" type="date" class="mt-1 block w-full text-sm" v-model="assessment.valid_from" :disabled="true" />
                </div>

                <div class="col-span-6 sm:col-span-5 text-sm">
                    <BreezeLabel for="valid_to" :value="$t('pages.dashboard.assignments.list.employement.position')" />
                    <BreezeInput id="valid_to" type="date" class="mt-1 block w-full text-sm" v-model="assessment.valid_to" :disabled="true" />
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButton,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
        },

        props: ['assessment', 'employement'],
    }
</script>
