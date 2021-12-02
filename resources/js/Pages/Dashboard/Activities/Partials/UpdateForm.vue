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

            <div class="col-span-6 sm:col-span-4" v-for="(field, i) in activity.parameter.form.fields">
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

            map(key) {
                return `field${key}`;
            },

            getFields() {
                let obj = {}, i = 0, map = this.map;

                for (const field of this.activity.parameter.form.fields) {
                    obj[map(i)] = {};
                    obj[map(i)]['id'] = field.id;

                    if (field.type == 'multiselect') {
                        obj[map(i)]['value'] = field.values;
                    } else {
                        obj[map(i)]['value'] = field.values[0];
                    }

                    ++i;
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
