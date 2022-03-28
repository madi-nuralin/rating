<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.position.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.position.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.position.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmPositionDeletion">
                    {{ $t('pages.management.position.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingPositionDeletion" @close="confirmingPositionDeletion = false">
                <template #title>
                    {{ $t('pages.management.position.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.position.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingPositionDeletion = false">
                        {{ $t('pages.management.position.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deletePosition" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.position.delete.content.modal.footer.deleteButton') }}
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
        props: ['position'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingPositionDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmPositionDeletion() {
                this.confirmingPositionDeletion = true
            },

            deletePosition() {
                this.form.delete(route('position.destroy', {'id': this.position.id}), {
                    errorBag: 'deletePosition'
                });
            },
        },
    }
</script>
