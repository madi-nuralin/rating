<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.rating.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.rating.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.rating.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmAssessmentDeletion">
                    {{ $t('pages.management.rating.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingAssessmentDeletion" @close="confirmingAssessmentDeletion = false">
                <template #title>
                    {{ $t('pages.management.rating.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.rating.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingAssessmentDeletion = false">
                        {{ $t('pages.management.rating.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteAssessment" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.rating.delete.content.modal.footer.deleteButton') }}
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
        props: ['assessment'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingAssessmentDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmAssessmentDeletion() {
                this.confirmingAssessmentDeletion = true
            },

            deleteAssessment() {
                this.form.delete(route('assessment.destroy', {'id': this.assessment.id}), {
                    errorBag: 'deleteAssessment'
                });
            },
        },
    }
</script>
