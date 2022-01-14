<template>
    <BreezeFormSection @submitted="selectParameter" :has-title="false">
        <template #aside>
            <div>
                <h3 class="text-lg font-medium text-gray-900">
                   Добавить действие
                </h3>

                <p class="mt-1 text-sm text-gray-600">
                    Заполнение листа оценки, добавить действие
                </p>
            </div>

            <hr class="my-6" />
            <show-steps />
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <breeze-label for="parameter" value="Parameter" />
                <breeze-input-error :message="form.errors.parameter" class="mt-2" />

                <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                    <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(parameters).length - 1}"
                                    @click="form.parameter = parameter.id"
                                    v-for="(parameter, i) in parameters"
                                    :key="parameter.id">
                        <div :class="{'opacity-50': form.parameter && form.parameter != parameter.id}">
                            <!-- Name -->
                            <div class="flex items-center">
                                <div class="text-sm text-gray-600 text-left"
                                    :class="{'font-semibold': form.parameter == parameter.id}">
                                    {{ parameter.name }}
                                </div>

                                <svg v-if="form.parameter == parameter.id"
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
                                {{ parameter.description }}
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
    import ShowSteps from './ShowSteps.vue'
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
            ShowSteps
        },

        props: ['parameters'],

        data() {
            return {
                form: this.$inertia.form({
                	parameter: null,
                }),
            }
        },

        methods: {
            selectParameter() {
                this.form.post(route('wizard.submission.store'), {
                    errorBag: 'selectParameter',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
                console.log(this.$page.props.errors);
            },
        },
    }
</script>