<template>
    <BreezeFormSection @submitted="createParameter">
        <template #title>
            {{ $t('pages.management.parameters.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.parameters.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.parameters.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.parameters.create.form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="category" :value="$t('pages.management.departments.update.form.category')" />
                <BreezeSelect id="category" class="mt-1 block w-full" :value="form.category" @input="form.category = $event" :options="options.category" :multiple="false" />
                <BreezeInputError :message="form.errors.category" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="score" :value="$t('pages.management.parameters.create.form.score')" />
                <BreezeInput id="score" type="text" class="mt-1 block w-full" v-model="form.score" />
                <BreezeInputError :message="form.errors.score" class="mt-2" />
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

        props: ['categories'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    category: '',
                    score: '',
                })
            }
        },

        methods: {
            createParameter() {
                this.form.post(route('parameter.store'), {
                    errorBag: 'createParameter',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['parameters'] })
                });
            },
        },

        computed: {
            options() {
                let categories = this.categories;

                return {
                    category: categories ? categories.map(function(category) {
                        return { value: category.id, name: category.name, description: category.description };
                    }) : null
                }
            },
        },
    }
</script>
