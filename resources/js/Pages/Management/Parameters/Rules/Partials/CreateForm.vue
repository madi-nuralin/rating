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
                <BreezeSelect id="type" class="mt-1 block w-full" :value="form.type" @input="form.type = $event" :options="options.type" :multiple="false"/>
                <BreezeInputError :message="form.errors.type" class="mt-2" />
            </div>

            <template v-if="form.type == 'metadata'">
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

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="validation_rules" :value="t('form.validation_rules')" />
                    <BreezeInput id="validation_rules" type="text" class="mt-1 block w-full" v-model="form.validation_rules" />
                    <BreezeInputError :message="form.errors.validation_rules" class="mt-2" />
                </div>
            </template>

            <template v-if="form.type == 'formula'">
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

            <template v-if="form.type == 'submission'">
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
                    input_type: '',
                    validation_rules: '',
                    math_expression: '',
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

            t(path) {
                return this.$t('pages.management.parameters.rules.create.' + path);
            }
        },

        computed: {
            options() {
                let type = [];
                let input_type = [];
                let input_type_array = 
                        this.form.type == 'metadata' ? Array('text', 'select') :
                        this.form.type == 'submission' ? Array('link', 'file') : null;

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
                    type: type, input_type: input_type
                }
            }
        }
    }
</script>
