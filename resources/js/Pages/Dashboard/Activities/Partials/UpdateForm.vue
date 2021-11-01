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
    import BreezeSelect from '@/Components/Select'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
        },

        props: ['activity'],

        data() {
            return {
                form: this.$inertia.form({
                    parameter: this.activity.parameter.name,
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
        },
    }
</script>
