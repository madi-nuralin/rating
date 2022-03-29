<template>
    <BreezeFormSection @submitted="createForm">
        <template #title>
            {{ $t('pages.forms.form.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.forms.form.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.forms.form.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.forms.form.create.form.description')" />
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.forms.form.create.actions.createButton') }}
            </BreezeButton>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeTextarea from '@/Components/Textarea.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            BreezeButton,
            BreezeButtonSecondary,
            BreezeButtonDanger,
            BreezeActionMessage,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                })
            }
        },

        methods: {
            createForm() {
                this.form.post(route('form.store'), {
                    errorBag: 'createForm',
                    preserveScroll: true,
                });
            },
        },
    }
</script>
