<template>
    <BreezeFormSection @submitted="createRatingParameter">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter_target" :value="translate('form.parameter_target')" />
                <BreezeSelect id="parameter_target" class="mt-1 block w-full" :value="_form.parameter_target" @input="selectParameterTarget" :options="options.parameter_target" :multiple="false" />
                <BreezeInputError :message="_form.errors.parameter_target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="translate('form.parameter')" />
                <BreezeSelect id="parameter" class="mt-1 block w-full" :value="_form.parameter" @input="selectParameter" :options="options.parameter" :multiple="false" />
                <BreezeInputError :message="_form.errors.parameter" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="form" :value="translate('form.form')" />
                <BreezeSelect id="form" class="mt-1 block w-full" :value="_form.form" @input="_form.form = $event" :options="options.form" :multiple="false" />
                <BreezeInputError :message="_form.errors.form" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
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
    import BreezeSelect from '@/Components/Select.vue'
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
            BreezeSelect,
        },

        props: ['rating', 'parameterTargets', 'translate'],

        data() {
            return {
                _form: this.$inertia.form({
                    parameter_target: '',
                    parameter: '',
                    form: '',
                }),

                parameterTarget: '',
                parameters: '',
                forms: ''
            }
        },

        methods: {
            createRatingParameter() {
                this._form.post(route('rating.parameter.store', {'rating': this.rating.id}), {
                    errorBag: 'createRatingParameter',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },
            selectParameterTarget(event) {
                this._form.parameter_target = event;

                for (const parameterTarget of this.parameterTargets) {
                    if (parameterTarget.id == this._form.parameter_target) {
                        this.parameterTarget = parameterTarget;
                        this.parameters = parameterTarget.parameters;
                        break;
                    }
                }
            },
            selectParameter(event) {
                this._form.parameter = event;

                for (const parameter of this.parameters) {
                    if (parameter.id == this._form.parameter) {
                        this.parameter = parameter;
                        this.forms = parameter.forms;
                        break;
                    }
                }
            }
        },

        computed: {
            options() {
                return {
                    'parameter_target': this.parameterTargets ? this.parameterTargets.map(function(parameterTarget) {
                        return {
                            'value': parameterTarget.id,
                            'name': parameterTarget.name,
                            'description': parameterTarget.description
                        };
                    }) : null,
                    'parameter': this.parameters ? this.parameters.map(function(parameter) {
                        return {
                            'value': parameter.id,
                            'name': parameter.name,
                            'description': parameter.description
                        };
                    }) : null,
                    'form': this.forms ? this.forms.map(function(form) {
                        return {
                            'value': form.id,
                            'name': form.name,
                            'description': form.description
                        };
                    }) : null
                }
            },
        }
    }
</script>
