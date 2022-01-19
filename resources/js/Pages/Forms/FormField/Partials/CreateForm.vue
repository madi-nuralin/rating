<template>
    <BreezeFormSection @submitted="createFormField">
        <template #title>
            {{ $t('pages.forms.formField.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.formField.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="label" :value="$t('pages.forms.formField.create.form.label')" />
                <BreezeInput id="label" type="text" class="mt-1 block w-full" v-model="_form.label" autofocus />
                <BreezeInputError :message="_form.errors.label" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="type" :value="$t('pages.forms.formField.create.form.type')" />
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

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="scoring_policy" :value="$t('pages.forms.formField.create.form.scoring_policy')" />
                <BreezeSelect id="scoring_policy" class="mt-1 block w-full" :value="_form.scoring_policy" @input="_form.scoring_policy = $event" :options="options.scoring_policy" :multiple="false" />
                <BreezeInputError :message="_form.errors.scoring_policy" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="score" :value="$t('pages.forms.formField.create.form.score')" />
                <BreezeInput id="score" type="text" class="mt-1 block w-full" v-model="_form.score" :disabled="_form.scoring_policy != 'default'" :class="{'opacity-25': _form.scoring_policy != 'default'}"/>
                <BreezeInputError :message="_form.errors.score" class="mt-2" />
            </div>
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

        props: ['form'],

        data() {
            return {
                _form: this.$inertia.form({
                    label: '',
                    type: '',
                    scoring_policy: '',
                    score: '',
                    validation_rules: Array(),
                    required: false,
                    nullable: false,
                    min_size: 0,
                    max_size: 0,
                    file_size: 0,
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

                let scoring_policy = [
                    { value: 'disabled', name: this.$t('pages.forms.formField.scoring_policy.disabled.name'), description: this.$t('pages.forms.formField.scoring_policy.disabled.description')},
                    { value: 'default', name: this.$t('pages.forms.formField.scoring_policy.default.name'), description: this.$t('pages.forms.formField.scoring_policy.default.description')},
                    { value: 'field_type', name: this.$t('pages.forms.formField.scoring_policy.field_type.name'), description: this.$t('pages.forms.formField.scoring_policy.field_type.description')}
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
                    'scoring_policy': scoring_policy,
                    'mimes': mimes
                }
            }
        }
    }
</script>
