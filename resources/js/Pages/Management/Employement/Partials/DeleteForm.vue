<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.employement.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.employement.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.employement.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmEmployementDeletion">
                    {{ $t('pages.management.employement.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingEmployementDeletion" @close="confirmingEmployementDeletion = false">
                <template #title>
                    {{ $t('pages.management.employement.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.employement.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingEmployementDeletion = false">
                        {{ $t('pages.management.employement.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteEmployement" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.employement.delete.content.modal.footer.deleteButton') }}
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
        props: ['employement'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingEmployementDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmEmployementDeletion() {
                this.confirmingEmployementDeletion = true
            },

            deleteEmployement() {
                this.form.delete(route('employement.destroy', {'id': this.employement.id}), {
                    errorBag: 'deleteEmployement'
                });
            },
        },
    }
</script>
