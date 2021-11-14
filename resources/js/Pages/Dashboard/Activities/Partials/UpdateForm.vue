<template>
    <BreezeFormSection @submitted="updateActivity">
        <template #title>
            {{ $t('pages.dashboard.activities.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.activities.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="$t('pages.dashboard.activities.update.form.parameter')" />
                <BreezeInput id="parameter" type="text" class="mt-1 block w-full" v-model="form.parameter" :disabled="true"/>
                <BreezeInputError :message="form.errors.parameter" class="mt-2" />
            </div>

            <template v-for="(field, i) in activity.parameter.form.fields">
                <div class="col-span-6 sm:col-span-4" v-if="field.type == 'formula'"
                        v-for="(variable, j) in field.variables">
                    <BreezeLabel :for="variable.id"
                                :value="variable.description" />

                    <BreezeInput :id="variable.id"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.variables[variable.id]" />

                    <BreezeInputError :message="form.errors['variables' + variable.id]"
                                class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4" v-else>
                    <BreezeLabel :for="field.id"
                                :value="field.name" />

                    <BreezeInput v-if="field.type == 'text'"
                                :id="field.id"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.fields[field.id]" />

                    <BreezeSelect v-if="field.type == 'select'"
                                class="mt-1 block w-full"
                                :id="field.id"
                                :value="form.fields[field.id]"
                                @input="form.fields[field.id] = $event"
                                :options="options[field.id]"
                                :multiple="false" />

                    <BreezeSelect v-if="field.type == 'multiselect'"
                                class="mt-1 block w-full"
                                :id="field.id"
                                :value="form.fields[field.id]"
                                @input="form.fields[field.id] = $event"
                                :options="options[field.id]"
                                :multiple="true" />

                    <BreezeInputFile v-if="field.type == 'file'"
                                class="mt-1 block w-full"
                                :id="field.id"
                                :value="form.fields[field.id]"
                                @input="form.fields[field.id] = $event;"
                                :route="''" />

                    <BreezeInputError :message="form.errors['fields' + field.id]"
                                class="mt-2" />
                </div>
            </template>

            <div class="col-span-6 sm:col-span-4">
                <div class="w-full flex text-sm">
                    <div class="text-gray-600">{{ $t('pages.dashboard.activities.update.form.score') }}</div>
                    <div class="pl-2">{{ form.score }}</div>
                </div>
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
    import BreezeInputFile from '@/Components/InputFile'
    import BreezeTextarea from '@/Components/Textarea'
    import BreezeLabel from '@/Components/Label'
    import BreezeSelect from '@/Components/Select'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeInputFile,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect
        },

        props: ['activity'],

        data() {
            return {
                form: this.$inertia.form({
                    parameter: this.activity.parameter.name,
                    fields: this.getFields(),
                    variables: this.getVariables(),
                    score: this.activity.score,
                }),
            }
        },

        methods: {
            updateActivity() {
                this.form.put(route( 'activity.update', {'id': this.activity.id} ), {
                    errorBag: 'updateActivity',
                    preserveScroll: true,
                    onSuccess: () => Inertia.reload({ only: ['activity'] })
                });
            },

            getFields() {
                let obj = {};

                for (const field of this.activity.parameter.form.fields) {
                    if (field.type == 'multiselect') {
                        obj[field.id] = field.values;
                    } else {
                        obj[field.id] = field.values[0];
                    }
                }

                return obj;
            },

            getVariables() {
                let obj = {};

                for (const field of this.activity.parameter.form.fields) {
                    if (field.type != 'formula') {
                        continue;
                    }
                    for (const variable of field.variables) {
                        obj[variable.id] = 0; //
                    }
                }

                return obj;
            },
        },

        computed: {
            options() {
                let obj = {};

                if (true) {

                    for (const field of this.activity.parameter.form.fields) {

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

                return obj;
            }
        }
    }
</script>
