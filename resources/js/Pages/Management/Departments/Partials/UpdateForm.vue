<template>
    <BreezeFormSection @submitted="updateDepartment">
        <template #title>
            {{ $t('pages.management.departments.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.departments.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.departments.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.departments.update.form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
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

        props: ['department', 'departments', 'positions'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.department.name,
                    parent: this.department.parent,
                    description: this.department.description,
                    positions: this.get().department.positions,
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
            get() {
                let department = this.department;

                return {
                    department: {
                        positions: department.positions ? department.positions.map(function(position) {
                            return position.id;
                        }) : null
                    }
                }
            }
        },

        computed: {
            options() {
                let departments = this.departments;
                let positions = this.positions;

                return {
                    departments: departments ? departments.map(function(department) {
                        return { value: department.id, name: department.name, description: department.description };
                    }) : null,
                    positions: positions ? positions.map(function(position) {
                        return { value: position.id, name: position.name, description: position.description };
                    }) : null
                }
            },
        }
    }
</script>
