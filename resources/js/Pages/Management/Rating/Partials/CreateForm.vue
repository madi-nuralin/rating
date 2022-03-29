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
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="users" :value="$t('pages.management.rating.create.form.users')" />
                <BreezeSelect id="users" class="mt-1 block w-full" :value="form.users" @input="form.users = $event" :options="options.users" :multiple="true" />
                <BreezeInputError :message="form.errors.users" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time1" :value="$t('pages.management.rating.create.form.time1')" />
                <BreezeInput id="time1" type="datetime-local" class="mt-1 block w-full" v-model="form.time1" />
                <BreezeInputError :message="form.errors.time1" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time2" :value="$t('pages.management.rating.create.form.time2')" />
                <BreezeInput id="time2" type="datetime-local" class="mt-1 block w-full" v-model="form.time2" />
                <BreezeInputError :message="form.errors.time2" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time3" :value="$t('pages.management.rating.create.form.time3')" />
                <BreezeInput id="time3" type="datetime-local" class="mt-1 block w-full" v-model="form.time3" />
                <BreezeInputError :message="form.errors.time3" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time4" :value="$t('pages.management.rating.create.form.time4')" />
                <BreezeInput id="time4" type="datetime-local" class="mt-1 block w-full" v-model="form.time4" />
                <BreezeInputError :message="form.errors.time4" class="mt-2" />
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
                    time1: '',
                    time2: '',
                    time3: '',
                    time4: '',
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
