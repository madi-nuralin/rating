<template>
    <BreezeFormSection @submitted="updateActivity">
        <template #title>
            {{ $t('pages.dashboard.activities.show.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.activities.show.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="$t('pages.dashboard.activities.show.form.parameter')" />
                <BreezeInput id="parameter" type="text" class="mt-1 block w-full" v-model="form.parameter" :disabled="true"/>
                <BreezeInputError :message="form.errors.parameter" class="mt-2" />
            </div>

            <template v-for="(field, i) in activity.parameter.form.fields">
                <template v-for="(variable, j) in field.variables" v-if="field.type == 'formula'">
                    <div class="col-span-6 sm:col-span-4">
                        <BreezeLabel :for="j == 0 ? i : ++i"
                                    :value="variable.description" />

                        <BreezeInput :id="i"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.attributes[getIndex(i)]['value']"
                                    :disabled="true" />

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
                                    v-model="form.attributes[getIndex(i)]['value']"
                                    :disabled="true" />

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
                                    :route="''"
                                    :readonly="true" />

                        <BreezeInputError :message="form.errors[getIndex(i)]" class="mt-2" />
                    </div>
                </template>
            </template>

            <div class="col-span-6 sm:col-span-4">
                <div class="w-full flex text-sm text-gray-600">
                    <div class="">{{ $t('pages.dashboard.activities.show.form.score') }}</div>
                    <div class="pl-2">{{ score }}</div>
                </div>
            </div>

        </template>

        <template #actions v-if="true">
            <!--BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </BreezeButton-->
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
                    attributes: this.getAttributes(),
                }),
                score: this.activity.score,
            }
        },

        methods: {
            updateActivity() {
                /*this.form.put(route( 'activity.update', {'id': this.activity.id} ), {
                    errorBag: 'updateActivity',
                    preserveScroll: true
                });*/
            },

            getIndex(key) {
                return `attribute${key}`;
            },

            getAttributes() {
                let obj = {}, i = 0, getIndex = this.getIndex;

                for (const field of this.activity.parameter.form.fields) {
                    if (field.type == 'formula') {
                        for (const variable of field.variables) {
                            obj[getIndex(i)] = {};
                            obj[getIndex(i)]['id'] = variable.id;
                            obj[getIndex(i)]['type'] = 'variable';
                            obj[getIndex(i)]['value'] = 0; //
                            ++i;
                        }
                    } else if (field.type == 'multiselect') {
                        obj[getIndex(i)] = {};
                        obj[getIndex(i)]['id'] = field.id;
                        obj[getIndex(i)]['type'] = 'field';
                        obj[getIndex(i)]['value'] = field.values;
                        ++i;
                    } else {
                        obj[getIndex(i)] = {};
                        obj[getIndex(i)]['id'] = field.id;
                        obj[getIndex(i)]['type'] = 'field';
                        obj[getIndex(i)]['value'] = field.values[0];
                        ++i;
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
