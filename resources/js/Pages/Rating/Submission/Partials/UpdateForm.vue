<template>
    <BreezeFormSection @submitted="updateSubmission">
        <template #title>
            {{ $t('pages.management.rating.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.rating.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <p>{{ submission.parameter.target.name }}</p>
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <p>{{ submission.parameter.name }}</p>
            </div>

            <div class="col-span-6 sm:col-span-4" v-for="field in submission.parameter.form.fields" v-if="submission.parameter.form && submission.parameter.form.fields">
                <BreezeLabel :for="FIELD[field.id]" :value="field.label" />

                <BreezeInput v-if="field.type == 'number'"
                    :id="FIELD[field.id]"
                    type="text"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'text'"
                    :id="FIELD[field.id]"
                    type="text"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeTextarea v-else-if="field.type == 'textarea'"
                    :id="FIELD[field.id]"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'email'"
                    :id="FIELD[field.id]"
                    type="email"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'url'"
                    :id="FIELD[field.id]"
                    type="url"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeSelect v-else-if="field.type == 'select'"
                    :id="FIELD[field.id]"
                    :multiple="false"
                    :value="_form[FIELD[field.id]]"
                    @input="_form[FIELD[field.id]] = $event"
                    :options="options[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeSelect v-else-if="field.type == 'multiselect'"
                    :id="FIELD[field.id]"
                    :multiple="true"
                    :value="_form[FIELD[field.id]]"
                    @input="_form[FIELD[field.id]] = $event"
                    :options="options[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeFile v-else-if="field.type == 'file'"
                    :id="FIELD[field.id]"
                    :value="_form[FIELD[field.id]]"
                    @input="_form[FIELD[field.id]] = $event;"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'time'"
                    :id="FIELD[field.id]"
                    type="time"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'date'"
                    :id="FIELD[field.id]"
                    type="date"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'datetime'"
                    :id="FIELD[field.id]"
                    type="datetime-local"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInputError :message="_form.errors[FIELD[field.id]]" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="true">
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
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
    import BreezeTextarea from '@/Components/Textarea'
    import BreezeSelect from '@/Components/Select'
    import BreezeLabel from '@/Components/Label'
    import BreezeFile from '@/Components/InputFile'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeSelect,
            BreezeLabel,
            BreezeFile,
        },

        props: ['submission'],

        setup(props) {
            const INIT = [];
            const FIELD = [];

            if (props.submission.parameter.form) {
                for (const field of props.submission.parameter.form.fields) {
                    FIELD[field.id] = `field${field.id}`;
                    INIT[FIELD[field.id]] = field.responce.value;
                }
            }

            return {
                INIT,
                FIELD,
            };
        },

        data() {
            return {
                _form: this.$inertia.form(this.INIT),
            }
        },

        methods: {
            updateSubmission() {
                this._form.put(route('submission.update', {'id': this.submission.id}), {
                    errorBag: 'updateSubmission',
                    preserveScroll: true
                });
            },
        },
        
        computed: {
            options() {
                let _options = [];

                for (const field of this.submission.parameter.form.fields) {
                    _options[this.FIELD[field.id]] = field.options ?
                        field.options.map(function(option) {
                            return {
                                'value': option.id,
                                'name': option.name,
                                'description': option.description
                            };
                        }) : [];
                }

                return _options;
            }
        },
    }
</script>
