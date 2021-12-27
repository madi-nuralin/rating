<template>
    <BreezeFormSection @submitted="createRating">
        <template #title>
            {{ $t('pages.management.rating.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.rating.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.rating.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.rating.create.form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 sm:col-start-1">
                <BreezeLabel for="submission_started_at" :value="$t('pages.management.rating.create.form.submission_started_at')" />
                <BreezeInput id="submission_started_at" type="date" class="mt-1 block w-full" v-model="form.submission_started_at" />
                <BreezeInputError :message="form.errors.submission_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <BreezeLabel for="submission_finished_at" :value="$t('pages.management.rating.create.form.submission_finished_at')" />
                <BreezeInput id="submission_finished_at" type="date" class="mt-1 block w-full" v-model="form.submission_finished_at" />
                <BreezeInputError :message="form.errors.submission_finished_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 sm:col-start-1">
                <BreezeLabel for="verification_started_at" :value="$t('pages.management.rating.create.form.verification_started_at')" />
                <BreezeInput id="verification_started_at" type="date" class="mt-1 block w-full" v-model="form.verification_started_at" />
                <BreezeInputError :message="form.errors.verification_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <BreezeLabel for="verification_finished_at" :value="$t('pages.management.rating.create.form.verification_finished_at')" />
                <BreezeInput id="verification_finished_at" type="date" class="mt-1 block w-full" v-model="form.verification_finished_at" />
                <BreezeInputError :message="form.errors.verification_finished_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 sm:col-start-1">
                <BreezeLabel for="approvement_started_at" :value="$t('pages.management.rating.create.form.approvement_started_at')" />
                <BreezeInput id="approvement_started_at" type="date" class="mt-1 block w-full" v-model="form.approvement_started_at" />
                <BreezeInputError :message="form.errors.approvement_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2">
                <BreezeLabel for="approvement_finished_at" :value="$t('pages.management.rating.create.form.approvement_finished_at')" />
                <BreezeInput id="approvement_finished_at" type="date" class="mt-1 block w-full" v-model="form.approvement_finished_at" />
                <BreezeInputError :message="form.errors.approvement_finished_at" class="mt-2" />
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
                    submission_started_at: '',
                    submission_finished_at: '',
                    verification_started_at: '',
                    verification_finished_at: '',
                    approvement_started_at: '',
                    approvement_finished_at: '',
                })
            }
        },

        methods: {
            createRating() {
                this.form.post(route('rating.store'), {
                    errorBag: 'createRating',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['rating'] })
                });
            },
        },
    }
</script>
