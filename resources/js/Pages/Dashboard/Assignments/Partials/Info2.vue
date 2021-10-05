<template>
    <div class="mt-4 px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg">
        <div class="grid grid-cols-3 gap-2 text-sm">
            <div class="col-span-1 overflow-ellipsis overflow-hidden">
                {{ $t('pages.dashboard.assignments.list.supervisors') }}
            </div>
            <div class="col-span-2">
                <div v-for="(supervisor, i) in supervisors" class="w-full mt-1 grid grid-cols-6">
                    <div class="col-span-1 flex items-center">
                        <img class="rounded-full w-6 h-6" :src="supervisor.profile_photo_path" />
                    </div>
                    <div class="col-span-5 flex flex-col">
                        <div class="text-sm text-gray-600 overflow-ellipsis overflow-hidden">{{ supervisor.name }}</div>
                        <div class="text-xs text-gray-600 overflow-ellipsis overflow-hidden">{{ supervisor.email }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import { Inertia } from '@inertiajs/inertia'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeButtonSecondary,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
            Link
        },

        props: ['supervisors'],
    }
</script>