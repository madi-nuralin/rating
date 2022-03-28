<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.role.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.role.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.role.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmRoleDeletion">
                    {{ $t('pages.management.role.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingRoleDeletion" @close="confirmingRoleDeletion = false">
                <template #title>
                    {{ $t('pages.management.role.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.role.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingRoleDeletion = false">
                        {{ $t('pages.management.role.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteRole" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.role.delete.content.modal.footer.deleteButton') }}
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
        props: ['role'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingRoleDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmRoleDeletion() {
                this.confirmingRoleDeletion = true
            },

            deleteRole() {
                this.form.delete(route('role.destroy', {'id': this.role.id}), {
                    errorBag: 'deleteRole'
                });
            },
        },
    }
</script>
