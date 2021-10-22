<template>
    <Card>
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #content>
            <div class="grid grid-cols-3 gap-2 text-sm">
                <div class="col-span-3">
                    <div v-for="(supervisor, i) in supervisors" class="w-full mt-1 flex">
                        <div class="flex items-center pr-4">
                            <img class="rounded-full w-7 h-7" :src="supervisor.profile_photo_path" />
                        </div>
                        <div class="flex flex-col">
                            <div class="text-sm text-gray-600 overflow-ellipsis overflow-hidden">{{ supervisor.name }}</div>
                            <div class="text-xs text-gray-600 overflow-ellipsis overflow-hidden">{{ supervisor.email }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </Card>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import Card from '@/Pages/Dashboard/Assignments/Partials/Card.vue'
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
            Card,
            Link
        },

        props: ['supervisors'],

        methods: {
            t(p) {
                return this.$t('pages.dashboard.assignments.card2.' + p);
            }
        }
    }
</script>