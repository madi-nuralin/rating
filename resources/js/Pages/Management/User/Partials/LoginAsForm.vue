<template>
    <breeze-action-section>
        <template #title>
            Login As
        </template>

        <template #description>
            Log in as this user.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.
            </div>

            <div class="flex items-center mt-5">
                <breeze-button @click="confirmLogout">
                    Log in as
                </breeze-button>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <breeze-modal-dialog :show="confirmingLogout" @close="closeModal">
                <template #title>
                    Log Out Other Browser Sessions
                </template>

                <template #content>
                    Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.
                </template>

                <template #footer>
                    <breeze-secondary-button @click="closeModal">
                        Cancel
                    </breeze-secondary-button>

                    <Link class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('user.loginas', {'id': user.id})">
                        Login
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
                confirmingLogout: false,
                form: this.$inertia.form({
                    password: '',
                })
            }
        },
        methods: {
            confirmLogout() {
                this.confirmingLogout = true;
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
                this.confirmingLogout = false
                this.form.reset()
            },
        },
    }
</script>