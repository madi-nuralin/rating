<template>
    <BreezeFormSection @submitted="updateRatingParameter">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter_target" :value="translate('form.parameter_target')" />
                <BreezeInput id="parameter_target" type="text" class="mt-1 block w-full" v-model="parameter.parameter_target.name" :disabled="true" />
                <BreezeInputError :message="_form.errors.parameter_target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="translate('form.parameter')" />
                <BreezeInput id="parameter" type="text" class="mt-1 block w-full" v-model="parameter.name" :disabled="true" />
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
                Update
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

        props: ['rating', 'parameter', 'parameterTargets', 'translate'],

        data() {
            return {
                _form: this.$inertia.form({
                    form: this.parameter.form.id,
                }),

                parameterTarget: this.initParameterTarget(),
                parameters: this.initParameters(),
                forms: this.initForms()
            }
        },

        methods: {
            updateRatingParameter() {
                this._form.put(route('rating.parameter.update', {'rating': this.rating.id, 'parameter': this.parameter.id}), {
                    errorBag: 'updateRatingParameter',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },

            // Initialization methods
            initParameterTarget() {
                for (const parameterTarget of this.parameterTargets) {
                    if (parameterTarget.id == this.parameter.parameter_target.id) {
                        return parameterTarget;
                    }
                }
                return '';
            },
            initParameters() {
                for (const parameterTarget of this.parameterTargets) {
                    if (parameterTarget.id == this.parameter.parameter_target.id) {
                        return parameterTarget.parameters;
                    }
                }
                return '';
            },
            initForms() {
                for (const parameterTarget of this.parameterTargets) {
                    if (parameterTarget.id == this.parameter.parameter_target.id) {
                        for (const parameter of parameterTarget.parameters) {
                            if (parameter.id == this.parameter.id) {
                                return parameter.forms;
                            }
                        }
                    }
                }
                return '';
            },
        },

        computed: {
            options() {
                return {
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
