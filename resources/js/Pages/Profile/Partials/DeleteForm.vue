<template>
    <BreezeActionSection>
        <template #title>
            {{ $t('pages.profile.delete.title') }}
        </template>

        <template #description>
            {{ $t('pages.profile.delete.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.profile.delete.content.deleteInfo') }}
            </div>

            <div class="mt-5">
                <BreezeButtonDanger @click="confirmUserDeletion">
                    {{ $t('pages.profile.delete.content.deleteButton') }}
                </BreezeButtonDanger>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <BreezeModalDialog :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    {{ $t('pages.profile.delete.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.profile.delete.content.modal.content') }}

                    <div class="mt-4">
                        <BreezeInput type="password" class="mt-1 block w-3/4" placeholder="Password"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="deleteUser" />

                        <BreezeInputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <BreezeButtonSecondary @click="closeModal">
                        {{ $t('pages.profile.delete.content.modal.footer.cancelButton') }}
                    </BreezeButtonSecondary>

                    <BreezeButtonDanger class="ml-2" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ $t('pages.profile.delete.content.modal.footer.deleteButton') }}
                    </BreezeButtonDanger>
                </template>
            </BreezeModalDialog>
        </template>
    </BreezeActionSection>
</template>

<script>
    import BreezeActionSection from '@/Components/ActionSection.vue'
    import BreezeModalDialog from '@/Components/ModalDialog.vue'
    import BreezeButtonDanger from '@/Components/ButtonDanger.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'

    export default {
        components: {
            BreezeActionSection,
            BreezeButtonDanger,
            BreezeModalDialog,
            BreezeInput,
            BreezeInputError,
            BreezeButtonSecondary,
        },

        props: ['user'],

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            deleteUser() {
                this.form.delete(route('current-user.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingUserDeletion = false

                this.form.reset()
            },
        },
    }
</script>
