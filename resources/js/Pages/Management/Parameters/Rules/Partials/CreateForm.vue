<template>
    <BreezeFormSection @submitted="createRule">
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="type" :value="t('form.type')" />
                <BreezeSelect id="type" class="mt-1 block w-full" :value="form.type" @input="setType" :options="options.type" :multiple="false"/>
                <BreezeInputError :message="form.errors.type" class="mt-2" />
            </div>

            <template v-if="Array('metadata', 'submission', 'formula').includes(form.type)">
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

            <div class="col-span-6 sm:col-span-4" v-if="Array('metadata', 'submission').includes(form.type)">
                <BreezeLabel for="input_type" :value="t('form.input_type')" />
                <BreezeSelect id="input_type" class="mt-1 block w-full" :value="form.input_type" @input="form.input_type = $event" :options="options.input_type" :multiple="false"/>
                <BreezeInputError :message="form.errors.input_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="Array('text', 'select', 'file', 'link').includes(form.input_type)">
                <BreezeLabel for="input_validation" :value="t('form.input_validation')" />
                <BreezeInput id="input_validation" type="text" class="mt-1 block w-full" v-model="form.input_validation" />
                <BreezeInputError :message="form.errors.input_validation" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="Array('formula').includes(form.type)">
                <BreezeLabel for="input_expression_type" :value="t('form.input_expression_type')" />
                <BreezeSelect id="input_expression_type" class="mt-1 block w-full" :value="form.input_expression_type" @input="form.input_expression_type = $event" :options="options.input_expression_type" :multiple="false"/>
                <BreezeInputError :message="form.errors.input_expression_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="Array('formula').includes(form.type) && Array('php').includes(form.input_expression_type)">
                <BreezeLabel for="input_expression" :value="t('form.input_expression')" />
                <BreezeInput id="input_expression" type="text" class="mt-1 block w-full" v-model="form.input_expression" autofocus />
                <BreezeInputError :message="form.errors.input_expression" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Created.
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
    import BreezeSelect from '@/Components/Select.vue'
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
            BreezeSelect,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
        },

        props: ['parameter'],
        
        data() {
            return {
                form: this.$inertia.form({
                    type: '',
                    name: '',
                    description: '',
                    input_id: '',
                    input_type: '',
                    input_label: '',
                    input_validation: '',
                    input_expression: '',
                    input_expression_type: '',
                }),
            }
        },

        methods: {
            createRule() {
                this.form.post(route('rule.store', {'parameter': this.parameter.id}), {
                    errorBag: 'createRule',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['parameters'] })
                });
            },

            setAll(obj, val) {
                Object.keys(obj).forEach(function(index) {
                    obj[index] = val
                });
            },

            setType(event) {
                //this.setAll(this.form.errors, '');
                this.form.type = event;
                this.form.name = '';

                let properties = Array(
                    'name',
                    'description',
                    'input_id',
                    'input_type',
                    'input_label',
                    'input_label',
                    'input_validation',
                    'input_expression',
                    'input_expression_type'
                );

                for (var p in properties) {
                    this.form[properties[p]] = '';
                }
            },

            t(p) {
                return this.$t('pages.management.parameters.rules.create.' + p);
            }
        },

        computed: {
            options() {
                let type = [];
                let input_type = [];
                let input_type_array = 
                        this.form.type == 'metadata' ? Array('text', 'select') :
                        this.form.type == 'submission' ? Array('link', 'file') : null;

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

                type = Array('metadata', 'formula', 'submission').map(function(o) {
                    return {
                        value: o,
                        name: this.t('type.' + o + '.name'),
                        description: this.t('type.' + o + '.description')
                    };
                }, {t: this.t});

                return {
                    'type': type, 'input_type': input_type, 'input_expression_type': input_expression_type
                }
            }
        }
    }
</script>
