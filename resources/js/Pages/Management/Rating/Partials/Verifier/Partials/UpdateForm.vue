<template>
    <BreezeFormSection @submitted="updateVerifier">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
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

        props: ['verifier', 'targets', 'users', 'translate'],

        data() {
            return {
                form: this.$inertia.form({
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
