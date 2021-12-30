<template>
    <BreezeFormSection @submitted="createVerifier">
        <template #title>
            {{ $t('pages.management.verifier.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.verifier.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="rating" :value="$t('pages.management.verifier.create.form.rating')" />
                <BreezeSelect id="rating" class="mt-1 block w-full" :value="form.rating" @input="form.rating = $event" :options="options.rating" :multiple="false" />
                <BreezeInputError :message="form.errors.rating" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="target" :value="$t('pages.management.verifier.create.form.target')" />
                <BreezeSelect id="target" class="mt-1 block w-full" :value="form.target" @input="form.target = $event" :options="options.target" :multiple="false" />
                <BreezeInputError :message="form.errors.target" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="user" :value="$t('pages.management.verifier.create.form.user')" />
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

        props: ['ratings', 'targets', 'users'],

        data() {
            return {
                form: this.$inertia.form({
                    rating: '',
                    target: '',
                    user: ''
                })
            }
        },

        methods: {
            createVerifier() {
                this.form.post(route('verifier.store'), {
                    errorBag: 'createVerifier',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },
        },

        computed: {
            options() {
                return {
                    'rating': this.ratings ? this.ratings.map(function(rating) {
                        return {
                            'value': rating.id,
                            'name': rating.name,
                            'description': rating.description
                        };
                    }) : null,
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
