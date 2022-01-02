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
    import BreezeSelect from '@/Components/Select'
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

        props: ['parameters', 'users'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    filling_started_at: '',
                    filling_expired_at: '',
                    verification_started_at: '',
                    verification_expired_at: '',
                    approvement_started_at: '',
                    approvement_expired_at: '',
                    parameters: '',
                    users: ''
                }),
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
