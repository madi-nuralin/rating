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
                <BreezeLabel for="target" :value="translate('form.target')" />
                <BreezeSelect id="target" class="mt-1 block w-full" :value="form.target" @input="form.target = $event" :options="options.target" :multiple="false" />
                <BreezeInputError :message="form.errors.target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="active_form" :value="translate('form.active_form')" />
                <BreezeSelect id="active_form" class="mt-1 block w-full" :value="form.active_form" @input="form.active_form = $event" :options="options.active_form" :multiple="false" />
                <BreezeInputError :message="form.errors.active_form" class="mt-2" />
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
                    target: this.parameter.target.id,
                    active_form: this.parameter.active_form.id
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
                    'target': parameterTargets ? parameterTargets.map(function(parameterTarget) {
                        return {
                            value: parameterTarget.id,
                            name: parameterTarget.name,
                            description: parameterTarget.description
                        };
                    }) : null,

                    'active_form': forms.data ? forms.data.map(function(form) {
                        return {
                            value: form.id,
                            name: form.name,
                            description: form.description
                        };
                    }) : null
                }
            },
        },
    }
</script>
