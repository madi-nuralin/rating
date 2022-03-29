<template>
    <BreezeFormSection @submitted="createParameter">
        <template #title>
            {{ $t('pages.management.parameter.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.parameter.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.parameter.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.parameter.create.form.description')" />
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="parameter_target" :value="$t('pages.management.parameter.create.form.parameter_target')" />
                <BreezeSelect id="parameter_target" class="mt-1 block w-full" :value="form.parameter_target" @input="form.parameter_target = $event" :options="options.parameter_target" :multiple="false" />
                <BreezeInputError :message="form.errors.parameter_target" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.management.parameter.create.actions.createButton') }}
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

        props: ['parameterTargets'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    parameter_target: '',
                })
            }
        },

        methods: {
            createParameter() {
                this.form.post(route('parameter.store'), {
                    errorBag: 'createParameter',
                    preserveScroll: true,
                });
            },
        },

        computed: {
            options() {
                return {
                    parameter_target: this.parameterTargets ? this.parameterTargets.map(function(parameterTarget) {
                        return {
                            'value': parameterTarget.id,
                            'name': parameterTarget.name,
                            'description': parameterTarget.description
                        };
                    }) : null
                }
            },
        },
    }
</script>
