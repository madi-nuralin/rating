<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.forms.formFieldOption.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.formFieldOption.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.forms.formFieldOption.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmFormFieldOptionDeletion">
                    {{ $t('pages.forms.formFieldOption.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingFormFieldOptionDeletion" @close="confirmingFormFieldOptionDeletion = false">
                <template #title>
                    {{ $t('pages.forms.formFieldOption.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.forms.formFieldOption.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingFormFieldOptionDeletion = false">
                        {{ $t('pages.forms.formFieldOption.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteFormField" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.forms.formFieldOption.delete.content.modal.footer.deleteButton') }}
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
        props: ['option'],

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
