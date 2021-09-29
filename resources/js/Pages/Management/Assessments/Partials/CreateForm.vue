<template>
    <BreezeFormSection @submitted="createAssessment">
        <template #title>
            {{ $t('pages.management.assessments.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.assessments.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.assessments.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.assessments.create.form.description')" />
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

        <template #actions>
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Create
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
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    valid_from: '',
                    valid_to: '',
                })
            }
        },

        methods: {
            createAssessment() {
                this.form.post(route('assessment.store'), {
                    errorBag: 'createAssessment',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['assessments'] })
                });
            },
        },
    }
</script>
