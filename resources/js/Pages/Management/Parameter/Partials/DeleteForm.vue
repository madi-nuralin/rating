<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.parameter.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.parameter.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.parameter.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmParameterDeletion">
                    {{ $t('pages.management.parameter.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingParameterDeletion" @close="confirmingParameterDeletion = false">
                <template #title>
                    {{ $t('pages.management.parameter.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.parameter.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingParameterDeletion = false">
                        {{ $t('pages.management.parameter.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteParameter" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.parameter.delete.content.modal.footer.deleteButton') }}
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
        props: ['parameter'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingParameterDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmParameterDeletion() {
                this.confirmingParameterDeletion = true
            },

            deleteParameter() {
                this.form.delete(route('parameter.destroy', {'id': this.parameter.id}), {
                    errorBag: 'deleteParameter'
                });
            },
        },
    }
</script>
