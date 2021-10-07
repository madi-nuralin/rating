<template>
    <breeze-action-section>
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ t('content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmRuleDeletion">
                    {{ t('content.deleteButton') }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingRuleDeletion" @close="confirmingRuleDeletion = false">
                <template #title>
                    {{ t('content.modal.title') }}
                </template>

                <template #content>
                    {{ t('content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingRuleDeletion = false">
                        {{ t('content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteRule" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ t('content.modal.footer.deleteButton') }}
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
        props: ['rule', 'parameter'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingRuleDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmRuleDeletion() {
                this.confirmingRuleDeletion = true
            },

            deleteRule() {
                this.form.delete(route('rule.destroy', {'id': this.rule.id}), {
                    errorBag: 'deleteRule'
                });
            },
            t(path) {
                return this.$t('pages.management.parameters.rules.delete.' + path);
            }
        },
    }
</script>
