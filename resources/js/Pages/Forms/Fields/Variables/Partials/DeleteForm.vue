<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.forms.fields.variables.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.fields.variables.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.forms.fields.variables.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmFormFieldVariableDeletion">
                    {{ $t('pages.forms.fields.variables.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingFormFieldVariableDeletion" @close="confirmingFormFieldVariableDeletion = false">
                <template #title>
                    {{ $t('pages.forms.fields.variables.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.forms.fields.variables.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingFormFieldVariableDeletion = false">
                        {{ $t('pages.forms.fields.variables.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteFormField" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.forms.fields.variables.delete.content.modal.footer.deleteButton') }}
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
        props: ['variable'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingFormFieldVariableDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmFormFieldVariableDeletion() {
                this.confirmingFormFieldVariableDeletion = true
            },

            deleteFormField() {
                this.form.delete(route('form-field-variable.destroy', {'id': this.variable.id}), {
                    errorBag: 'deleteFormField'
                });
            },
        },
    }
</script>
