<template>
    <BreezeFormCard>
        <template #title>
            {{ $t('pages.dashboard.assignments.informationCard02.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.assignments.informationCard02.description') }}
        </template>

        <template #form>
            <div class="col-span-6 w-full px-1 py-2 grid grid-cols-3 text-gray-600 text-xs hover:bg-gray-100 rounded-md"
                    v-for="(confirmation, i) in confirmations">

                <div class="col-span-2 flex">
                    <div class="flex-shrink">
                        <img class="rounded-full w-8 h-8" :src="confirmation.confirmer.user.profile_photo_path" />
                    </div>
                    <div class="overflow-ellipsis overflow-hidden pl-2">
                        <div>{{ confirmation.confirmer.user.name }}</div>
                        <div>{{ confirmation.confirmer.user.email }}</div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div v-if="confirmation.status == 0">
                        Не просмотрено
                    </div>

                    <div v-if="confirmation.status == 1">
                        Отказано
                    </div>

                    <div v-if="confirmation.status == 2">
                        Подтверждено
                    </div>
                </div>

            </div>
        </template>
    </BreezeFormCard>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import BreezeFormCard from '@/Components/FormCard.vue'
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
            BreezeFormCard,
            Link
        },

        props: ['confirmations']
    }
</script>