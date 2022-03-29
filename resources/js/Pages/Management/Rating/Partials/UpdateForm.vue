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
                <BreezeLabel for="name" :value="$t('pages.management.rating.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.rating.update.form.description')" />
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="users" :value="$t('pages.management.rating.update.form.users')" />
                <BreezeSelect id="users" class="mt-1 block w-full" :value="form.users" @input="form.users = $event" :options="options.users" :multiple="true" />
                <BreezeInputError :message="form.errors.users" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time1" :value="$t('pages.management.rating.update.form.time1')" />
                <BreezeInput id="time1" type="datetime-local" class="mt-1 block w-full" v-model="form.time1" />
                <BreezeInputError :message="form.errors.time1" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time2" :value="$t('pages.management.rating.update.form.time2')" />
                <BreezeInput id="time2" type="datetime-local" class="mt-1 block w-full" v-model="form.time2" />
                <BreezeInputError :message="form.errors.time2" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time3" :value="$t('pages.management.rating.update.form.time3')" />
                <BreezeInput id="time3" type="datetime-local" class="mt-1 block w-full" v-model="form.time3" />
                <BreezeInputError :message="form.errors.time3" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="time4" :value="$t('pages.management.rating.update.form.time4')" />
                <BreezeInput id="time4" type="datetime-local" class="mt-1 block w-full" v-model="form.time4" />
                <BreezeInputError :message="form.errors.time4" class="mt-2" />
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

        props: ['rating', 'users'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.rating.name,
                    description: this.rating.description,
                    time1: this.rating.time1,
                    time2: this.rating.time2,
                    time3: this.rating.time3,
                    time4: this.rating.time4,
                    users: this.rating.users ? this.rating.users.map(function(user) {
                        return user.id;
                    }) : null,
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
