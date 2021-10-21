<template>
    <BreezeFormSection @submitted="updateOption">
        <template #title>
            {{ tc('title', ruleTypeId) }}
        </template>

        <template #description>
            {{ tc('description', ruleTypeId) }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="t('form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="t('form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="true">
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </BreezeButton>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeActionMessage from '@/Components/ActionMessage'
    import BreezeButton from '@/Components/Button'
    import BreezeFormSection from '@/Components/FormSection'
    import BreezeInput from '@/Components/Input'
    import BreezeInputError from '@/Components/InputError'
    import BreezeTextarea from '@/Components/Textarea'
    import BreezeLabel from '@/Components/Label'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
        },

        props: ['rule', 'option'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.option.name,
                    description: this.option.description,
                })
            }
        },

        methods: {
            updateOption() {
                this.form.put(route( 'option.update', {'id': this.option.id} ), {
                    errorBag: 'updateOption',
                    preserveScroll: true
                });
            },

            t(p) {
                return this.$t('pages.management.parameters.rules.options.update.' + p);
            },

            tc(p, i) {
                return this.$tc('pages.management.parameters.rules.options.update.' + p, i);
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
