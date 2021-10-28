<template>
    <BreezeFormSection @submitted="createActivity">
        <template #title>
            {{ $t('pages.dashboard.activities.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.dashboard.activities.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter" :value="t('form.parameter')" />
                <BreezeSelect id="parameter" class="mt-1 block w-full" :value="form.parameter" @input="this.form.parameter = $event" :options="options.parameters" :multiple="false" />
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
    import BreezeSelect from '@/Components/Select.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButton,
            BreezeActionMessage,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeSelect,
            BreezeTextarea,
            BreezeLabel,
        },

        props: ['assignment'],

        data() {
            return {
                form: this.$inertia.form({
                    parameter: null,
                })
            }
        },

        methods: {
            createActivity() {
                this.form.post(route('activity.store', {'assignment': this.assignment.id}), {
                    errorBag: 'createActivity',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['activities'] })
                });
            },

            t(p) {
                return this.$t('pages.dashboard.activities.create.' + p);
            }
        },

        computed: {
            options() {
                let parameters = this.assignment.assessment.parameters.map(function(parameter) {
                    return { value: parameter.id, name: parameter.name, description: parameter.description };
                });

                return {'parameters': parameters};
            }
        }
    }
</script>
