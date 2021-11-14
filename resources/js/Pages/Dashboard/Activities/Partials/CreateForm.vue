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

            <template v-for="(field, i) in parameter.form.fields" v-if="parameter">
                <template v-for="(variable, j) in field.variables" v-if="field.type == 'formula'">
                    <div class="col-span-6 sm:col-span-4">
                        <BreezeLabel :for="j == 0 ? i : ++i"
                                    :value="variable.description" />

                        <BreezeInput :id="i"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.attributes[getIndex(i)]['value']" />

                        <BreezeInputError :message="form.errors[getIndex(i)]"
                                    class="mt-2" />
                    </div>
                </template>

                <template v-else>
                    <div class="col-span-6 sm:col-span-4">
                        <BreezeLabel :for="i" :value="field.name" />

                        <BreezeInput v-if="field.type == 'text'"
                                    :id="i"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.attributes[getIndex(i)]['value']" />

                        <BreezeSelect v-else-if="field.type == 'select'"
                                    class="mt-1 block w-full"
                                    :id="i"
                                    :value="form.attributes[getIndex(i)]['value']"
                                    @input="form.attributes[getIndex(i)]['value'] = $event"
                                    :options="options[field.id]"
                                    :multiple="false" />

                        <BreezeSelect v-else-if="field.type == 'multiselect'"
                                    class="mt-1 block w-full"
                                    :id="i"
                                    :value="form.attributes[getIndex(i)]['value']"
                                    @input="form.attributes[getIndex(i)]['value'] = $event"
                                    :options="options[field.id]"
                                    :multiple="true" />

                        <BreezeInputFile v-else-if="field.type == 'file'"
                                    class="mt-1 block w-full"
                                    :id="i"
                                    :value="form.attributes[getIndex(i)]['value']"
                                    @input="form.attributes[getIndex(i)]['value'] = $event"
                                    :route="''" />

                        <BreezeInputError :message="form.errors[getIndex(i)]" class="mt-2" />
                    </div>
                </template>
            </template>
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
    import BreezeInputFile from '@/Components/InputFile.vue'
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
                    attributes: {},
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

            getIndex(key) {
                return `attribute${key}`;
            },

            selectParameter(event) {
                this.form.parameter = event;

                for (const parameter of this.assignment.assessment.parameters)  {

                    if (this.form.parameter == parameter.id) {
                        this.parameter = parameter;
                        this.form.score = parameter.score;

                        this.form.attributes = {};
                        this.form.errors = {};

                        var i = 0, getIndex = this.getIndex;
                        
                        for (const field of parameter.form.fields)  {
                            
                            if (field.type == 'formula') {
                                for (const variable of field.variables) {
                                    this.form.attributes[getIndex(i)] = {};
                                    this.form.attributes[getIndex(i)]['id'] = variable.id;
                                    this.form.attributes[getIndex(i)]['type'] = 'variable';
                                    this.form.attributes[getIndex(i)]['value'] = null;
                                    this.form.errors[getIndex(i)] = null;
                                    ++i;
                                }
                            } else {
                                this.form.attributes[getIndex(i)] = {};
                                this.form.attributes[getIndex(i)]['id'] = field.id;
                                this.form.attributes[getIndex(i)]['type'] = 'field';
                                this.form.attributes[getIndex(i)]['value'] = null;
                                this.form.errors[getIndex(i)] = null;
                                ++i;
                            }
                        }

                        break;
                    }
                }
            },
        },

        computed: {
            options() {
                let obj = {};

                if (this.parameter) {

                    for (const field of this.parameter.form.fields) {

                        if (! Array('select', 'multiselect').includes(field.type) )
                            continue;

                        obj[field.id] = field.options.map(function(option) {
                            return {
                                value: option.id,
                                name: option.name,
                                description: option.description,
                            };
                        });
                    }
                }

                obj['parameters'] = this.assignment.assessment.parameters.map(function(parameter) {
                    return { value: parameter.id, name: parameter.name, description: parameter.description };
                });

                return obj;
            }
        }
    }
</script>
