<template>
    <breeze-action-section>
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ translate('content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmFormFieldOptionDeletion">
                    {{ translate('content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingFormFieldOptionDeletion" @close="confirmingFormFieldOptionDeletion = false">
                <template #title>
                    {{ translate('content.modal.title') }}
                </template>

                <template #content>
                    {{ translate('content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingFormFieldOptionDeletion = false">
                        {{ translate('content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteFormField" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ translate('content.modal.footer.deleteButton') }}
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
        props: ['option', 'translate'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingFormFieldOptionDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmFormFieldOptionDeletion() {
                this.confirmingFormFieldOptionDeletion = true
            },

            deleteFormField() {
                this.form.delete(route('form-field-option.destroy', {'id': this.option.id}), {
                    errorBag: 'deleteFormField'
                });
            },
        },
    }
</script>
