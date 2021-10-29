<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.dashboard.activities.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.activities.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.dashboard.activities.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmActivityDeletion">
                    {{ $t('pages.dashboard.activities.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingActivityDeletion" @close="confirmingActivityDeletion = false">
                <template #title>
                    {{ $t('pages.dashboard.activities.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.dashboard.activities.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingActivityDeletion = false">
                        {{ $t('pages.dashboard.activities.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteActivity" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.dashboard.activities.delete.content.modal.footer.deleteButton') }}
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
        props: ['activity'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingActivityDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmActivityDeletion() {
                this.confirmingActivityDeletion = true
            },

            deleteActivity() {
                this.form.delete(route('activity.destroy', {'id': this.activity.id}), {
                    errorBag: 'deleteActivity'
                });
            },
        },
    }
</script>
