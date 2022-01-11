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
                <BreezeLabel for="parameters" :value="$t('pages.management.rating.create.form.parameters')" />
                <BreezeSelect id="parameters" class="mt-1 block w-full" :value="form.parameters" @input="form.parameters = $event" :options="options.parameters" :multiple="true" />
                <BreezeInputError :message="form.errors.parameters" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="users" :value="$t('pages.management.rating.create.form.users')" />
                <BreezeSelect id="users" class="mt-1 block w-full" :value="form.users" @input="form.users = $event" :options="options.users" :multiple="true" />
                <BreezeInputError :message="form.errors.users" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="submission_begin_time_at" :value="$t('pages.management.rating.create.form.submission_begin_time_at')" />
                <BreezeInput id="submission_begin_time_at" type="datetime-local" class="mt-1 block w-full" v-model="form.submission_begin_time_at" />
                <BreezeInputError :message="form.errors.submission_begin_time_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="submission_end_time_at" :value="$t('pages.management.rating.create.form.submission_end_time_at')" />
                <BreezeInput id="submission_end_time_at" type="datetime-local" class="mt-1 block w-full" v-model="form.submission_end_time_at" />
                <BreezeInputError :message="form.errors.submission_end_time_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="verification_begin_time_at" :value="$t('pages.management.rating.create.form.verification_begin_time_at')" />
                <BreezeInput id="verification_begin_time_at" type="datetime-local" class="mt-1 block w-full" v-model="form.verification_begin_time_at" />
                <BreezeInputError :message="form.errors.verification_begin_time_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="verification_end_time_at" :value="$t('pages.management.rating.create.form.verification_end_time_at')" />
                <BreezeInput id="verification_end_time_at" type="datetime-local" class="mt-1 block w-full" v-model="form.verification_end_time_at" />
                <BreezeInputError :message="form.errors.verification_end_time_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="approvement_begin_time_at" :value="$t('pages.management.rating.create.form.approvement_begin_time_at')" />
                <BreezeInput id="approvement_begin_time_at" type="datetime-local" class="mt-1 block w-full" v-model="form.approvement_begin_time_at" />
                <BreezeInputError :message="form.errors.approvement_begin_time_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="approvement_end_time_at" :value="$t('pages.management.rating.create.form.approvement_end_time_at')" />
                <BreezeInput id="approvement_end_time_at" type="datetime-local" class="mt-1 block w-full" v-model="form.approvement_end_time_at" />
                <BreezeInputError :message="form.errors.approvement_end_time_at" class="mt-2" />
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

        props: ['rating', 'parameters', 'users'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.rating.name,
                    description: this.rating.description,
                    submission_begin_time_at: this.rating.submission_begin_time_at,
                    submission_end_time_at: this.rating.submission_end_time_at,
                    verification_begin_time_at: this.rating.verification_begin_time_at,
                    verification_end_time_at: this.rating.verification_end_time_at,
                    approvement_begin_time_at: this.rating.approvement_begin_time_at,
                    approvement_end_time_at: this.rating.approvement_end_time_at,
                    parameters: this.rating.parameters.map(function(parameter) {
                        return parameter.id;
                    }),
                    users: this.rating.users.map(function(user) {
                        return user.id;
                    }),
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
                    'parameters': this.parameters ? this.parameters.map(function(parameter) {
                        return {
                            'value': parameter.id,
                            'name': parameter.name,
                            'description': parameter.description
                        };
                    }) : null,
                    'users': this.users ? this.users.map(function(user) {
                        return {
                            'value': user.id,
                            'name': user.name,
                            'description': user.email
                        };
                    }) : null,
                };
            },
        },
    }
</script>
