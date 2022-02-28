<template>
    <BreezeFormSection @submitted="updateParameter">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="translate('form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="translate('form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter_target" :value="translate('form.parameter_target')" />
                <BreezeSelect id="parameter_target" class="mt-1 block w-full" :value="form.parameter_target" @input="form.parameter_target = $event" :options="options.parameter_target" :multiple="false" />
                <BreezeInputError :message="form.errors.parameter_target" class="mt-2" />
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
    import BreezeSelect from '@/Components/Select.vue'

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

        props: ['parameter', 'parameterTargets', 'translate'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.parameter.name,
                    description: this.parameter.description,
                    parameter_target: this.parameter.parameter_target.id
                })
            }
        },

        methods: {
            updateParameter() {
                this.form.put(route( 'parameter.update', {'id': this.parameter.id} ), {
                    errorBag: 'updateParameter',
                    preserveScroll: true
                });
            },
        },

        computed: {
            options() {
                let parameterTargets = this.parameterTargets;
                let forms = this.parameter.forms;

                return {
                    'parameter_target': parameterTargets ? parameterTargets.map(function(parameterTarget) {
                        return {
                            value: parameterTarget.id,
                            name: parameterTarget.name,
                            description: parameterTarget.description
                        };
                    }) : null,
                }
            },
        },
    }
</script>
