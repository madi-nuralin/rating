<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.departments.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.departments.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.departments.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmDepartmentDeletion">
                    {{ $t('pages.management.departments.delete.content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingDepartmentDeletion" @close="confirmingDepartmentDeletion = false">
                <template #title>
                    {{ $t('pages.management.departments.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.departments.delete.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingDepartmentDeletion = false">
                        {{ $t('pages.management.departments.delete.content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteDepartment" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.management.departments.delete.content.modal.footer.deleteButton') }}
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
        props: ['department'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingDepartmentDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmDepartmentDeletion() {
                this.confirmingDepartmentDeletion = true
            },

            deleteDepartment() {
                this.form.delete(route('department.destroy', {'id': this.department.id}), {
                    errorBag: 'deleteDepartment'
                });
            },
        },
    }
</script>
