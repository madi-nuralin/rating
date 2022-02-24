<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.rating.parameter.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.rating.parameter.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.rating.parameter.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmRatingParameterDeletion">
                    {{ $t('pages.management.rating.parameter.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingRatingParameterDeletion" @close="confirmingRatingParameterDeletion = false">
                <template #title>
                    {{ $t('pages.management.rating.parameter.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.rating.parameter.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingRatingParameterDeletion = false">
                        {{ $t('pages.management.rating.parameter.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteRatingParameter" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.rating.parameter.delete.content.modal.footer.deleteButton') }}
                    </breeze-button-danger>
                </template>
            </breeze-modal-confirmation>
        </template>
    </breeze-action-section>
</template>

<script>
    import BreezeActionSection from '@/Components/ActionSection.vue'
    import BreezeModalConfirmation from '@/Components/ModalConfirmation.vue'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'

    export default {
        props: ['rating', 'parameter'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingRatingParameterDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmRatingParameterDeletion() {
                this.confirmingRatingParameterDeletion = true
            },

            deleteRatingParameter() {
                this.form.delete(route('rating.parameter.destroy', {'rating': this.rating.id, 'parameter': this.parameter.id}), {
                    errorBag: 'deleteRatingParameter'
                });
            },
        },
    }
</script>
