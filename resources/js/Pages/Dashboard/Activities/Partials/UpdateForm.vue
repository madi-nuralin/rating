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
                <BreezeLabel :for="field.id" :value="field.name" />

                <BreezeInput v-if="field.type == 'text'"
                            :id="__(field.id)"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.fields[__(field.id)]" />

                <BreezeSelect v-if="field.type == 'select'"
                            class="mt-1 block w-full"
                            :id="__(field.id)"
                            :value="form.fields[__(field.id)]"
                            @input="form.fields[__(field.id)] = $event"
                            :options="options[__(field.id)]"
                            :multiple="false" />

                <BreezeSelect v-if="field.type == 'multiselect'"
                            class="mt-1 block w-full"
                            :id="__(field.id)"
                            :value="form.fields[__(field.id)]"
                            @input="form.fields[__(field.id)] = $event"
                            :options="options[__(field.id)]"
                            :multiple="true" />

                <BreezeInputFile v-if="field.type == 'file'"
                            class="mt-1 block w-full"
                            :id="__(field.id)"
                            :href="''"
                            :href-delete="''" />

                <BreezeInputError :message="form.errors[__(field.id)]" class="mt-2" />
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
    import BreezeInputFile from '@/Components/FileInput'
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
                    fields: this.getFields()
                })
            }
        },

        methods: {
            updateActivity() {
                this.form.put(route( 'activity.update', {'id': this.activity.id} ), {
                    errorBag: 'updateActivity',
                    preserveScroll: true
                });
            },

            getFields() {
                let ret_val = {};
                let form_fields = this.activity.parameter.form.fields;

                for (var i = 0; i < form_fields.length; ++i) {
                    if (form_fields[i].type == 'multiselect')
                        ret_val[this.__(form_fields[i].id)] = form_fields[i].values;
                    else
                        ret_val[this.__(form_fields[i].id)] = form_fields[i].values[0];
                }

                return ret_val;
            },

            __(id) {
                return id;
            }
        },

        computed: {
            options() {
                let ret_val = {};

                if (true) {

                    let form_fields = this.activity.parameter.form.fields;

                    for (var i = 0; i < form_fields.length; ++i) {

                        if (! Array('select', 'multiselect').includes(form_fields[i].type) )
                            continue;

                        ret_val[this.__(form_fields[i].id)] = form_fields[i].options.map(function(option) {
                            return {
                                value: option.id,
                                name: option.name,
                                description: option.description,
                            };
                        });
                    }
                }

                return ret_val;
            }
        }
    }
</script>
