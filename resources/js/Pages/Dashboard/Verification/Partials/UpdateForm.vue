<template>
    <BreezeFormSection :has-title="false" @submitted="updateVerification">
        <template #aside>
            <div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                   {{ translate('title') }}
                </h3>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-500">
                    {{ translate('description') }}
                </p>
            </div>

            <div>
            	<hr class="my-6" />
                <ShowStatus :verification="verification" />

                <hr class="my-6" />
                <ShowScoringBoard :form="verification.submission.parameter.form" :score="verification.submission.score" :view="'third_party'" :verifications="verification.submission.verifications"/>

                <!--hr class="my-6" />
                <ShowVerifications :submission="submission" /-->
            </div>
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <p>{{ verification.submission.parameter.target.name }}</p>
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <p>{{ verification.submission.parameter.name }}</p>
            </div>

            <div class="col-span-6 sm:col-span-4" v-for="field in verification.submission.parameter.form.fields" v-if="verification.submission.parameter.form && verification.submission.parameter.form.fields">
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
                    :destroy="route('submission-file.destroy', {'submission':verification.submission.id, 'form_field': field.id})"
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
        </template>

        <template #actions v-if="true">
            <BreezeActionMessage :on="_form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton type="button" @click="confirmVerification">
                {{ translate('actions.makeOrChangeDecisionButton') }}
            </BreezeButton>

             <!-- Confirmation Modal -->
            <breeze-modal-confirmation :show="confirmingVerification" @close="confirmingVerification = false">
                <template #title>
                    {{ translate('actions.modal.title') }}
                </template>

                <template #content>
                	<div class="grid grid-cols-6 gap-6 text-left">
	                    <div class="col-span-6 sm:col-span-4">
			                <breeze-label for="verification_status" :value="translate('actions.modal.content.verification_status')" />
			                <breeze-input-error :message="_form.errors.verification_status" class="mt-2" />

			                <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
			                    <button type="button" class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
			                                    :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(verificationStatuses).length - 1}"
			                                    @click="_form.verification_status = verification_status.id"
			                                    v-for="(verification_status, i) in verificationStatuses"
			                                    :key="verification_status.id">
			                        <div :class="{'opacity-50': _form.verification_status && _form.verification_status != verification_status.id}">
			                            <!-- Name -->
			                            <div class="flex items-center">
			                                <div class="text-sm text-gray-600 text-left"
			                                    :class="{'font-semibold': _form.verification_status == verification_status.id}">
			                                    {{ verification_status.verb }}
			                                </div>

			                                <svg v-if="_form.verification_status == verification_status.id"
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
			                            <!--div class="mt-2 text-xs text-gray-600 text-left">
			                            </div-->
			                        </div>
			                    </button>
			                </div>
			            </div>

			            <div class="col-span-6 sm:col-span-4">
			                <breeze-label for="message" :value="translate('actions.modal.content.message')" />
			                <breeze-textarea id="message" v-model="_form.message" class="mt-1 block w-full" />
			                <breeze-input-error :message="_form.errors.message" class="mt-2" />
			            </div>
			        </div>
                </template>

                <template #footer>
                    <breeze-button-secondary @click="confirmingVerification = false">
                        {{ translate('actions.modal.footer.cancelButton') }}
                    </breeze-button-secondary>

                    <breeze-button-danger class="ml-2" @click="updateVerification" :class="{ 'opacity-25': _form.processing }" :disabled="_form.processing">
                        {{ translate('actions.modal.footer.updateButton') }}
                    </breeze-button-danger>
                </template>
            </breeze-modal-confirmation>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeActionMessage from '@/Components/ActionMessage'
    import BreezeModalConfirmation from '@/Components/ModalConfirmation'
    import BreezeButton from '@/Components/Button'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeFormSection from '@/Components/FormSection'
    import BreezeInput from '@/Components/Input'
    import BreezeInputError from '@/Components/InputError'
    import BreezeTextarea from '@/Components/Textarea'
    import BreezeSelect from '@/Components/Select'
    import BreezeLabel from '@/Components/Label'
    import BreezeFile from '@/Components/InputFile'
    import ShowScoringBoard from '../../Submission/Partials/ShowScoringBoard.vue'
    //import ShowVerifications from './ShowVerifications.vue'
    import ShowStatus from './ShowStatus.vue'

    export default {
        components: {
            BreezeActionMessage,
            BreezeModalConfirmation,
            BreezeButton,
            BreezeButtonSecondary,
            BreezeButtonDanger,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeSelect,
            BreezeLabel,
            BreezeFile,
            ShowScoringBoard,
            //ShowVerifications
            ShowStatus,
        },

        props: ['verification', 'verificationStatuses', 'translate'],

        setup(props) {
            const INIT = [];
            const FIELD = [];

            INIT['verification_status'] = '';
            INIT['message'] = '';

            if (props.verification.submission.parameter.form) {
                for (const field of props.verification.submission.parameter.form.fields) {
                    FIELD[field.id] = `field${field.id}`;
                    INIT[FIELD[field.id]] = field.responce.value;
                }
            }

            return {
                INIT,
                FIELD,
            };
        },

        data() {
            return {
            	confirmingVerification: false,

                _form: this.$inertia.form(this.INIT),
            }
        },

        methods: {
        	confirmVerification() {
                this.confirmingVerification = true
            },
            updateVerification() {
                this._form.put(route('verification.update', {'id': this.verification.id}), {
                    errorBag: 'updateVerification',
                    preserveScroll: true,
                    onSuccess: () => this.confirmingVerification = false
                });
            },
        },
        
        computed: {
            options() {
                let _options = [];

                for (const field of this.verification.submission.parameter.form.fields) {
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
