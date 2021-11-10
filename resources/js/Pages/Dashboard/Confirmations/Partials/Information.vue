<template>
    <BreezeActionSection>
        <template #title>
            {{ $t('pages.dashboard.confirmations.information.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.confirmations.information.description') }}
        </template>

        <template #content>
            <div :class="{'mt-2': i > 0}" v-for="(confirmation, i) in confirmations">
                <div class="grid grid-cols-1 md:grid-cols-2 text-sm">
                    <div class="flex flex-col md:flex-row md:items-center text-gray-600">
                        <div class="flex-shrink">
                            <img class="rounded-full w-8 h-8" :src="confirmation.confirmer.user.profile_photo_path" />
                        </div>
                        <div class="overflow-ellipsis overflow-hidden md:pl-4">
                            <div>{{ confirmation.confirmer.user.name }}</div>
                            <div>{{ confirmation.confirmer.user.email }}</div>
                        </div>
                    </div>  

                    <div>
                        <div v-if="confirmation.status == 0">
                            {{ $t('pages.dashboard.confirmations.information.status.not_viewed') }}
                        </div>

                        <div v-else-if="confirmation.status == 1">
                            {{ $t('pages.dashboard.confirmations.information.status.denied') }}
                        </div>

                        <div v-else-if="confirmation.status == 2">
                            {{ $t('pages.dashboard.confirmations.information.status.confirmed') }}
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </BreezeActionSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import BreezeActionSection from '@/Components/ActionSection.vue'
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
            BreezeActionSection,
            Link
        },

        props: ['confirmations']
    }
</script>