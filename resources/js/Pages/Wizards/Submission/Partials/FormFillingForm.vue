<template>
    <BreezeFormSection @submitted="selectFormFilling" :has-title="false">
        <template #aside>
            <ShowTitle/>

            <hr class="my-6" />
            <ShowSteps />
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4" v-for="field in form.fields" v-if="form && form.fields">
                <BreezeLabel :for="FIELD[field.id]" :value="field.label" />

                <BreezeInput v-if="field.type == 'number'"
                    :id="FIELD[field.id]"
                    type="text"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'text'"
                    :id="FIELD[field.id]"
                    type="text"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeTextarea v-else-if="field.type == 'textarea'"
                    :id="FIELD[field.id]"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'email'"
                    :id="FIELD[field.id]"
                    type="email"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'url'"
                    :id="FIELD[field.id]"
                    type="url"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeSelect v-else-if="field.type == 'select'"
                    :id="FIELD[field.id]"
                    :multiple="false"
                    :value="_form[FIELD[field.id]]"
                    @input="_form[FIELD[field.id]] = $event"
                    :options="options[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeSelect v-else-if="field.type == 'multiselect'"
                    :id="FIELD[field.id]"
                    :multiple="true"
                    :value="_form[FIELD[field.id]]"
                    @input="_form[FIELD[field.id]] = $event"
                    :options="options[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeFile v-else-if="field.type == 'file'"
                    :id="FIELD[field.id]"
                    :value="_form[FIELD[field.id]]"
                    @input="_form[FIELD[field.id]] = $event;"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'time'"
                    :id="FIELD[field.id]"
                    type="time"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'date'"
                    :id="FIELD[field.id]"
                    type="date"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInput v-else-if="field.type == 'datetime'"
                    :id="FIELD[field.id]"
                    type="datetime-local"
                    v-model="_form[FIELD[field.id]]"
                    class="mt-1 block w-full" />

                <BreezeInputError :message="_form.errors[FIELD[field.id]]" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <ShowScoringBoard :form="form" :status="'undefined'" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
                {{ $t('pages.wizards.submission.steps.formFillingStep.actions.saveButton') }}
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
    import BreezeFile from '@/Components/InputFile.vue'
    import ShowSteps from './ShowSteps.vue'
    import ShowTitle from './ShowTitle.vue'
    import ShowScoringBoard from '@/Pages/Dashboard/Submission/Partials/ShowScoringBoard.vue'
    import { Inertia } from '@inertiajs/inertia'
    import { ref, reactive } from 'vue'

    import Wizard from "@/Mixins/Wizard";

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
            BreezeFile,
            ShowSteps,
            ShowTitle,
            ShowScoringBoard
        },

        props: ['form'],

        mixins: [Wizard],

        setup(props) {
            const INIT = [];
            const FIELD = [];

            if (props.form) {
                for (const field of props.form.fields) {
                    FIELD[field.id] = `field${field.id}`;
                    INIT[FIELD[field.id]] = null;
                }
            }

            return {
                INIT,
                FIELD,
            };
        },

        data() {
            return {
                _form: this.$inertia.form(this.INIT),
            }
        },

        methods: {
            selectFormFilling() {
                this._form.post(this.url, {
                    _method: 'put',
                    errorBag: 'selectFormFilling',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['positions'] })
                });
            },
        },

        computed: {
            options() {
                let _options = [];

                for (const field of this.form.fields) {
                    _options[this.FIELD[field.id]] = field.options ?
                        field.options.map(function(option) {
                            return {
                                'value': option.id,
                                'name': option.name,
                                'description': option.description
                            };
                        }) : [];
                }

                return _options;
            }
        },
    }
</script>