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
                <breeze-button-danger @click="confirmFormDeletion">
                    {{ translate('content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingFormDeletion" @close="confirmingFormDeletion = false">
                <template #title>
                    {{ translate('content.modal.title') }}
                </template>

                <template #content>
                    {{ translate('content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingFormDeletion = false">
                        {{ translate('content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteForm" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
        props: ['form', 'translate'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingFormDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmFormDeletion() {
                this.confirmingFormDeletion = true
            },

            deleteForm() {
                this.form.delete(route('form.destroy', {'id': this.form.id}), {
                    errorBag: 'deleteForm'
                });
            },
        },
    }
</script>
