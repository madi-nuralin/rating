<template>
    <BreezeFormSection @submitted="createFormField">
        <template #title>
            {{ $t('pages.forms.form.field.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.form.field.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="label" :value="$t('pages.forms.form.field.create.form.label')" />
                <BreezeInput id="label" type="text" class="mt-1 block w-full" v-model="_form.label" autofocus />
                <BreezeInputError :message="_form.errors.label" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="type" :value="$t('pages.forms.form.field.create.form.type')" />
                <BreezeSelect id="type" class="mt-1 block w-full" :value="_form.type" @input="_form.type = $event" :options="options.types" :multiple="false" />
                <BreezeInputError :message="_form.errors.type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="scoring_policy" :value="$t('pages.forms.form.field.create.form.scoring_policy')" />
                <BreezeSelect id="scoring_policy" class="mt-1 block w-full" :value="_form.scoring_policy" @input="_form.scoring_policy = $event" :options="options.scoring_policy" :multiple="false" />
                <BreezeInputError :message="_form.errors.scoring_policy" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="score" :value="$t('pages.forms.form.field.create.form.score')" />
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
        },

        props: ['form'],

        data() {
            return {
                _form: this.$inertia.form({
                    label: '',
                    type: '',
                    scoring_policy: '',
                    score: ''
                })
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
                let types = [
                    { value: 'text', name: this.$t('pages.forms.form.field.types.text.label'), description: this.$t('pages.forms.form.field.types.text.description') },
                    { value: 'select', name: this.$t('pages.forms.form.field.types.select.label'), description: this.$t('pages.forms.form.field.types.select.description') },
                    { value: 'multiselect', name: this.$t('pages.forms.form.field.types.multiselect.label'), description: this.$t('pages.forms.form.field.types.multiselect.description') },
                    { value: 'file', name: this.$t('pages.forms.form.field.types.file.label'), description: this.$t('pages.forms.form.field.types.file.description') }
                ];

                let scoringPolicy = [
                    { value: 'disabled', name: 'Disabled', description: 'Scoring disabled by default'},
                    { value: 'default', name: 'Default', description: 'Scoring calculated by default score'},
                    { value: 'field_type', name: 'By field type', description: 'Scoring behaviour depends on field type'}
                ];


                return {
                    'types': types,
                    'scoring_policy': scoringPolicy
                }
            }
        }
    }
</script>
