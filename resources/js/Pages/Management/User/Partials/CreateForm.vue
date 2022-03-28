<template>
    <BreezeFormSection @submitted="createUser">
        <template #title>
            {{ $t('pages.management.user.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.user.create.description') }}
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.user.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="email" :value="$t('pages.management.user.create.form.email')" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <BreezeInputError :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Firstname -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="firstname" :value="$t('pages.management.user.create.form.firstname')" />
                <BreezeInput id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" />
                <BreezeInputError :message="form.errors.firstname" class="mt-2" />
            </div>

            <!-- Lastname -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="lastname" :value="$t('pages.management.user.create.form.lastname')" />
                <BreezeInput id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" />
                <BreezeInputError :message="form.errors.lastname" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="roles" :value="$t('pages.management.user.update.form.roles')" />
                <BreezeSelect id="roles" :type="'expanded'" class="mt-1 block w-full" :value="form.roles" @input="form.roles = $event" :options="options.roles"/>
                <BreezeInputError :message="form.errors.roles" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.management.user.create.actions.createButton') }}
            </BreezeButton>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeSelect from '@/Components/Select.vue'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeLabel,
            BreezeButtonSecondary,
            BreezeSelect,
        },

        props: ['roles'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    firstname: '',
                    lastname: '',
                    roles: '',
                }),
            }
        },

        methods: {
            createUser() {
                this.form.post(route('user.store'), {
                    errorBag: 'createUser',
                    preserveScroll: true,
                });
            },
        },

        computed: {
            options() {
                return {
                    'roles': this.roles ? this.roles.map(function(role) {
                        return {
                            'value': role.id,
                            'name': role.name,
                            'description': role.description,
                        };
                    }) : null
                };
            }
        }
    }
</script>