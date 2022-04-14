<template>
    <BreezeFormSection @submitted="updateFormField">
        <template #title>
            {{ $t('pages.forms.formField.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.formField.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="label" :value="$t('pages.forms.formField.update.form.label')" />
                <BreezeInput id="label" type="text" class="mt-1 block w-full" v-model="form.label" autofocus />
                <BreezeInputError :message="form.errors.label" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="type" :value="$t('pages.forms.formField.update.form.type')" />
                <BreezeSelect id="type" class="mt-1 block w-full" :value="form.type" @input="form.type = $event" :options="options.type" :multiple="false" />
                <BreezeInputError :message="form.errors.type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div class="grid grid-cols-3">
                    <label class="flex items-center">
                        <BreezeCheckbox name="required" v-model:checked="form.required" />
                        <span class="ml-2 text-sm text-gray-600">Required</span>
                    </label>
                    <label class="flex items-center">
                        <BreezeCheckbox name="nullable" v-model:checked="form.nullable" />
                        <span class="ml-2 text-sm text-gray-600">Nullable</span>
                    </label>
                </div>
            </div>

            <template v-if="Array('number').includes(form.type)">
                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="min_size" :value="$t('Min')" />
                    <BreezeInput id="min_size" type="text" class="mt-1 block w-full" v-model="form.min_size"/>
                    <BreezeInputError :message="form.errors.min_size" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="max_size" :value="$t('Max')" />
                    <BreezeInput id="max_size" type="text" class="mt-1 block w-full" v-model="form.max_size"/>
                    <BreezeInputError :message="form.errors.max_size" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <div class="grid grid-cols-3">
                        <label class="flex items-center">
                            <BreezeCheckbox name="is_integer" v-model:checked="form.is_integer" />
                            <span class="ml-2 text-sm text-gray-600">Only integers</span>
                        </label>
                    </div>
                </div>
            </template>

            <template v-if="Array('text', 'textarea').includes(form.type)">
                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="min_size" :value="$t('Min Length')" />
                    <BreezeInput id="min_size" type="text" class="mt-1 block w-full" v-model="form.min_size"/>
                    <BreezeInputError :message="form.errors.min_size" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="max_size" :value="$t('Max Length')" />
                    <BreezeInput id="max_size" type="text" class="mt-1 block w-full" v-model="form.max_size"/>
                    <BreezeInputError :message="form.errors.max_size" class="mt-2" />
                </div>
            </template>

            <template v-if="Array('file').includes(form.type)">
                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="mimes" :value="$t('Mimes (By default all files are allowed)')" />
                    <BreezeSelect id="mimes" class="mt-1 block w-full" :value="form.mimes" @input="form.mimes = $event" :options="options.mimes" :multiple="true" />
                    <BreezeInputError :message="form.errors.mimes" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="file_size" :value="$t('File Size (K Bytes)')" />
                    <BreezeInput id="file_size" type="text" class="mt-1 block w-full" v-model="form.file_size"/>
                    <BreezeInputError :message="form.errors.file_size" class="mt-2" />
                </div>
            </template>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="variable" :value="$t('pages.forms.formField.update.form.variable')" />
                <BreezeInput id="variable" type="text" class="mt-1 block w-full" v-model="form.variable" />
                <BreezeInputError :message="form.errors.variable" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Update
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
    import BreezeCheckbox from '@/Components/Checkbox.vue'
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
            BreezeCheckbox,
        },

        props: ['field'],

        data() {
            return {
                form: this.$inertia.form({
                    label: this.field.label,
                    type: this.field.type,
                    required: this.getValidationRules('required'),
                    nullable: this.getValidationRules('nullable'),
                    min_size: this.getValidationRules('min_size'),
                    max_size: this.getValidationRules('max_size'),
                    file_size: this.getValidationRules('file_size'),
                    mimes: this.getValidationRules('mimes').split(","),
                    is_integer: this.getValidationRules('is_integer'),
                    variable: this.field.variable,
                })
            }
        },

        methods: {
            updateFormField() {
                this.form.put(route('form-field.update', {'id': this.field.id}), {
                    errorBag: 'updateFormField',
                    preserveScroll: true
                });
            },

            getValidationRules(rule) {
                return this.field.validation_rules 
                    ? this.field.validation_rules[rule]
                    : null;
            }
        },

        computed: {
            options() {
                let type = [
                    { value: 'number', name: this.$t('pages.forms.formField.type.number.name'), description: this.$t('pages.forms.formField.type.number.description') },
                    { value: 'text', name: this.$t('pages.forms.formField.type.text.name'), description: this.$t('pages.forms.formField.type.text.description') },
                    { value: 'textarea', name: this.$t('pages.forms.formField.type.textarea.name'), description: this.$t('pages.forms.formField.type.textarea.description') },
                    { value: 'email', name: this.$t('pages.forms.formField.type.email.name'), description: this.$t('pages.forms.formField.type.email.description') },
                    { value: 'url', name: this.$t('pages.forms.formField.type.url.name'), description: this.$t('pages.forms.formField.type.url.description') },
                    { value: 'select', name: this.$t('pages.forms.formField.type.select.name'), description: this.$t('pages.forms.formField.type.select.description') },
                    { value: 'multiselect', name: this.$t('pages.forms.formField.type.multiselect.name'), description: this.$t('pages.forms.formField.type.multiselect.description') },
                    { value: 'file', name: this.$t('pages.forms.formField.type.file.name'), description: this.$t('pages.forms.formField.type.file.description') },
                    { value: 'time', name: this.$t('pages.forms.formField.type.time.name'), description: this.$t('pages.forms.formField.type.time.description') },
                    { value: 'date', name: this.$t('pages.forms.formField.type.date.name'), description: this.$t('pages.forms.formField.type.date.description') },
                    { value: 'datetime', name: this.$t('pages.forms.formField.type.datetime.name'), description: this.$t('pages.forms.formField.type.datetime.description') },
                    { value: 'datetime-local', name: this.$t('pages.forms.formField.type.datetime_local.name'), description: this.$t('pages.forms.formField.type.datetime_local.description') },
                ];

                let mimes = Array('doc', 'docx', 'rtf', 'xls', 'xlsx', 'ppt', 'pptx', 'xml', 'csv', 'pdf', 'png', 'jpg', 'jpeg', 'gif', 'mp3', 'wav', 'wma', 'aac', 'mp4', 'avi', 'mov').map(function(mime) {
                    return {
                        value: mime,
                        name: this.$t(`pages.forms.formField.validation_rules.mimes.${mime}.name`),
                        description: this.$t(`pages.forms.formField.validation_rules.mimes.${mime}.description`)
                    }
                }, { $t: this.$t });

                return {
                    'type': type,
                    'mimes': mimes
                }
            }
        }
    }
</script>
