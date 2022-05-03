<template>
    <BreezeFormSection @submitted="createRatingApprover">
        <template #title>
            {{ translate('title') }}
        </template>

        <template #description>
            {{ translate('description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="departments" :value="translate('form.departments')" />
                <BreezeSelect id="departments" class="mt-1 block w-full" :value="_form.departments" @input="_form.departments = $event;" :options="options.departments" :multiple="true" />
                <BreezeInputError :message="_form.errors.departments" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="user" :value="translate('form.user')" />
                <BreezeSelect id="user" class="mt-1 block w-full" :value="_form.user" @input="_form.user = $event;" :options="options.user" :multiple="false" />
                <BreezeInputError :message="_form.errors.user" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
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

        props: ['rating', 'departments', 'users', 'translate'],

        data() {
            return {
                _form: this.$inertia.form({
                    department: '',
                    user: '',
                }),
            }
        },

        methods: {
            createRatingApprover() {
                this._form.post(route('rating.approver.store', {'rating': this.rating.id}), {
                    errorBag: 'createRatingApprover',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },
        },

        computed: {
            options() {
                return {
                    'departments': this.departments ? this.departments.map(function(department) {
                        return {
                            'value': department.id,
                            'name': department.name,
                            'description': department.description
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
