<template>
    <BreezeFormSection @submitted="updateRule">
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #form>

            <template v-if="rule.type == 'metadata'">
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

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="input_type" :value="t('form.input_type')" />
                    <BreezeSelect id="input_type" class="mt-1 block w-full" :value="form.input_type" @input="form.input_type = $event" :options="options.input_type" :multiple="false"/>
                    <BreezeInputError :message="form.errors.input_type" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="validation_rules" :value="t('form.validation_rules')" />
                    <BreezeInput id="validation_rules" type="text" class="mt-1 block w-full" v-model="form.validation_rules" />
                    <BreezeInputError :message="form.errors.validation_rules" class="mt-2" />
                </div>
            </template>

            <template v-if="rule.type == 'formula'">
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

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="math_expression" :value="t('form.math_expression')" />
                    <BreezeInput id="math_expression" type="text" class="mt-1 block w-full" v-model="form.math_expression" autofocus />
                    <BreezeInputError :message="form.errors.math_expression" class="mt-2" />
                </div>
            </template>

            <template v-if="rule.type == 'submission'">
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

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="input_type" :value="t('form.input_type')" />
                    <BreezeSelect id="input_type" class="mt-1 block w-full" :value="form.input_type" @input="form.input_type = $event" :options="options.input_type" :multiple="false"/>
                    <BreezeInputError :message="form.errors.input_type" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4" v-if="form.input_type == 'file'">
                    <BreezeLabel for="validation_rules" :value="t('form.validation_rules')" />
                    <BreezeInput id="validation_rules" type="text" class="mt-1 block w-full" v-model="form.validation_rules" />
                    <BreezeInputError :message="form.errors.validation_rules" class="mt-2" />
                </div>
            </template>

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
    import BreezeSelect from '@/Components/Select'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
        },

        props: ['rule'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.rule.name,
                    description: this.rule.description,
                    input_type: this.rule.input_type,
                    validation_rules: this.rule.validation_rules,
                    math_expression: this.rule.math_expression
                })
            }
        },

        methods: {
            updateRule() {
                this.form.put(route( 'rule.update', {'id': this.rule.id} ), {
                    errorBag: 'updateRule',
                    preserveScroll: true
                });
            },

            t(path) {
                return this.$t('pages.management.parameters.rules.update.' + path);
            }
        },

        computed: {
            options() {
                let input_type = [];
                let input_type_array = 
                        this.rule.type == 'metadata' ? Array('text', 'select') :
                        this.rule.type == 'submission' ? Array('link', 'file') : null;

                if (input_type_array) {
                    input_type = input_type_array.map(function(o) {
                        return {
                            value: o,
                            name: this.t('input_type.' + o + '.name'),
                            description: this.t('input_type.' + o + '.description')
                        };
                    }, {t: this.t});
                }

                return {
                    input_type: input_type
                }
            }
        }
    }
</script>
