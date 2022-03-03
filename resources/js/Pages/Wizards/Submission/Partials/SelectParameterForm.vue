<template>
    <BreezeFormSection @submitted="selectParameter" :has-title="false">
        <template #aside>
            <ShowTitle/>

            <hr class="my-6" />
            <ShowSteps/>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <breeze-label
                    for="parameter"
                    :value="$t('pages.wizards.submission.steps.selectParameterStep.form.parameter')" />
                <breeze-select 
                    id="parameter"
                    :type="'expanded'"
                    :value="form.parameter"
                    @input="form.parameter = $event"
                    :options="options.parameter"
                    :multiple="false" />
                <breeze-input-error 
                    :message="form.errors.parameter"
                    class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.wizards.submission.steps.selectParameterStep.actions.nextStepButton') }}
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
    import ShowSteps from './ShowSteps.vue'
    import ShowTitle from './ShowTitle.vue'
    import Wizard from "@/Mixins/Wizard";
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
            ShowSteps,
            ShowTitle,
        },

        props: ['parameters'],

        mixins: [Wizard],

        data() {
            return {
                form: this.$inertia.form({
                	parameter: null,
                }),
            }
        },

        methods: {
            selectParameter() {
                this.form.post(this.url, {
                    errorBag: 'selectParameter',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },
        },

        computed: {
            options() {
                return {
                    'parameter': this.parameters ? this.parameters.map(function(parameter) {
                        return {
                            'value': parameter.id,
                            'name': parameter.name,
                            'description': parameter.description
                        };
                    }) : null
                };
            }
        }
    }
</script>