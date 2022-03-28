<template>
    <BreezeFormSection @submitted="createEmployement">
        <template #title>
            {{ $t('pages.management.employement.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.employement.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="employement_type" :value="$t('pages.management.employement.update.form.employement_type')" />
                <BreezeSelect id="employement_type" class="mt-1 block w-full" :value="form.employement_type" @input="form.employement_type = $event" :options="options.employement_type" :multiple="false" />
                <BreezeInputError :message="form.errors.employement_type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="department" :value="$t('pages.management.employement.update.form.department')" />
                <BreezeSelect id="department" class="mt-1 block w-full" :value="form.department" @input="selectDepartment" :options="options.department" :multiple="false" />
                <BreezeInputError :message="form.errors.department" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="position" :value="$t('pages.management.employement.update.form.position')" />
                <BreezeSelect id="position" class="mt-1 block w-full" :value="form.position" @input="form.position = $event" :options="options.position" :multiple="false" />
                <BreezeInputError :message="form.errors.position" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="user" :value="$t('pages.management.employement.update.form.user')" />
                <BreezeSelect id="user" class="mt-1 block w-full" :value="form.user" @input="form.user = $event" :options="options.user" :multiple="false" />
                <BreezeInputError :message="form.errors.user" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="appointed_at" :value="$t('pages.management.employement.update.form.appointed_at')" />
                <BreezeInput id="appointed_at" type="date" class="mt-1 block w-full" v-model="form.appointed_at" />
                <BreezeInputError :message="form.errors.appointed_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="terminated_at" :value="$t('pages.management.employement.update.form.terminated_at')" />
                <BreezeInput id="terminated_at" type="date" class="mt-1 block w-full" v-model="form.terminated_at" />
                <BreezeInputError :message="form.errors.terminated_at" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.management.employement.create.actions.createButton') }}
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

        props: ['employementTypes', 'departments', 'users'],

        data() {
            return {
                form: this.$inertia.form({
                    employement_type: '',
                    department: '',
                    position: '',
                    user: '',
                    appointed_at: '',
                    terminated_at: '',
                }),
                department: '',
            }
        },

        methods: {
            createEmployement() {
                this.form.post(route('employement.store'), {
                    errorBag: 'createEmployement',
                    preserveScroll: true,
                });
            },

            selectDepartment(event) {
                this.form.department = event;

                for (const department of this.departments) {
                    if (department.id === this.form.department) {
                        this.department = department;
                        break;
                    }
                }
            }
        },

        computed: {
            options() {
                return {
                    'employement_type': this.employementTypes ? this.employementTypes.map(function(employementType) {
                        return {
                            'value': employementType.id,
                            'name': employementType.name,
                            'description': employementType.description,
                        };
                    }) : null,
                    'department': this.departments ? this.departments.map(function(department) {
                        return {
                            'value': department.id,
                            'name': department.name,
                            'description': department.department_type.name,
                        };
                    }) : null,
                    'position': this.department && this.department.positions ? this.department.positions.map(function(position) {
                        return {
                            'value': position.id,
                            'name': position.name,
                            'description': position.description,
                        };
                    }) : null,
                    'user': this.users ? this.users.map(function(user) {
                        return {
                            'value': user.id,
                            'name': user.name,
                            'description': user.email,
                        };
                    }) : null,
                };
            }
        },
    }
</script>
