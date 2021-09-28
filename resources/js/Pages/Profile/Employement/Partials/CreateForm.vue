<template>
    <BreezeFormSection @submitted="createEmployementInformation">
        <template #title>
            Create a new employement information
        </template>

        <template #description>
            Create a new employement information: select your department and position
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
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeSelect from '@/Components/Select.vue'

    export default {
        components: {
            BreezeButton,
            BreezeActionMessage,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeLabel,
            BreezeSelect,
        },

        props: ['departments'],

        data() {
            return {
                form: this.$inertia.form({
                    department: {
                        value: null,
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
                        value: null,
                        options: null,
                    }
                })
            }
        },

        methods: {
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
            createEmployementInformation() {
                this.form.post(route('employement.store'), {
                    errorBag: 'createEmployementInformation',
                    preserveScroll: true,
                });
            },
        },
    }
</script>
