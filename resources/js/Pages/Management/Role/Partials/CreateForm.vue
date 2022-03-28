<template>
    <BreezeFormSection @submitted="createRole">
        <template #title>
            {{ $t('pages.management.role.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.role.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.role.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.role.create.form.description')" />
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="context" :value="$t('pages.management.role.create.form.context')" />
                <BreezeInput id="context" type="text" class="mt-1 block w-full" v-model="form.context" />
                <BreezeInputError :message="form.errors.context" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="users" :value="$t('pages.management.role.create.form.users')" />
                <BreezeSelect id="users" class="mt-1 block w-full" :value="form.users" @input="form.users = $event" :options="options.users" :multiple="true" />
                <BreezeInputError :message="form.errors.users" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.management.role.create.actions.createButton') }}
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
    import BreezeSelect from '@/Components/Select.vue'
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
            BreezeSelect
        },

        props: ['users'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    context: '',
                    users: ''
                })
            }
        },

        methods: {
            createRole() {
                this.form.post(route('role.store'), {
                    errorBag: 'createRole',
                    preserveScroll: true,
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
                            'description': user.email,
                        };
                    }) : null
                };
            }
        },
    }
</script>
