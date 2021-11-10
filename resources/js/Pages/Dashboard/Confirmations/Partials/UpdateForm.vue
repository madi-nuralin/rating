<template>
    <BreezeFormSection @submitted="updateConfirmation">
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #form>
            <div class="col-span-6 md:col-span-4">
                {{ t('description') }}
            </div>
        </template>

        <template #actions>
            <div class="col-span-6 md:col-span-4">
                <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                    Saved.
                </BreezeActionMessage>

                <BreezeButtonSecondary class="mr-2 md:w-auto" v-if="status == 1">
                    Отказано
                </BreezeButtonSecondary>

                <BreezeButtonSecondary class="mr-2 md:w-auto" v-if="status == 2">
                    Подтверждено
                </BreezeButtonSecondary>

                <BreezeButtonSecondary class="md:w-auto mt-1 md:mt-0" v-if="status == 1 || status == 2" @click="status = 0">
                    Изменить решение
                </BreezeButtonSecondary>

                <template v-if="status == 0">
                    <BreezeButtonDanger class="mr-2 md:w-auto" @click="form.status = 1" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Отказать
                    </BreezeButtonDanger>

                    <BreezeButtonSecondary class="md:w-auto mt-1 md:mt-0" type="submit" @click="form.status = 2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Подтвердить
                    </BreezeButtonSecondary>
                </template>
            </div>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
    import BreezeButton from '@/Components/Button.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeActionMessage,
            BreezeFormSection,
            BreezeButtonSecondary,
            BreezeButtonDanger,
            BreezeButton,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
        },

        props: ['confirmation'],

        data() {
            return {
                form: this.$inertia.form({
                    status: this.confirmation.status
                }),
                status: this.confirmation.status
            };
        },

        methods: {
            updateConfirmation() {
                this.status = this.form.status;

                this.form.put(route('confirmation.update', {'id': this.confirmation.id} ), {
                    errorBag: 'updateConfirmation',
                    preserveScroll: true
                });
            },

            t(p) {
                return this.$t('pages.dashboard.confirmations.update.' + p);
            }
        }
    }
</script>
