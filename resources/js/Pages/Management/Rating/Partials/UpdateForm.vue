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

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="filling_started_at" :value="$t('pages.management.rating.create.form.filling_started_at')" />
                <BreezeInput id="filling_started_at" type="datetime-local" class="mt-1 block w-full" v-model="form.filling_started_at" />
                <BreezeInputError :message="form.errors.filling_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="filling_expired_at" :value="$t('pages.management.rating.create.form.filling_expired_at')" />
                <BreezeInput id="filling_expired_at" type="datetime-local" class="mt-1 block w-full" v-model="form.filling_expired_at" />
                <BreezeInputError :message="form.errors.filling_expired_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="verification_started_at" :value="$t('pages.management.rating.create.form.verification_started_at')" />
                <BreezeInput id="verification_started_at" type="datetime-local" class="mt-1 block w-full" v-model="form.verification_started_at" />
                <BreezeInputError :message="form.errors.verification_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="verification_expired_at" :value="$t('pages.management.rating.create.form.verification_expired_at')" />
                <BreezeInput id="verification_expired_at" type="datetime-local" class="mt-1 block w-full" v-model="form.verification_expired_at" />
                <BreezeInputError :message="form.errors.verification_expired_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="approvement_started_at" :value="$t('pages.management.rating.create.form.approvement_started_at')" />
                <BreezeInput id="approvement_started_at" type="datetime-local" class="mt-1 block w-full" v-model="form.approvement_started_at" />
                <BreezeInputError :message="form.errors.approvement_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="approvement_expired_at" :value="$t('pages.management.rating.create.form.approvement_expired_at')" />
                <BreezeInput id="approvement_expired_at" type="datetime-local" class="mt-1 block w-full" v-model="form.approvement_expired_at" />
                <BreezeInputError :message="form.errors.approvement_expired_at" class="mt-2" />
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
                    filling_started_at: this.rating.filling_started_at,
                    filling_expired_at: this.rating.filling_expired_at,
                    verification_started_at: this.rating.verification_started_at,
                    verification_expired_at: this.rating.verification_expired_at,
                    approvement_started_at: this.rating.approvement_started_at,
                    approvement_expired_at: this.rating.approvement_expired_at,
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
