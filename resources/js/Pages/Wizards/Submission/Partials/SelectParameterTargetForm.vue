<template>
	<BreezeFormSection @submitted="selectParameterTarget" :has-title="false">
        <template #aside>
            <ShowTitle/>

            <hr class="my-6" />
            <ShowSteps/>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <breeze-label for="parameter_target" :value="$t('pages.wizards.submission.steps.selectParameterTargetStep.form.parameter_target')" />
                <breeze-input-error :message="form.errors.parameter_target" class="mt-2" />

                <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                    <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(rating.parameter_targets).length - 1}"
                                    @click="form.parameter_target = parameter_target.id"
                                    v-for="(parameter_target, i) in rating.parameter_targets"
                                    :key="parameter_target.id">
                        <div :class="{'opacity-50': form.parameter_target && form.parameter_target != parameter_target.id}">
                            <!-- Name -->
                            <div class="flex items-center">
                                <div class="text-sm text-gray-600 text-left"
                                    :class="{'font-semibold': form.parameter_target == parameter_target.id}">
                                    {{ parameter_target.name }}
                                </div>

                                <svg v-if="form.parameter_target == parameter_target.id"
                                    class="ml-2 h-5 w-5 text-green-400"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>

                            <!-- Description -->
                            <div class="mt-2 text-xs text-gray-600 text-left">
                                {{ parameter_target.description }}
                            </div>
                        </div>
                    </button>
                </div>
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
    }
</script>