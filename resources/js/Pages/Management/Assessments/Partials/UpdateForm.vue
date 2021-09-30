<template>
    <BreezeFormSection @submitted="updateAssessment">
        <template #title>
            {{ $t('pages.management.assessments.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.assessments.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.assessments.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.assessments.update.form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="valid_from" :value="$t('pages.management.assessments.update.form.validFrom')" />
                <BreezeInput id="valid_from" type="date" class="mt-1 block w-full" v-model="form.valid_from" />
                <BreezeInputError :message="form.errors.valid_from" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="valid_to" :value="$t('pages.management.assessments.update.form.validTo')" />
                <BreezeInput id="valid_to" type="date" class="mt-1 block w-full" v-model="form.valid_to" />
                <BreezeInputError :message="form.errors.valid_to" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="employements" :value="$t('pages.management.assessments.update.form.employements')" />
                <BreezeSelect id="employements" class="mt-1 block w-full" :value="form.employements" @input="form.employements = $event" :options="getEmployementOptions()"/>
                <BreezeInputError :message="form.errors.employements" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="supervisors" :value="$t('pages.management.assessments.update.form.supervisors')" />
                <BreezeSelect id="supervisors" class="mt-1 block w-full" :value="form.supervisors" @input="form.supervisors = $event" :options="getSupervisorOptions()"/>
                <BreezeInputError :message="form.errors.supervisors" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameters" :value="$t('pages.management.assessments.update.form.parameters')" />
                <BreezeSelect id="parameters" class="mt-1 block w-full" :value="form.parameters" @input="form.parameters = $event" :options="getParameterOptions()"/>
                <BreezeInputError :message="form.errors.parameters" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="true">
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </BreezeButton>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeActionMessage from '@/Components/ActionMessage'
    import BreezeButton from '@/Components/Button'
    import BreezeFormSection from '@/Components/FormSection'
    import BreezeInput from '@/Components/Input'
    import BreezeInputError from '@/Components/InputError'
    import BreezeTextarea from '@/Components/Textarea'
    import BreezeSelect from '@/Components/Select'
    import BreezeLabel from '@/Components/Label'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeSelect,
            BreezeLabel,
        },

        props: ['assessment', 'employements', 'supervisors', 'parameters'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.assessment.name,
                    description: this.assessment.description,
                    valid_from: this.assessment.valid_from,
                    valid_to: this.assessment.valid_to,
                    employements: this.getEmployements(),
                    supervisors: this.getSupervisors(),
                    parameters: this.getParameters(),
                })
            }
        },

        methods: {
            updateAssessment() {
                this.form.put(route( 'assessment.update', {'id': this.assessment.id} ), {
                    errorBag: 'updateAssessment',
                    preserveScroll: true
                });
            },
            getEmployements() {
                if (this.assessment.employements) {
                    return this.assessment.employements.map(function(employement) {
                        return employement.id;
                    });
                } else {
                    return null;
                }
            },
            getEmployementOptions() {
                if (this.employements) {
                    return this.employements.map(function(employement) {
                        return {
                            value: employement.id,
                            name: employement.position.name,
                            description: this.$t('pages.management.assessments.update.form.employement.option.description', {department: employement.department.name})
                        };
                    }, {$t: this.$t});
                } else {
                    return null;
                }
            },
            getSupervisors() {
                if (this.assessment.supervisors) {
                    return this.assessment.supervisors.map(function(supervisor) {
                        return supervisor.id;
                    });
                } else {
                    return null;
                }
            },
            getSupervisorOptions() {
                if (this.supervisors) {
                    return this.supervisors.map(function(supervisor) {
                        return {
                            value: supervisor.id,
                            name: supervisor.name,
                            description: supervisor.email
                        };
                    }, {$t: this.$t});
                } else {
                    return null;
                }
            },
            getParameters() {
                if (this.assessment.parameters) {
                    return this.assessment.parameters.map(function(parameter) {
                        return parameter.id;
                    });
                } else {
                    return null;
                }
            },
            getParameterOptions() {
                if (this.parameters) {
                    return this.parameters.map(function(parameter) {
                        return {
                            value: parameter.id,
                            name: parameter.name,
                            description: parameter.description
                        };
                    }, {$t: this.$t});
                } else {
                    return null;
                }
            },
        },
    }
</script>
