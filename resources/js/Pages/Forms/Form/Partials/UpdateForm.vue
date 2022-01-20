<template>
    <BreezeFormSection @submitted="updateForm">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="translate('form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="_form.name" autofocus />
                <BreezeInputError :message="_form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="translate('form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="_form.description" />
                <BreezeInputError :message="_form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
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

        props: ['form', 'translate'],

        data() {
            return {
                _form: this.$inertia.form({
                    name: this.form.name,
                    description: this.form.description,
                })
            }
        },

        methods: {
            updateForm() {
                this._form.put(route('form.update', {'id': this.form.id}), {
                    errorBag: 'updateForm',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['parameters'] })
                });
            },
        },
    }
</script>
