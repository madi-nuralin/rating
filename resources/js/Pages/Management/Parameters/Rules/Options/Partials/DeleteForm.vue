<template>
    <breeze-action-section>
        <template #title>
            {{ tc('title', ruleTypeId) }}
        </template>

        <template #description>
            {{ tc('description', ruleTypeId) }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ tc('content.deleteInfo', ruleTypeId) }}
            </div>

            <div class="mt-5">
                <breeze-button-danger @click="confirmOptionDeletion">
                    {{ tc('content.deleteButton', ruleTypeId) }}
                </breeze-button-danger>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingOptionDeletion" @close="confirmingOptionDeletion = false">
                <template #title>
                    {{ tc('content.modal.title', ruleTypeId) }}
                </template>

                <template #content>
                    {{ tc('content.modal.content', ruleTypeId) }}
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingOptionDeletion = false">
                        {{ tc('content.modal.footer.cancelButton', ruleTypeId) }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="deleteOption" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ tc('content.modal.footer.deleteButton', ruleTypeId) }}
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
        props: ['rule', 'option'],

        components: {
            BreezeActionSection,
            BreezeModalConfirmation,
            BreezeButtonDanger,
            BreezeButtonSecondary,
        },

        data() {
            return {
                confirmingOptionDeletion: false,
                deleting: false,

                form: this.$inertia.form()
            }
        },

        methods: {
            confirmOptionDeletion() {
                this.confirmingOptionDeletion = true
            },

            deleteOption() {
                this.form.delete(route('option.destroy', {'id': this.rule.id}), {
                    errorBag: 'deleteOption'
                });
            },
            t(p) {
                return this.$t('pages.management.parameters.rules.options.delete.' + p);
            },
            tc(p, i) {
                return this.$t('pages.management.parameters.rules.options.delete.' + p, i);
            }
        },

        computed: {
            ruleTypeId() {
                switch (this.rule.type) {
                    case 'metadata':
                        return 1;
                    case 'formula':
                        return 2;
                }
            }
        }
    }
</script>
