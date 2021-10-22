<template>
    <BreezeFormSection @submitted="updateUser">
        <template #title>
            {{ $t('pages.management.users.update.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.users.update.description') }}
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            ref="photo"
                            @change="updatePhotoPreview">

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
                    Select A New Photo
                </BreezeButtonSecondary>

                <BreezeButtonSecondary type="button" class="mt-2" @click.prevent="deletePhoto" v-if="user.profile_photo_path">
                    Remove Photo
                </BreezeButtonSecondary>

                <BreezeInputError :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.users.update.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="email" :value="$t('pages.management.users.update.form.email')" />
                <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <BreezeInputError :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Firstname -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="firstname" :value="$t('pages.management.users.update.form.firstname')" />
                <BreezeInput id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" />
                <BreezeInputError :message="form.errors.firstname" class="mt-2" />
            </div>

            <!-- Lastname -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="lastname" :value="$t('pages.management.users.update.form.lastname')" />
                <BreezeInput id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" />
                <BreezeInputError :message="form.errors.lastname" class="mt-2" />
            </div>

            <!-- Employement -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="employements" :value="$t('pages.management.users.update.form.employements')" />
                <BreezeSelect id="employements" class="mt-1 block w-full" :value="form.employements" @input="form.employements = $event" :options="options.employements"/>
                <BreezeInputError :message="form.errors.employements" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="roles" :value="$t('pages.management.users.update.form.roles')" />
                <BreezeSelect id="roles" class="mt-1 block w-full" :value="form.roles" @input="form.roles = $event" :options="options.roles"/>
                <BreezeInputError :message="form.errors.roles" class="mt-2" />
            </div>
        </template>

        <template #actions>
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
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeInput from '@/Components/Input.vue'
    import BreezeInputError from '@/Components/InputError.vue'
    import BreezeLabel from '@/Components/Label.vue'
    import BreezeActionMessage from '@/Components/ActionMessage.vue'
    import BreezeButtonSecondary from '@/Components/ButtonSecondary.vue'
    import BreezeSelect from '@/Components/Select.vue'

    export default {
        components: {
            BreezeActionMessage,
            BreezeButton,
            BreezeFormSection,
            BreezeInput,
            BreezeInputError,
            BreezeLabel,
            BreezeButtonSecondary,
            BreezeSelect,
        },

        props: ['user', 'employements', 'roles'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    email: this.user.email,
                    firstname: this.user.firstname,
                    lastname: this.user.lastname,
                    photo: this.user.profile_photo_path,
                    employements: this.user.employements.map(function(employement) {
                        return employement.id;
                    }),
                    roles: this.user.roles.map(function(role) {
                        return role.id;
                    }),
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateUser() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user.update', {'id': this.user.id}), {
                    errorBag: 'updateUser',
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
                /*this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.photoPreview = null;
                        this.clearPhotoFileInput();
                    },
                });*/
            },

            clearPhotoFileInput() {
                if (this.$refs.photo?.value) {
                    this.$refs.photo.value = null;
                }
            },
        },

        computed: {
            options() {
                let employements, roles;

                employements = this.employements ?
                this.employements.map(function(employement) {
                    return {
                        value: employement.id,
                        name: employement.position.name,
                        description: this.$t('pages.management.assessments.update.form.employement.option.description', {department: employement.department.name})
                    };
                }, {$t: this.$t}) : null;

                roles = this.roles ?
                this.roles.map(function(role) {
                    return {
                        value: role.id,
                        name: role.name,
                        description: role.description,
                    };
                }, {$t: this.$t}) : null;

                return {'employements': employements, 'roles': roles};
            }
        }
    }
</script>
