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
                        <BreezeLabel :for="rule.name" :value="rule.description" />
                        <BreezeInput :id="rule.name" :type="rule.input_type" class="mt-1 block w-full" v-model="form[rule.name]"/>
                        <BreezeInputError :message="form.errors[rule.name]" class="mt-2" />
                    </template>

                    <template v-if="rule.type == 'formula'">
                    </template>

                    <template v-if="rule.type == 'submission'">
                        <BreezeLabel :for="rule.name" :value="rule.description" />
                        <BreezeFileInput :id="rule.name" :href="null" :href-delete="null" v-if="rule.input_type == 'file'"/>
                        <BreezeInput :id="rule.name" :type="rule.input_type" class="mt-1 block w-full" v-model="form[rule.name]" v-if="rule.input_type == 'link'"/>
                        <BreezeInputError :message="form.errors[rule.name]" class="mt-2" />
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
    import BreezeFileInput from '@/Components/FileInput.vue'
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
            BreezeFileInput
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
                            this.form[rule.name] = '';
                            this.form.errors[rule.name] = '';
                            break;

                        case 'formula':
                            break;

                        case 'submission':
                            this.form[rule.name] = '';
                            this.form.errors[rule.name] = '';
                            break;
                    }
                }
            },

            t(path) {
                return this.$t('pages.dashboard.assignments.create.' + path);
            }
        },

        computed: {
            options() {
                return {
                    parameter: this.assessment.parameters.map(function(parameter) {
                        return { value: parameter.id, name: parameter.name, description: parameter.description };
                    })
                }
            }
        }
    }
</script>
