<template>
    <BreezeFormSection @submitted="createFormField">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="label" :value="translate('form.label')" />
                <BreezeInput id="label" type="text" class="mt-1 block w-full" v-model="_form.label" autofocus />
                <BreezeInputError :message="_form.errors.label" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="type" :value="translate('form.type')" />
                <BreezeSelect id="type" class="mt-1 block w-full" :value="_form.type" @input="_form.type = $event" :options="options.type" :multiple="false" />
                <BreezeInputError :message="_form.errors.type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <label class="flex items-center">
                    <BreezeCheckbox name="required" v-model:checked="_form.required" />
                    <span class="ml-2 text-sm text-gray-600">Required</span>
                </label>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <label class="flex items-center">
                    <BreezeCheckbox name="nullable" v-model:checked="_form.nullable" />
                    <span class="ml-2 text-sm text-gray-600">Nullable</span>
                </label>
            </div>

            <template v-if="Array('text', 'textarea').includes(_form.type)">
                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="min_size" :value="$t('Min Size')" />
                    <BreezeInput id="min_size" type="text" class="mt-1 block w-full" v-model="_form.min_size"/>
                    <BreezeInputError :message="_form.errors.min_size" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="max_size" :value="$t('Max Size')" />
                    <BreezeInput id="max_size" type="text" class="mt-1 block w-full" v-model="_form.max_size"/>
                    <BreezeInputError :message="_form.errors.max_size" class="mt-2" />
                </div>
            </template>

            <template v-if="Array('file').includes(_form.type)">
                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="mimes" :value="$t('Mimes (By default all files are allowed)')" />
                    <BreezeSelect id="mimes" class="mt-1 block w-full" :value="_form.mimes" @input="_form.mimes = $event" :options="options.mimes" :multiple="true" />
                    <BreezeInputError :message="_form.errors.mimes" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="file_size" :value="$t('File Size (K Bytes)')" />
                    <BreezeInput id="file_size" type="text" class="mt-1 block w-full" v-model="_form.file_size"/>
                    <BreezeInputError :message="_form.errors.file_size" class="mt-2" />
                </div>
            </template>
        </template>

        <template #actions>
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
                Create
            </BreezeButton>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
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
            BreezeButtonSecondary,
            BreezeButtonDanger,
            BreezeActionMessage,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
            BreezeCheckbox,
        },

        props: ['form', 'translate'],

        data() {
            return {
                _form: this.$inertia.form({
                    label: '',
                    type: '',
                    validation_rules: Array(),
                    required: false,
                    nullable: false,
                    min_size: 0,
                    max_size: 0,
                    file_size: 0,
                    mimes: Array(),
                }),
            }
        },

        methods: {
            createFormField() {
                this._form.post(route('form-field.store', {'form': this.form.id}), {
                    errorBag: 'createFormField',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['parameters'] })
                });
            },
        },

        computed: {
            options() {
                let type = [
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
