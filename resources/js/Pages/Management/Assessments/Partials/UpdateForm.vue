<template>
    <BreezeFormSection @submitted="updateAssessment">
        <template #title>
            {{ $t('pages.management.assessments.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.assessments.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.assessments.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.assessments.update.form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="valid_from" :value="$t('pages.management.assessments.update.form.validFrom')" />
                <BreezeInput id="valid_from" type="date" class="mt-1 block w-full" v-model="form.valid_from" />
                <BreezeInputError :message="form.errors.valid_from" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="valid_to" :value="$t('pages.management.assessments.update.form.validTo')" />
                <BreezeInput id="valid_to" type="date" class="mt-1 block w-full" v-model="form.valid_to" />
                <BreezeInputError :message="form.errors.valid_to" class="mt-2" />
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

        props: ['assessment'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.assessment.name,
                    description: this.assessment.description,
                    valid_from: this.assessment.valid_from,
                    valid_to: this.assessment.valid_to,
                })
            }
        },

        methods: {
            updateAssessment() {
                this.form.put(route( 'assessment.update', {'id': this.assessment.id} ), {
                    errorBag: 'updateAssessment',
                    preserveScroll: true
                });
            },
        },
    }
</script>
