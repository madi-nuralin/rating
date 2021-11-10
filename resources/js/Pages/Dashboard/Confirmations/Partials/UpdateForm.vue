<template>
    <BreezeActionSection @submitted="updateConfirmation">
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ t('content.info')}}
            </div>

            <div class="mt-5 grid grid-cols-1 md:grid-cols-2 text-sm">
                <div class="text-gray-600">
                    {{ t('title') }}
                </div>
                <div class="flex items-center">
                    <div v-if="confirmation.status == 0">
                        {{ t('content.status.not_viewed') }}
                    </div>

                    <div v-else-if="confirmation.status == 1">
                        {{ t('content.status.denied') }}
                    </div>

                    <div v-else-if="confirmation.status == 2">
                        {{ t('content.status.confirmed') }}
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <breeze-button-secondary class="md:w-auto mt-1 md:mt-0" v-if="status == 1 || status == 2" @click="status = 0">
                    {{ t('content.changeDecisionButton') }}
                </breeze-button-secondary>

                <template v-if="status == 0">
                    <BreezeButtonDanger class="mr-2 md:w-auto" @click="status = 1; confirmingDecision=true" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ t('content.denyButton') }}
                    </BreezeButtonDanger>

                    <BreezeButtonSecondary class="md:w-auto mt-1 md:mt-0" type="submit" @click="status = 2; confirmingDecision=true" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ t('content.confirmButton') }}
                    </BreezeButtonSecondary>
                </template>
            </div>

            <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingDecision" @close="confirmingDecision = false">
                <template #title>
                    {{ status == 1 ? t('content.modal.title.deny') : t('content.modal.title.confirm') }}
                </template>

                <template #content>
                    {{ status == 1 ? t('content.modal.content.deny') : t('content.modal.content.confirm') }}
                </template>

                <template #footer>
                    <breeze-input-error :message="form.errors.status" class="mt-2" />
                    
                    <breeze-button-secondary @click="confirmingDecision = false; ">
                        {{ t('content.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="updateConfirmation" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ status == 1 ? t('content.modal.footer.denyButton') : t('content.modal.footer.confirmButton') }}
                    </breeze-button-danger>
                </template>
            </breeze-modal-confirmation>
        </template>
    </BreezeActionSection>
</template>

<script>
    import BreezeModalConfirmation from '@/Components/ModalConfirmation.vue'
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeActionSection from '@/Components/ActionSection.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
    import BreezeButton from '@/Components/Button.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeModalConfirmation,
            BreezeActionMessage,
            BreezeActionSection,
            BreezeButtonSecondary,
            BreezeButtonDanger,
            BreezeButton,
            BreezeInput,
            BreezeInputError,
        },

        props: ['confirmation'],

        data() {
            return {
                form: this.$inertia.form({
                    status: this.confirmation.status
                }),
                status: this.confirmation.status,
                confirmingDecision: false,
            };
        },

        methods: {
            updateConfirmation() {
                this.form.status = this.status;

                this.form.put(route('confirmation.update', {'id': this.confirmation.id} ), {
                    errorBag: 'updateConfirmation',
                    preserveScroll: true
                });

                this.confirmingDecision = false; 
            },

            t(p) {
                return this.$t('pages.dashboard.confirmations.update.' + p);
            }
        }
    }
</script>
