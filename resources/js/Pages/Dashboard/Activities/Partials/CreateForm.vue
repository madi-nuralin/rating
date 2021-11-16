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
                <BreezeLabel :for="i" :value="field.name" />

                <BreezeInput v-if="field.type == 'text'"
                            :id="i"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.fields[map(i)]['value']" />

                <BreezeSelect v-else-if="field.type == 'select'"
                            class="mt-1 block w-full"
                            :id="i"
                            :value="form.fields[map(i)]['value']"
                            @input="form.fields[map(i)]['value'] = $event"
                            :options="options[field.id]"
                            :multiple="false" />

                <BreezeSelect v-else-if="field.type == 'multiselect'"
                            class="mt-1 block w-full"
                            :id="i"
                            :value="form.fields[map(i)]['value']"
                            @input="form.fields[map(i)]['value'] = $event"
                            :options="options[field.id]"
                            :multiple="true" />

                <BreezeInputFile v-else-if="field.type == 'file'"
                            class="mt-1 block w-full"
                            :id="i"
                            :value="form.fields[map(i)]['value']"
                            @input="form.fields[map(i)]['value'] = $event"
                            :route="''" />

                <BreezeInputError :message="form.errors[map(i)]" class="mt-2" />
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
                    fields: {},
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

            map(key) {
                return `field${key}`;
            },

            selectParameter(event) {
                this.form.parameter = event;

                for (const parameter of this.assignment.assessment.parameters)  {

                    if (this.form.parameter == parameter.id) {
                        this.parameter = parameter;
                        this.form.score = parameter.score;

                        this.form.fields = {};
                        this.form.errors = {};

                        var i = 0, map = this.map;
                        
                        for (const field of parameter.form.fields)  {
                            this.form.fields[map(i)] = {};
                            this.form.fields[map(i)]['id'] = field.id;
                            this.form.fields[map(i)]['value'] = null;
                            this.form.errors[map(i)] = null;
                            ++i;
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
