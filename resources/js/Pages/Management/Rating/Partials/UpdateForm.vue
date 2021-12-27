<template>
    <BreezeFormSection @submitted="updateRating">
        <template #title>
            {{ $t('pages.management.rating.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.rating.update.description') }}
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
    import BreezeSelect from '@/Components/Select'
    import BreezeLabel from '@/Components/Label'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeSelect,
            BreezeLabel,
        },

        props: ['rating'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.rating.name,
                    description: this.rating.description,
                    submission_started_at: this.rating.submission_started_at,
                    submission_finished_at: this.rating.submission_finished_at,
                    verification_started_at: this.rating.verification_started_at,
                    verification_finished_at: this.rating.verification_finished_at,
                    approvement_started_at: this.rating.approvement_started_at,
                    approvement_finished_at: this.rating.approvement_finished_at,
                })
            }
        },

        methods: {
            updateRating() {
                this.form.put(route( 'rating.update', {'id': this.rating.id} ), {
                    errorBag: 'updateRating',
                    preserveScroll: true
                });
            },
        },
        computed: {
            options() {
                return {
                };
            }
        }
    }
</script>
