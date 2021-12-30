<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.verifier.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.verifier.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.verifier.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmVerifierDeletion">
                    {{ $t('pages.management.verifier.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingVerifierDeletion" @close="confirmingVerifierDeletion = false">
                <template #title>
                    {{ $t('pages.management.verifier.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.verifier.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingVerifierDeletion = false">
                        {{ $t('pages.management.verifier.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteVerifier" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.verifier.delete.content.modal.footer.deleteButton') }}
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
        props: ['verifier'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingVerifierDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmVerifierDeletion() {
                this.confirmingVerifierDeletion = true
            },

            deleteVerifier() {
                this.form.delete(route('verifier.destroy', {'id': this.verifier.id}), {
                    errorBag: 'deleteVerifier'
                });
            },
        },
    }
</script>
