<template>
    <BreezeFormSection @submitted="createVerifier">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form><div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="target" :value="translate('form.target')" />
                <BreezeSelect id="target" class="mt-1 block w-full" :value="form.target" @input="form.target = $event" :options="options.target" :multiple="false" />
                <BreezeInputError :message="form.errors.target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="user" :value="translate('form.user')" />
                <BreezeSelect id="user" class="mt-1 block w-full" :value="form.user" @input="form.user = $event" :options="options.user" :multiple="false" />
                <BreezeInputError :message="form.errors.user" class="mt-2" />
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
            BreezeSelect,
        },

        props: ['rating', 'targets', 'users', 'translate'],

        data() {
            return {
                form: this.$inertia.form({
                    target: '',
                    user: ''
                })
            }
        },

        methods: {
            createVerifier() {
                this.form.post(route('rating.verifier.store', {'rating': this.rating.id}), {
                    errorBag: 'createVerifier',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },
        },

        computed: {
            options() {
                return {
                    'target': this.targets ? this.targets.map(function(target) {
                        return {
                            'value': target.id,
                            'name': target.name,
                            'description': target.description
                        };
                    }) : null,
                    'user': this.users ? this.users.map(function(user) {
                        return {
                            'value': user.id,
                            'name': user.name,
                            'description': user.email
                        };
                    }) : null, 
                }
            },
        }
    }
</script>
