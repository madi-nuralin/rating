<template>
    <breeze-form-section @submitted="updateEmployement">
        <template #title>
            Update employement information
        </template>

        <template #description>
            Update your employement information: select departments and positions.
        </template>

        <template #form>
            <!-- Department -->
            <div class="col-span-6 sm:col-span-4">
                <breeze-label for="department" value="Select department" />
                <breeze-select id="department" class="mt-1 block w-full" :value="form.department.value" @input="selectDepartment" :options="form.department.options" :multiple="false"/>
                <breeze-input-error :message="form.errors.department" class="mt-2" />
            </div>

            <!-- Position -->
            <div class="col-span-6 sm:col-span-4">
                <breeze-label for="position" value="Select position" />
                <breeze-select id="position" class="mt-1 block w-full" :value="form.position.value" @input="form.position.value = $event" :options="form.position.options" :multiple="false"/>
                <breeze-input-error :message="form.errors.position" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="true">
            <breeze-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </breeze-action-message>

            <breeze-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </breeze-button>
        </template>
    </breeze-form-section>
</template>

<script>
    import BreezeActionMessage from '@/Components/ActionMessage'
    import BreezeButton from '@/Components/Button'
    import BreezeFormSection from '@/Components/FormSection'
    import BreezeInput from '@/Components/Input'
    import BreezeInputError from '@/Components/InputError'
    import BreezeLabel from '@/Components/Label'
    import BreezeSelect from '@/Components/Select.vue'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeLabel,
            BreezeSelect
        },

        props: ['employement', 'departments'],

        data() {
            return {
                form: this.$inertia.form({
                    department: {
                        value: this.employement.department.id,
                        options: this.departments ?
                            this.departments.map(
                                function(department) {
                                    return {
                                        value: department.id,
                                        name: department.name,
                                        description: "Input some description",
                                    }
                                }
                            ) : null,
                    },
                    position: {
                        value:
                            this.employement.position ?
                            this.employement.position.id : null,
                        options: 
                            this.employement.department &&
                            this.employement.department.positions ?
                            this.employement.department.positions.map(
                                function(position) {
                                    return {
                                        value: position.id,
                                        name: position.name,
                                        description: "Input some description",
                                    }
                                }
                            ) : null,
                    }
                })
            }
        },

        methods: {
            updateEmployement() {
                this.form.put(route('employement.update', {'id':this.employement.id}), {
                    errorBag: 'updateEmployement',
                    preserveScroll: true
                });
            },
            selectDepartment(event) {
                this.form.department.value = event;

                if (this.form.department.value) {
                    for (var i = 0; i < this.departments.length; i++) {
                        if (this.departments[i].id == this.form.department.value) {
                            this.form.position.value = null;
                            this.form.position.options = this.departments[i].positions ?
                                this.departments[i].positions.map(
                                    function(position) {
                                        return {
                                            value: position.id,
                                            name: position.name,
                                            description: "Input some description"
                                        }
                                    }
                                ) : null;

                            break;
                        }
                    }
                }
            },
        },
    }
</script>
