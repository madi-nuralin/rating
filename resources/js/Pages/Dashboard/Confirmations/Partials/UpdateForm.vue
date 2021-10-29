<template>
    <div class="mt-4 md:mt-0 mb-0 md:mb-4 md:col-span-2">
        <form @submit.prevent="updateConfirmation">
            <div class="grid grid-cols-2 px-4 py-3 bg-white sm:px-6 shadow sm:rounded-md">
                <div class="col-span-2 md:col-span-1 flex flex-col">
                    <h3 class="text-base font-medium text-gray-900">
                        {{ t('title') }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        {{ t('description') }}
                    </p>
                </div>
                <div class="col-span-2 md:col-span-1 md:flex items-center justify-end">
                    <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </BreezeActionMessage>

                    <BreezeButtonSecondary class="mr-2 w-full md:w-auto" v-if="status == 1">
                        Отказано
                    </BreezeButtonSecondary>

                    <BreezeButtonSecondary class="mr-2 w-full md:w-auto" v-if="status == 2">
                        Подтверждено
                    </BreezeButtonSecondary>

                    <BreezeButtonSecondary class="w-full md:w-auto mt-1 md:mt-0" v-if="status == 1 || status == 2" @click="status = 0">
                        Изменить решение
                    </BreezeButtonSecondary>

                    <template v-if="status == 0">
                        <BreezeButtonDanger class="mr-2 w-full md:w-auto" @click="form.status = 1" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Отказать
                        </BreezeButtonDanger>

                        <BreezeButtonSecondary class="w-full md:w-auto mt-1 md:mt-0" type="submit" @click="form.status = 2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Подтвердить
                        </BreezeButtonSecondary>
                    </template>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
    import BreezeButton from '@/Components/Button.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import BreezeFormCard from '@/Components/FormCard.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButtonSecondary,
            BreezeButtonDanger,
            BreezeButton,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
            BreezeFormCard,
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
