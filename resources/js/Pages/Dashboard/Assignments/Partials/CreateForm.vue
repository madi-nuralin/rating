<template>
    <BreezeFormSection @submitted="createAssignment">
        <template #title>
            {{ t('title') }}
        </template>

        <template #description>
            {{ t('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="t('form.parameter')" />
                <BreezeSelect id="parameter" class="mt-1 block w-full" :value="form.parameter" @input="selectParameter" :options="options.parameter" :multiple="false" />
                <BreezeInputError :message="form.errors.parameter" class="mt-2" />
            </div>

            <template v-if="parameter" v-for="(rule, i) in parameter.rules">
                <div class="col-span-6 sm:col-span-4" >
                    <template v-if="rule.type == 'metadata'">
                        <BreezeLabel :for="rule.input_id" :value="rule.input_label" />
                        <BreezeInput :id="rule.input_id" :type="rule.input_type" class="mt-1 block w-full" v-model="form[rule.input_id]" v-if="rule.input_type == 'text'"/>
                        <BreezeSelect :id="rule.input_id" class="mt-1 block w-full" :value="form[rule.input_id]" @input="form[rule.input_id] = $event" :options="options[rule.input_id]" :multiple="false" v-else/>
                        <BreezeInputError :message="form.errors[rule.input_id]" class="mt-2" />
                    </template>

                    <template v-if="rule.type == 'formula'" v-for="(variable, j) in rule.options">
                        <BreezeLabel :for="variable.name" :value="variable.description" />
                        <BreezeInput :id="variable.name" type="text" class="mt-1 block w-full" v-model="form[variable.name]"/>
                        <BreezeInputError :message="form.errors[variable.name]" class="mt-2" />
                    </template>

                    <template v-if="rule.type == 'submission'">
                        <BreezeLabel :for="rule.input_id" :value="rule.input_label" />
                        <BreezeInputFile :id="rule.input_id" :href="null" :href-delete="null" v-if="rule.input_type == 'file'"/>
                        <BreezeInput :id="rule.input_id" :type="rule.input_type" class="mt-1 block w-full" v-model="form[rule.input_id]" v-if="rule.input_type == 'link'"/>
                        <BreezeInputError :message="form.errors[rule.input_id]" class="mt-2" />
                    </template>
                </div>
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
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'
    import BreezeInputFile from '@/Components/FileInput.vue'
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
            BreezeInputFile
        },

        props: ['assessment', 'employement'],

        data() {
            return {
                form: this.$inertia.form({
                    parameter: null,
                }),

                parameter: null,
            }
        },

        methods: {
            createAssignment() {
                this.form.post(route('assignment.store', {'assessment': this.assessment.id, 'employement': this.employement.id}), {
                    errorBag: 'createAssignment',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['assignments'] })
                });
            },

            selectParameter(event) {
                this.form.parameter = event;

                for (var i in this.assessment.parameters) {
                    let parameter = this.assessment.parameters[i];

                    if (parameter.id == this.form.parameter) {
                        this.parameter = parameter;
                        break;
                    }
                }

                for (var i in this.parameter.rules) {
                    let rule = this.parameter.rules[i];

                    switch (rule.type) {
                        case 'metadata':
                            this.form[rule.input_id] = '';
                            this.form.errors[rule.input_id] = '';
                            break;

                        case 'formula':
                            for (var j in rule.options) {
                                let variable = rule.options[j];

                                this.form[variable.name] = '';
                                this.form.errors[variable.name] = '';
                            }
                            break;

                        case 'submission':
                            this.form[rule.input_id] = '';
                            this.form.errors[rule.input_id] = '';
                            break;
                    }
                }
            },

            t(p) {
                return this.$t('pages.dashboard.assignments.create.' + p);
            }
        },

        computed: {
            options() {
                let parameter = this.parameter;
                let ret = {parameter:[]};

                if (parameter) {

                    for (var i in parameter.rules) {
                        let rule = parameter.rules[i];

                        if (rule.input_type == 'select') {

                            ret[rule.input_id] = [];

                            for (var j in rule.options) {
                                let option = rule.options[j];
                                ret[rule.input_id].push({value: option.id, name: option.name, description: option.description});
                            }
                        }
                    }

                }

                ret['parameter'] = this.assessment.parameters.map(function(parameter) {
                    return { value: parameter.id, name: parameter.name, description: parameter.description };
                });

                return ret;
            }
        }
    }
</script>
