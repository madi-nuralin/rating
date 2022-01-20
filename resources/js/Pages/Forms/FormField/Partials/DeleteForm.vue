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
                <breeze-button-danger @click="confirmFormFieldDeletion">
                    {{ translate('content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingFormFieldDeletion" @close="confirmingFormFieldDeletion = false">
                <template #title>
                    {{ translate('content.modal.title') }}
                </template>

                <template #content>
                    {{ translate('content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingFormFieldDeletion = false">
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
        props: ['field', 'translate'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingFormFieldDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmFormFieldDeletion() {
                this.confirmingFormFieldDeletion = true
            },

            deleteFormField() {
                this.form.delete(route('form-field.destroy', {'id': this.field.id}), {
                    errorBag: 'deleteFormField'
                });
            },
        },
    }
</script>
