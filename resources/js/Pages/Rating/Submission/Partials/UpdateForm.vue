<template>
    <BreezeFormSection @submitted="updateSubmission">
        <template #title>
            {{ $t('pages.management.rating.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.rating.update.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <p>{{ submission.parameter.target.name }}</p>
            </div>
            
            <div class="col-span-6 sm:col-span-4">
                <p>{{ submission.parameter.name }}</p>
            </div>
            <!--div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.rating.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div-->
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

        props: ['submission'],

        data() {
            return {
                form: this.$inertia.form({
                    //name: this.rating.name,
                })
            }
        },

        methods: {
            updateSubmission() {
                this.form.put(route('submission.update', {'id': this.submission.id}), {
                    errorBag: 'updateSubmission',
                    preserveScroll: true
                });
            },
        },
        
        computed: {
            options() {
                return {
                    //
                };
            },
        },
    }
</script>
