<template>
    <breeze-action-section>
        <template #title>
            {{ $t('pages.management.user.loginAs.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.user.loginAs.description') }}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                {{ $t('pages.management.user.loginAs.content.info') }}
            </div>

            <div class="flex items-center mt-5">
                <breeze-button @click="confirmLoginAs">
                    {{ $t('pages.management.user.loginAs.content.loginAsButton') }}
                </breeze-button>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <breeze-modal-dialog :show="confirmingLoginAs" @close="closeModal">
                <template #title>
                    {{ $t('pages.management.user.loginAs.content.modal.title') }}
                </template>

                <template #content>
                    {{ $t('pages.management.user.loginAs.content.modal.content') }}
                </template>

                <template #footer>
                    <breeze-secondary-button @click="closeModal">
                        {{ $t('pages.management.user.loginAs.content.modal.footer.cancelButton') }}
                    </breeze-secondary-button>

                    <Link class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('user.login-as', {'id': user.id})">
                        {{ $t('pages.management.user.loginAs.content.modal.footer.continueButton') }}
                    </Link>
                </template>
            </breeze-modal-dialog>
        </template>
    </breeze-action-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeActionSection from '@/Components/ActionSection.vue'
    import BreezeButton from '@/Components/Button.vue'
    import BreezeModalDialog from '@/Components/ModalDialog.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeSecondaryButton from '@/Components/ButtonSecondary.vue'
    import { Link } from '@inertiajs/inertia-vue3';
    
    export default {
        props: ['user'],
        components: {
            BreezeActionMessage,
            BreezeActionSection,
            BreezeButton,
            BreezeModalDialog,
            BreezeInput,
            BreezeInputError,
            BreezeSecondaryButton,
            Link,
        },
        data() {
            return {
                confirmingLoginAs: false,
                form: this.$inertia.form({
                    password: '',
                })
            }
        },
        methods: {
            confirmLoginAs() {
                this.confirmingLoginAs = true;
            },
            logoutOtherBrowserSessions() {
                this.form.get(route('other-browser-sessions.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },
            closeModal() {
                this.confirmingLoginAs = false
                this.form.reset()
            },
        },
    }
</script>