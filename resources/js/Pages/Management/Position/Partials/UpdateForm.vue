<template>
    <BreezeFormSection @submitted="updatePosition">
        <template #title>
            {{ $t('pages.management.position.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.position.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.position.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.position.update.form.description')" />
                <BreezeTextarea id="description" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>
        </template>

        <template #actions v-if="true">
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                {{ $t('pages.management.position.update.actions.savedMessage') }}
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.management.position.update.actions.saveButton') }}
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
    import BreezeLabel from '@/Components/Label'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
        },

        props: ['position'],

        data() {
            return {
                form: this.$inertia.form({
                    name: this.position.name,
                    description: this.position.description,
                })
            }
        },

        methods: {
            updatePosition() {
                this.form.put(route( 'position.update', {'id': this.position.id} ), {
                    errorBag: 'updatePosition',
                    preserveScroll: true
                });
            },
        },
    }
</script>
