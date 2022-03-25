<template>
    <BreezeFormSection @submitted="createDepartment">
        <template #title>
            {{ $t('pages.management.departments.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.departments.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.departments.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.departments.create.form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="abbreviation" :value="$t('pages.management.departments.create.form.abbreviation')" />
                <BreezeInput id="abbreviation" type="text" class="mt-1 block w-full" v-model="form.abbreviation" />
                <BreezeInputError :message="form.errors.abbreviation" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="department_type" :value="$t('pages.management.departments.update.form.department_type')" />
                <BreezeSelect id="department_type" class="mt-1 block w-full" :value="form.department_type" @input="form.department_type = $event" :options="options.department_type" :multiple="false" :type="'expanded'" />
                <BreezeInputError :message="form.errors.department_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="positions" :value="$t('pages.management.departments.update.form.positions')" />
                <BreezeSelect id="positions" class="mt-1 block w-full" :value="form.positions" @input="form.positions = $event" :options="options.positions"/>
                <BreezeInputError :message="form.errors.positions" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parent" :value="$t('pages.management.departments.update.form.parent')" />
                <BreezeSelect id="parent" class="mt-1 block w-full" :value="form.parent" @input="form.parent = $event" :options="options.departments" :multiple="false"/>
                <BreezeInputError :message="form.errors.parent" class="mt-2" />
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
    import BreezeSelect from '@/Components/Select'
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

        props: ['departments', 'departmentTypes', 'positions'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    abbreviation: '',
                    parent: '',
                    department_type: '',
                    positions: ''
                })
            }
        },

        methods: {
            createDepartment() {
                this.form.post(route('department.store'), {
                    errorBag: 'createDepartment',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['departments'] })
                });
            },
        },

        computed: {
            options() {
                let departments = this.departments;
                let positions = this.positions;
                let departmentTypes = this.departmentTypes;

                return {
                    department_type: departmentTypes ? departmentTypes.map(function($departmentType) {
                        return {
                            'value': $departmentType.id,
                            'name': $departmentType.name,
                            'description': $departmentType.description
                        };
                    }) : null,
                    departments: departments ? departments.map(function(department) {
                        return {
                            'value': department.id,
                            'name': department.name,
                            'description': department.description
                        };
                    }) : null,
                    positions: positions ? positions.map(function(position) {
                        return {
                            'value': position.id,
                            'name': position.name,
                            'description': position.description
                        };
                    }) : null
                }
            },
        }
    }
</script>
