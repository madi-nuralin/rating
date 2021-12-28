<template>
    <BreezeFormSection @submitted="createRating">
        <template #title>
            {{ $t('pages.management.rating.create.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.rating.create.description') }}
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="name" :value="$t('pages.management.rating.create.form.name')" />
                <BreezeInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" autofocus />
                <BreezeInputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="description" :value="$t('pages.management.rating.create.form.description')" />
                <BreezeInput id="description" type="text" class="mt-1 block w-full" v-model="form.description" />
                <BreezeInputError :message="form.errors.description" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="filling_started_at" :value="$t('pages.management.rating.create.form.filling_started_at')" />
                <BreezeInput id="filling_started_at" type="datetime-local" class="mt-1 block w-full" v-model="form.filling_started_at" />
                <BreezeInputError :message="form.errors.filling_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="filling_expired_at" :value="$t('pages.management.rating.create.form.filling_expired_at')" />
                <BreezeInput id="filling_expired_at" type="datetime-local" class="mt-1 block w-full" v-model="form.filling_expired_at" />
                <BreezeInputError :message="form.errors.filling_expired_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="verification_started_at" :value="$t('pages.management.rating.create.form.verification_started_at')" />
                <BreezeInput id="verification_started_at" type="datetime-local" class="mt-1 block w-full" v-model="form.verification_started_at" />
                <BreezeInputError :message="form.errors.verification_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="verification_expired_at" :value="$t('pages.management.rating.create.form.verification_expired_at')" />
                <BreezeInput id="verification_expired_at" type="datetime-local" class="mt-1 block w-full" v-model="form.verification_expired_at" />
                <BreezeInputError :message="form.errors.verification_expired_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="approvement_started_at" :value="$t('pages.management.rating.create.form.approvement_started_at')" />
                <BreezeInput id="approvement_started_at" type="datetime-local" class="mt-1 block w-full" v-model="form.approvement_started_at" />
                <BreezeInputError :message="form.errors.approvement_started_at" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <BreezeLabel for="approvement_expired_at" :value="$t('pages.management.rating.create.form.approvement_expired_at')" />
                <BreezeInput id="approvement_expired_at" type="datetime-local" class="mt-1 block w-full" v-model="form.approvement_expired_at" />
                <BreezeInputError :message="form.errors.approvement_expired_at" class="mt-2" />
            </div>

            <div class="col-span-6 lg:col-span-4">
                <BreezeLabel for="targets" value="Role" />
                <BreezeInputError :message="form.errors.targets" class="mt-2" />

                <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer">
                    <div class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-0 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200"
                                    :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(targets).length - 1}"
                                    v-for="(target, i) in targets"
                                    :key="target.key">
                        <div class="w-full" :class="{'opacity-50': ! form.targets.has(target.id) }">
                            <!-- Role Name -->
                            <div class="flex items-center" 
                                    @click="addToParameterTargets(target)">
                                <div class="text-sm text-gray-600 text-left" :class="{'font-semibold': form.targets.has(target.id)}">
                                    {{ target.name }}
                                </div>

                                <svg v-if="form.targets.has(target.id)" class="ml-2 h-5 w-5 text-green-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>

                            <!-- Role Description -->
                            <div class="mt-2 text-xs text-gray-600 text-left">
                                {{ target.description }}
                            </div>

                            <div class="mt-2 text-xs text-gray-600 text-left">
                                <BreezeLabel :for="target.id" :value="$t('pages.management.rating.update.form.parameters')" />
                                <BreezeSelect :id="target.id" class="mt-1 block w-full" :value="form.parameters" @input="form.parameters = $event" @click.prevent="" :options="target.parameters" :multiple="true" />
                                <BreezeInputError :message="form.errors.parameters" class="mt-2" />
                            </div>

                            <div class="mt-2 text-xs text-gray-600 text-left">
                                <BreezeLabel :for="target.id" :value="$t('pages.management.rating.update.form.verifiers')" />
                                <BreezeSelect :id="target.id" class="mt-1 block w-full" :value="form.parameters" @input="form.parameters = $event" @click.prevent="" :options="target.parameters" :multiple="true" />
                                <BreezeInputError :message="form.errors.parameters" class="mt-2" />
                            </div>
                        </div>
                    </div>
                </div>
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
    import BreezeSelect from '@/Components/Select'
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

        props: ['parameterTargets', 'verfiers'],

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    description: '',
                    filling_started_at: '',
                    filling_expired_at: '',
                    verification_started_at: '',
                    verification_expired_at: '',
                    approvement_started_at: '',
                    approvement_expired_at: '',
                    targets: new Set(),
                    parameters: ''
                }),

                targets: this.parameterTargets.map(function(target) {
                    return {
                        'id': target.id,
                        'name': target.name,
                        'description': target.description,
                        'parameters': target.parameters.map(function(parameter) {
                            return {
                                'value': parameter.id,
                                'name': parameter.name,
                                'description': parameter.description
                            };
                        })
                    };
                })
            }
        },

        methods: {
            createRating() {
                this.form.post(route('rating.store'), {
                    errorBag: 'createRating',
                    preserveScroll: true,
                    //onSuccess: () => Inertia.reload({ only: ['rating'] })
                });
            },

            addToParameterTargets(target) {
                if (this.form.targets.has(target.id)) {
                    this.form.targets.delete(target.id);
                } else {
                    this.form.targets.add(target.id);
                }
            }
        },
    }
</script>
