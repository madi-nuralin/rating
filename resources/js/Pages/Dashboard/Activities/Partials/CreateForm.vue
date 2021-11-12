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
                <template v-if="field.type == 'formula'">
                    <div class="col-span-6 sm:col-span-4" v-for="(variable, j) in field.variables">
                        <BreezeLabel :for="variable.id" :value="variable.description" />

                        <BreezeInput :id="variable.id"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.variables[variable.id]" />

                        <BreezeInputError :message="form.errors['variables' + variable.id]" class="mt-2" />
                    </div>
                </template>

                <div class="col-span-6 sm:col-span-4" v-else>
                    <BreezeLabel :for="field.id" :value="field.name" />

                    <BreezeInput v-if="field.type == 'text'"
                                :id="field.id"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.fields[field.id]" />

                    <BreezeSelect v-if="field.type == 'select'"
                                class="mt-1 block w-full"
                                :id="field.id"
                                :value="form.fields[field.id]"
                                @input="selectField(field, form.fields[field.id], form.fields[field.id] = $event)"
                                :options="options[field.id]"
                                :multiple="false" />

                    <BreezeSelect v-if="field.type == 'multiselect'"
                                class="mt-1 block w-full"
                                :id="field.id"
                                :value="form.fields[field.id]"
                                @input="selectField(field, form.fields[field.id], form.fields[field.id] = $event)"
                                :options="options[field.id]"
                                :multiple="true" />

                    <BreezeInputFile v-if="field.type == 'file'"
                                class="mt-1 block w-full"
                                :id="field.id"
                                :value="form.fields[field.id]"
                                @input="form.fields[field.id] = $event;"
                                :route="''" />

                    <BreezeInputError :message="form.errors['fields' + field.id]" class="mt-2" />
                </div>
            </template>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="score" :value="$t('pages.dashboard.activities.create.form.score')" />
                <BreezeInput id="score" type="text" class="mt-1 block w-full" v-model="form.score" :disabled="true" />
                <BreezeInputError :message="form.errors.score" class="mt-2" />
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
                    score: 0,
                    fields: {},
                    variables: {}
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

                for (const parameter of this.assignment.assessment.parameters)  {

                    if (this.form.parameter == parameter.id) {
                        this.parameter = parameter;
                        this.form.score = parameter.score;
                        
                        for (const field of parameter.form.fields)  {
                            
                            if (field.type == 'formula') {
                                for (const variable of field.variables) {
                                    this.form.variables[variable.id] = '';
                                    this.form.errors['variables' + variable.id] = '';
                                }
                            } else {
                                this.form.fields[field.id] = '';
                                this.form.errors['fields' + field.id] = '';
                            }
                        }

                        break;
                    }
                }
            },

            selectField(field, pid, nid) {
                var score = 0;

                switch (field.type) {
                    case 'text':
                        break;
                    case 'select':
                        for (const option of field.options) {
                            if (pid === option.id) {
                                score -= option.score;
                                break;
                            }
                        }
                        for (const option of field.options) {
                            if (nid === option.id) {
                                score += option.score;
                                break;
                            }
                        }
                        break;
                    case 'multiselect':
                        for (const v of Array.from(pid)) {
                            for (const option of field.options) {
                                if (v === option.id) {
                                    score -= option.score;
                                    break;
                                }
                            }
                        }
                        for (const v of Array.from(nid)) {
                            for (const option of field.options) {
                                if (v === option.id) {
                                    score += option.score;
                                    break;
                                }
                            }
                        }
                        break;
                    default:
                        break;
                }

                this.form.score += score;
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
