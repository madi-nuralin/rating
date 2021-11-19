<template>
    <BreezeFormSection @submitted="updateAuthentication">
        <template #title>
            {{ $t('pages.administration.authentication.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.administration.authentication.update.description') }}
        </template>

        <template #form>
            <div class="col-span-4 md:col-span-6">
                <label class="flex items-center">
                    <BreezeCheckbox name="allowed_user_register" v-model:checked="form.allowed_user_register" />
                    <span class="ml-2 text-sm text-gray-600">
                        {{ $t('pages.administration.authentication.update.form.allowed_user_register') }}
                    </span>
                </label>
            </div>

            <div class="col-span-6 lg:col-span-4">
                <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                    <button type="button" class="relative px-4 py-3 w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(authentication.oauth2.providers).length - 1}"

                                    v-for="(value, name, i) in authentication.oauth2.providers" >
                        <div :class="{'opacity-50': ! form[`oauth2_${name}_enabled`]}">
                            <!-- Provider Name -->
                            <div class="flex justify-between" @click="form[`oauth2_${name}_enabled`] = ! form[`oauth2_${name}_enabled`]">
                                <div class="flex items-start">

                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center ">
                                        <svg v-if="name == 'github'" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>

                                        <svg v-if="name == 'google'" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="-3 0 262 262" preserveAspectRatio="xMidYMid"><path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4"/><path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853"/><path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05"/><path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335"/></svg>
                                    </div>

                                    <div class="text-center mt-0 ml-4 text-left">
                                        <h3 class="text-md">
                                            {{ $t(`pages.administration.authentication.update.form.oauth2.providers.${name}.title`) }}
                                        </h3>
                                    </div>
                                </div>

                                <svg class="ml-2 h-5 w-5 text-gray-400" :class="{'text-green-400': form[`oauth2_${name}_enabled`]}" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24" ><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>

                            <!-- Provider Description -->
                            <div class="mt-2 text-xs text-gray-600 text-left">
                                {{ $t(`pages.administration.authentication.update.form.oauth2.providers.${name}.description`) }}
                            </div>

                            <div class="mt-2 w-full text-left">
                                <BreezeLabel :for="`oauth2_${name}_client_id`" :value="$t(`pages.administration.authentication.update.form.oauth2.providers.${name}.client_id`)" />
                                <BreezeInput :id="`oauth2_${name}_client_id`" type="text" class="mt-1 block w-full" v-model="form[`oauth2_${name}_client_id`]" @focus="form[`oauth2_${name}_enabled`] = true"/>
                                <BreezeInputError :message="form.errors[`oauth2_${name}_client_id`]" class="mt-2" />
                            </div>

                            <div class="mt-2 w-full text-left">
                                <BreezeLabel :for="`oauth2_${name}_client_secret`" :value="$t(`pages.administration.authentication.update.form.oauth2.providers.${name}.client_secret`)"/>
                                <BreezeInput :id="`oauth2_${name}_client_secret`" type="text" class="mt-1 block w-full" v-model="form[`oauth2_${name}_client_secret`]" @focus="form[`oauth2_${name}_enabled`] = true" />
                                <BreezeInputError :message="form.errors[`oauth2_${name}_client_secret`]" class="mt-2" />
                            </div>
                        </div>
                    </button>
                </div>
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
    import BreezeLabel from '@/Components/Label'
    import BreezeCheckbox from '@/Components/Checkbox'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeTextarea,
            BreezeLabel,
            BreezeCheckbox
        },

        props: ['authentication'],

        data() {
            return {
                form: this.$inertia.form({
                    allowed_user_register: this.authentication.allowed_user_register,
                    oauth2_github_enabled: this.authentication.oauth2.providers.github.enabled,
                    oauth2_github_client_id: this.authentication.oauth2.providers.github.client_id,
                    oauth2_github_client_secret: this.authentication.oauth2.providers.github.client_secret,
                    oauth2_google_enabled: this.authentication.oauth2.providers.google.enabled,
                    oauth2_google_client_id: this.authentication.oauth2.providers.google.client_id,
                    oauth2_google_client_secret: this.authentication.oauth2.providers.google.client_secret,
                })
            }
        },

        methods: {
            updateAuthentication() {
                this.form.put(route('authentication.update'), {
                    errorBag: 'updateAuthentication',
                    preserveScroll: true
                });
            },
        },
    }
</script>
