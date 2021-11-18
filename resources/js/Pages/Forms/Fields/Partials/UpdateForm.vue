<template>
    <BreezeFormSection @submitted="updateFormField">
        <template #title>
            {{ $t('pages.forms.fields.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.fields.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.forms.fields.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="type" :value="$t('pages.forms.fields.update.form.type')" />
                <BreezeSelect id="type" class="mt-1 block w-full" :value="form.type" @input="form.type = $event" :options="options.types" :multiple="false" />
                <BreezeInputError :message="form.errors.type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="form.type == 'text'">
                <BreezeLabel for="formula" :value="$t('pages.forms.fields.create.form.formula')" />
                <BreezeInput id="formula" type="text" class="mt-1 block w-full" v-model="form.formula" autofocus />
                <BreezeInputError :message="form.errors.formula" class="mt-2" />
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
        },

        props: ['field'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.field.name,
                    type: this.field.type,
                    formula: this.field.formula,
                })
            }
        },

        methods: {
            updateFormField() {
                this.form.put(route('form-field.update', {'id': this.field.id}), {
                    errorBag: 'updateFormField',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['parameters'] })
                });
            },
        },

        computed: {
            options() {
                let types = [
                    { value: 'text', name: this.$t('pages.forms.fields.types.text.name'), description: this.$t('pages.forms.fields.types.text.description') },
                    { value: 'select', name: this.$t('pages.forms.fields.types.select.name'), description: this.$t('pages.forms.fields.types.select.description') },
                    { value: 'multiselect', name: this.$t('pages.forms.fields.types.multiselect.name'), description: this.$t('pages.forms.fields.types.multiselect.description') },
                    { value: 'file', name: this.$t('pages.forms.fields.types.file.name'), description: this.$t('pages.forms.fields.types.file.description') }
                ];


                return {
                    'types' : types
                }
            }
        }
    }
</script>
