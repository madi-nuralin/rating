<template>
    <BreezeFormSection @submitted="updateProfileInformation">
        <template #title>
            {{ $t('pages.profile.updateProfileInformation.title') }}
        </template>

        <template #description>
            {{ $t('pages.profile.updateProfileInformation.description') }}
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" ref="photo" @change="updatePhotoPreview">

                <BreezeLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" v-show="! photoPreview">
                    <img :src="user.profile_photo_path" :alt="user.name" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" v-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <BreezeButtonSecondary class="mt-2 mr-2" type="button" @click.prevent="selectNewPhoto">
                    {{ $t('pages.profile.updateProfileInformation.form.selectNewPhotoButton') }}
                </BreezeButtonSecondary>

                <BreezeButtonSecondary type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                    {{ $t('pages.profile.updateProfileInformation.form.removePhotoButton') }}
                </BreezeButtonSecondary>

                <BreezeInputError :message="form.errors.photo" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.profile.updateProfileInformation.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="email" :value="$t('pages.profile.updateProfileInformation.form.email')" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" :disabled="true"/>
                <BreezeInputError :message="form.errors.email" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="firstname" :value="$t('pages.profile.updateProfileInformation.form.firstname')" />
                <BreezeInput id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" />
                <BreezeInputError :message="form.errors.firstname" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="lastname" :value="$t('pages.profile.updateProfileInformation.form.lastname')" />
                <BreezeInput id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" />
                <BreezeInputError :message="form.errors.lastname" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <BreezeActionMessage :on="form.recentlySuccessful" class="mr-3">
                {{ $t('pages.profile.updateProfileInformation.actions.savedMessage') }}
            </BreezeActionMessage>

            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                {{ $t('pages.profile.updateProfileInformation.actions.saveButton') }}
            </BreezeButton>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeLabel,
            BreezeButtonSecondary,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    email: this.user.email,
                    firstname: this.user.firstname,
                    lastname: this.user.lastname,
                    photo: this.user.profile_photo_path
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.clearPhotoFileInput()),
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const photo = this.$refs.photo.files[0];

                if (! photo) return;

                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(photo);
            },

            deletePhoto() {
                this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                });
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },
        },
    }
</script>
