<template>
    <BreezeFormSection @submitted="updateAuthentication">
        <template #title>
            {{ $t('pages.administration.authentication.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.administration.authentication.update.description') }}
        </template>

        <template #form>
            <div class="col-span-4 md:col-span-6">
                <label class="flex items-center">
                    <BreezeCheckbox name="allow_user_register" v-model:checked="form.allow_user_register" />
                    <span class="ml-2 text-sm text-gray-600">
                        {{ $t('pages.administration.authentication.update.form.allow_user_register') }}
                    </span>
                </label>
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
    import BreezeTextarea from '@/Components/Textarea'
    import BreezeLabel from '@/Components/Label'
    import BreezeCheckbox from '@/Components/Checkbox'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeCheckbox
        },

        props: ['authentication'],

        data() {
            return {
                form: this.$inertia.form({
                    allow_user_register: this.authentication.allow_user_register
                })
            }
        },

        methods: {
            updateAuthentication() {
                this.form.put(route('authentication.update'), {
                    errorBag: 'updateAuthentication',
                    preserveScroll: true
                });
            },
        },
    }
</script>
