<template>
    <BreezeFormSection @submitted="createAssignment">
        <template #title>
            {{ $t('pages.dashboard.assignments.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.assignments.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="$t('pages.dashboard.assignments.create.form.parameter')" />
                <BreezeSelect id="parameter" class="mt-1 block w-full" :value="form.parameter" @input="form.parameter = $event" :options="options.parameter" :multiple="false" />
                <BreezeInputError :message="form.errors.parameter" class="mt-2" />
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

        props: ['assessment', 'employement'],

        data() {
            return {
                form: this.$inertia.form({
                    parameter: null,
                })
            }
        },

        methods: {
            createAssignment() {
                this.form.post(route('assignment.store', {'assessment': this.assessment.id, 'employement': this.employement.id}), {
                    errorBag: 'createAssignment',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['assignments'] })
                });
            },
        },

        computed: {
            options() {
                return {
                    parameter: this.assessment.parameters.map(function(parameter) {
                        return { value: parameter.id, name: parameter.name, description: parameter.description };
                    })
                }
            }
        }
    }
</script>
