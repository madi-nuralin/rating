<template>
	<BreezeFormSection @submitted="selectParameterTarget" :has-title="false">
        <template #aside>
            <ShowTitle/>

            <hr class="my-6" />
            <ShowSteps/>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <breeze-label
                    for="parameter_target"
                    :value="$t('pages.wizards.submission.steps.selectParameterTargetStep.form.parameter_target')" />
                <breeze-select 
                    id="parameter_target"
                    :type="'expanded'"
                    :value="form.parameter_target"
                    @input="form.parameter_target = $event"
                    :options="options.parameter_target"
                    :multiple="false" />
                <breeze-input-error
                    :message="form.errors.parameter_target"
                    class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.wizards.submission.steps.selectParameterTargetStep.actions.nextStepButton') }}
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
    import Wizard from "@/Mixins/Wizard";
    import ShowSteps from './ShowSteps.vue'
    import ShowTitle from './ShowTitle.vue'
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
            ShowTitle
        },

        props: ['rating'],

        mixins: [Wizard],

        data() {
            return {
                form: this.$inertia.form({
                	parameter_target: null,
                    rating: this.rating.id,
                }),
            }
        },

        methods: {
            selectParameterTarget() {
                this.form.post(this.url, {
                    errorBag: 'selectParameterTarget',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },
        },

        computed: {
            options() {
                return {
                    'parameter_target': this.rating.parameter_targets ? this.rating.parameter_targets.map(function(parameterTarget) {
                        return {
                            'value': parameterTarget.id,
                            'name': parameterTarget.name,
                            'description': parameterTarget.description
                        };
                    }) : null
                };
            }
        }
    }
</script>