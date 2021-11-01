<template>
    <BreezeFormSection @submitted="createActivity">
        <template #title>
            {{ $t('pages.dashboard.activities.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.activities.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="$t('pages.dashboard.activities.create.form.parameter')" />
                <BreezeSelect id="parameter" class="mt-1 block w-full" :value="form.parameter" @input="selectParameter" :options="options.parameters" :multiple="false" />
                <BreezeInputError :message="form.errors.parameter" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-for="(field, i) in parameter.form.fields" v-if="parameter">
                <BreezeLabel :for="field.id" :value="field.name" />

                <BreezeInput v-if="field.type == 'text'"
                            :id="field.id"
                            type="text"
                            class="mt-1 block w-full" />
                <BreezeSelect v-if="field.type == 'select'"
                            class="mt-1 block w-full"
                            :id="field.id"
                            :value="form[field.id]"
                            @input="form[field.id] = $event"
                            :options="options[field.id]"
                            :multiple="false" />
                <BreezeSelect v-if="field.type == 'multiselect'"
                            class="mt-1 block w-full"
                            :id="field.id"
                            :value="form[field.id]"
                            @input="form[field.id] = $event"
                            :options="options[field.id]"
                            :multiple="true" />
                <BreezeInputFile v-if="field.type == 'file'"
                            class="mt-1 block w-full"
                            :id="field.id" />

                <BreezeInputError :message="form.errors[field.id]" class="mt-2" />
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
    import BreezeInputFile from '@/Components/FileInput.vue'
    import BreezeSelect from '@/Components/Select.vue'
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
            BreezeInputFile,
            BreezeSelect,
            BreezeTextarea,
            BreezeLabel,
        },

        props: ['assignment'],

        data() {
            return {
                form: this.$inertia.form({
                    parameter: null,
                }),
                parameter: null,
            }
        },

        methods: {
            createActivity() {
                this.form.post(route('activity.store', {'assignment': this.assignment.id}), {
                    errorBag: 'createActivity',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['activities'] })
                });
            },

            selectParameter(event) {
                this.form.parameter = event;

                let parameters = this.assignment.assessment.parameters;

                for (var i = 0; i < parameters.length; ++i) {
                    if (this.form.parameter == parameters[i].id) {
                        this.parameter = parameters[i];
                        
                        let form_fields = this.parameter.form.fields;
                        
                        for (var j = 0; j < form_fields.length; ++j) {
                            
                            if (! Array('select', 'multiselect').includes(form_fields[i].type) )
                                continue;

                            this.form[form_fields[j]] = '';
                        }

                        break;
                    }
                }
            }
        },

        computed: {
            options() {
                let ret_val = {};

                if (this.parameter) {

                    let form_fields = this.parameter.form.fields;

                    for (var i = 0; i < form_fields.length; ++i) {

                        if (! Array('select', 'multiselect').includes(form_fields[i].type) )
                            continue;

                        ret_val[form_fields[i].id] = form_fields[i].options.map(function(option) {
                            return {
                                value: option.id,
                                name: option.name,
                                description: option.description,
                            };
                        });
                    }
                }

                ret_val['parameters'] = this.assignment.assessment.parameters.map(function(parameter) {
                    return { value: parameter.id, name: parameter.name, description: parameter.description };
                });

                return ret_val;
            }
        }
    }
</script>
