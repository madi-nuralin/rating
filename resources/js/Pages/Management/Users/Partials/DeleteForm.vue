<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.users.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.users.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.users.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmUserDeletion">
                    {{ $t('pages.management.users.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingUserDeletion" @close="confirmingUserDeletion = false">
                <template #title>
                    {{ $t('pages.management.users.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.users.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-input-error :message="form.errors.user" class="mt-2" />
                    
                    <breeze-button-secondary @click="confirmingUserDeletion = false">
                        {{ $t('pages.management.users.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.users.delete.content.modal.footer.deleteButton') }}
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
        props: ['user'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingUserDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true
            },

            deleteUser() {
                this.form.delete(route('user.destroy', {'id': this.user.id}), {
                    errorBag: 'deleteUser'
                });
            },
        },
    }
</script>
