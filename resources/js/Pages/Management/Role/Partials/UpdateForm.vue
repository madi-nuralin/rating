<template>
    <BreezeFormSection @submitted="updateRole">
        <template #title>
            {{ $t('pages.management.role.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.role.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.role.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.role.update.form.description')" />
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="context" :value="$t('pages.management.role.create.form.context')" />
                <BreezeInput id="context" type="text" class="mt-1 block w-full" v-model="form.context" :disabled="true"/>
                <BreezeInputError :message="form.errors.context" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="users" :value="$t('pages.management.role.update.form.users')" />
                <BreezeSelect id="users" class="mt-1 block w-full" :value="form.users" @input="form.users = $event" :options="options.users" :multiple="true" />
                <BreezeInputError :message="form.errors.users" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="true">
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                {{ $t('pages.management.role.update.actions.savedMessage') }}
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.management.role.update.actions.saveButton') }}
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
    import BreezeSelect from '@/Components/Select.vue'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeSelect,
        },

        props: ['role', 'users'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.role.name,
                    description: this.role.description,
                    context: this.role.context,
                    users: this.role.users ? this.role.users.map(function(user) {
                        return user.id;
                    }) : null
                })
            }
        },

        methods: {
            updateRole() {
                this.form.put(route( 'role.update', {'id': this.role.id} ), {
                    errorBag: 'updateRole',
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
                    }) : null
                };
            }
        },
    }
</script>
