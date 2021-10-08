<template>
    <BreezeFormSection @submitted="updateRule">
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #form>

            <template v-if="Array('metadata', 'submission', 'formula').includes(rule.type)">
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
                    <BreezeLabel for="input_id" :value="t('form.input_id')" />
                    <BreezeInput id="input_id" type="text" class="mt-1 block w-full" v-model="form.input_id" autofocus />
                    <BreezeInputError :message="form.errors.input_id" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="input_label" :value="t('form.input_label')" />
                    <BreezeInput id="input_label" type="text" class="mt-1 block w-full" v-model="form.input_label" autofocus />
                    <BreezeInputError :message="form.errors.input_label" class="mt-2" />
                </div>
            </template>

            <div class="col-span-6 sm:col-span-4" v-if="Array('metadata', 'submission').includes(rule.type)">
                <BreezeLabel for="input_type" :value="t('form.input_type')" />
                <BreezeSelect id="input_type" class="mt-1 block w-full" :value="form.input_type" @input="form.input_type = $event" :options="options.input_type" :multiple="false"/>
                <BreezeInputError :message="form.errors.input_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="Array('text', 'select', 'file', 'link').includes(form.input_type)">
                <BreezeLabel for="input_validation" :value="t('form.input_validation')" />
                <BreezeInput id="input_validation" type="text" class="mt-1 block w-full" v-model="form.input_validation" />
                <BreezeInputError :message="form.errors.input_validation" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="Array('formula').includes(rule.type)">
                <BreezeLabel for="input_expression_type" :value="t('form.input_expression_type')" />
                <BreezeSelect id="input_expression_type" class="mt-1 block w-full" :value="form.input_expression_type" @input="form.input_expression_type = $event" :options="options.input_expression_type" :multiple="false"/>
                <BreezeInputError :message="form.errors.input_expression_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="Array('formula').includes(rule.type) && Array('php').includes(form.input_expression_type)">
                <BreezeLabel for="input_expression" :value="t('form.input_expression')" />
                <BreezeInput id="input_expression" type="text" class="mt-1 block w-full" v-model="form.input_expression" autofocus />
                <BreezeInputError :message="form.errors.input_expression" class="mt-2" />
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
                    input_id: this.rule.input_id,
                    input_type: this.rule.input_type,
                    input_label: this.rule.input_label,
                    input_validation: this.rule.input_validation,
                    input_expression: this.rule.input_expression,
                    input_expression_type: this.rule.input_expression_type,
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

                let input_expression_type = [{
                    value: 'php',
                    name: this.t('input_expression_type.php.name'),
                    description: this.t('input_expression_type.php.description')
                }];

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
                    'input_type': input_type, 'input_expression_type': input_expression_type
                }
            }
        }
    }
</script>
