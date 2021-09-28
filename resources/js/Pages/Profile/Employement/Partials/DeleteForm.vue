<template>
    <breeze-action-section>
        <template #title>
            Delete employement information
        </template>

        <template #description>
            Permanently delete this employement information.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Once a employement information is deleted, all of its resources and data will be permanently deleted. Before deleting this employement information, please download any data or information regarding this employement information that you wish to retain.
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmEmployementDeletion">
                    Delete Employement Information
                </breeze-button-danger>
            </div>

            <!-- Delete Employement Information Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingEmployementDeletion" @close="confirmingEmployementDeletion = false">
                <template #title>
                    Delete Employement Information
                </template>

                <template #content>
                    Are you sure you want to delete this employement information? Once a employement information is deleted, all of its resources and data will be permanently deleted.
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingEmployementDeletion = false">
                        Cancel
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteEmployement" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Delete Employement Information
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
