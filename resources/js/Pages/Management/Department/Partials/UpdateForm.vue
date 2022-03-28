<template>
    <BreezeFormSection @submitted="updateDepartment">
        <template #title>
            {{ $t('pages.management.department.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.department.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.department.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.department.update.form.description')" />
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="abbreviation" :value="$t('pages.management.department.update.form.abbreviation')" />
                <BreezeInput id="abbreviation" type="text" class="mt-1 block w-full" v-model="form.abbreviation" />
                <BreezeInputError :message="form.errors.abbreviation" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="department_type" :value="$t('pages.management.department.update.form.department_type')" />
                <BreezeSelect id="department_type" class="mt-1 block w-full" :value="form.department_type" @input="form.department_type = $event" :options="options.department_type" :multiple="false" :type="'expanded'" />
                <BreezeInputError :message="form.errors.department_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="positions" :value="$t('pages.management.department.update.form.positions')" />
                <BreezeSelect id="positions" class="mt-1 block w-full" :value="form.positions" @input="form.positions = $event" :options="options.positions"/>
                <BreezeInputError :message="form.errors.positions" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parent" :value="$t('pages.management.department.update.form.parent')" />
                <BreezeSelect id="parent" class="mt-1 block w-full" :value="form.parent" @input="form.parent = $event" :options="options.departments" :multiple="false"/>
                <BreezeInputError :message="form.errors.parent" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="true">
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                {{ $t('pages.management.department.update.actions.savedMessage') }}
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.management.department.update.actions.saveButton') }}
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

        props: ['department', 'departments', 'departmentTypes', 'positions'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.department.name,
                    description: this.department.description,
                    abbreviation: this.department.abbreviation,
                    parent: this.department.parent,
                    department_type: this.department.department_type.id,
                    positions: this.department.positions ? this.department.positions.map(function(position) {
                        return position.id;
                    }) : null
                }),
            }
        },

        methods: {
            updateDepartment() {
                this.form.put(route( 'department.update', {'id': this.department.id} ), {
                    errorBag: 'updateDepartment',
                    preserveScroll: true
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
