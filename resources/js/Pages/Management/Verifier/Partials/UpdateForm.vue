<template>
    <BreezeFormSection @submitted="updateVerifier">
        <template #title>
            {{ $t('pages.management.verifier.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.verifier.update.description') }}
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

        props: ['verifier', 'ratings', 'targets', 'users'],

        data() {
            return {
                form: this.$inertia.form({
                    rating: this.verifier.rating.id,
                    target: this.verifier.target.id,
                    user: this.verifier.user.id
                })
            }
        },

        methods: {
            updateVerifier() {
                this.form.put(route('verifier.update', {'id': this.verifier.id}), {
                    errorBag: 'updateVerifier',
                    preserveScroll: true
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
        },
    }
</script>
