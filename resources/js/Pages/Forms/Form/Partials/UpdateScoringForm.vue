<template>
    <BreezeFormSection @submitted="updateScoringForm">
        <template #title>
            {{ $t('pages.forms.form.updateScoring.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.form.updateScoring.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="scoring" :value="$t('pages.forms.form.updateScoring.form.scoring')" />
                <BreezeSelect id="scoring" class="mt-1 block w-full" :value="_form.scoring" @input="_form.scoring = $event" :options="options.scoring" :multiple="false" />
                <BreezeInputError :message="_form.errors.scoring" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="_form.scoring == 'by_constant'">
                <BreezeLabel for="score" :value="$t('pages.forms.form.updateScoring.form.score')" />
                <BreezeInput id="score" type="text" class="mt-1 block w-full" v-model="_form.score" />
                <BreezeInputError :message="_form.errors.score" class="mt-2" />
            </div>

            <template v-if="_form.scoring == 'by_math_expression'">
                <div class="col-span-6 sm:col-span-4">
                    <BreezeLabel for="math_expression" :value="$t('pages.forms.form.updateScoring.form.math_expression')" />
                    <BreezeInput id="math_expression" type="text" class="mt-1 block w-full" v-model="_form.math_expression" />
                    <BreezeInputError :message="_form.errors.math_expression" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <div class="text-sm text-gray-400">
                        <span class="">{{ $t('pages.forms.form.updateScoring.form.variables') }}</span>
                        <ul class="list-disc list-inside mt-2">
                            <li v-for="field in form.fields.data">
                                {{ field.label }} - {{ field.variable }}
                            </li>
                        </ul>
                    </div>
                </div>
            </template>
        </template>

        <template #actions>
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                {{ $t('pages.forms.form.updateScoring.actions.savedMessage') }}
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
                {{ $t('pages.forms.form.updateScoring.actions.saveButton') }}
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

        props: ['form'],

        data() {
            return {
                _form: this.$inertia.form({
                    scoring: this.form.scoring,
                    score: this.form.score,
                    math_expression: this.form.math_expression
                })
            }
        },

        methods: {
            updateScoringForm() {
                this._form.put(route('form.updateScoring', {'id': this.form.id}), {
                    errorBag: 'updateScoringForm',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['parameters'] })
                });
            },
        },

        computed: {
            options() {
                return {
                    'scoring': Array('disabled', 'by_constant', 'by_math_expression').map(function(scoring) {
                        return {
                            value: scoring,
                            name: this.$t(`pages.forms.form.updateScoring.scoring.${scoring}.name`),
                            description: this.$t(`pages.forms.form.updateScoring.scoring.${scoring}.description`)
                        };
                    }, {$t: this.$t})
                };
            }
        }
    }
</script>
