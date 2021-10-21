<template>
    <BreezeFormSection @submitted="createOption">
        <template #title>
            {{ tc('title', ruleTypeId) }}
        </template>

        <template #description>
            {{ tc('description', ruleTypeId) }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="t('form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="t('form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
            </BreezeButton>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButton,
            BreezeActionMessage,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
        },

        props: ['rule'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                })
            }
        },

        methods: {
            createOption() {
                this.form.post(route('option.store', {'rule': this.rule.id}), {
                    errorBag: 'createOption',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['options'] })
                });
            },

            t(p) {
                return this.$t('pages.management.parameters.rules.options.create.' + p);
            },

            tc(p, i) {
                return this.$tc('pages.management.parameters.rules.options.create.' + p, i);
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
