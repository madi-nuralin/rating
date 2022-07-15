<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('pages.management.user.list.title') }}
        </template>

        <template #description>
            {{ $t('pages.management.user.list.description') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <div>
                    <form @submit.prevent="$emit('submitted')">
                        <div class="grid grid-cols-6 gap-2 mb-4">
                            <div class="col-span-5">
                                <BreezeInput id="email"
                                             :placeholder="$t('pages.management.user.list.form.email')"
                                             class="block w-full"
                                             type="text"
                                             v-model="form.email"
                                />
                            </div>
                            <div class="col-span-1">
                                <BreezeButton class="block h-full w-full" @click="submit">
                                    <div class="text-center w-full">
                                        {{ $t('pages.management.user.list.form.find') }}
                                    </div>
                                </BreezeButton>
                            </div>
                        </div>
                    </form>
                </div>
                <BreezeList :items="users">
                    <template #item="{item}">
                        <div class="flex justify-between">
                            <div class="flex items-center space-x-2">
                                <img class="w-8 h-8 rounded-full" :src="item.profile_photo_path" :alt="item.name">
                                <div>
                                    <div>
                                        {{ item.name }}
                                    </div>
                                    <div class="text-sm text-gray-400">
                                        <p class="line-clamp-1">
                                            {{ item.email }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <Link class="ml-2 text-sm text-gray-400 underline"
                                  :href="route('user.show', {'id': item.id})">
                                {{ $t('generic.updateButton') }}
                            </Link>
                        </div>
                    </template>
                </BreezeList>
            </div>
        </template>

        <template #actions>
            <Link
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                :href="route('user.create')">
                {{ $t('pages.management.user.list.actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeFormSection from '@/Components/FormSection.vue'
import BreezeList from '@/Components/List.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeInput from '@/Components/Input.vue'

import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeButton,
        BreezeFormSection,
        BreezeList,
        BreezeLabel,
        BreezeInput,

        Link,
    },

    props: ['users'],

    data() {
        return {
            form: this.$inertia.form({
                email: this.$page.props.email,
            })
        };
    },

    methods: {
        submit(event) {
            this.form.get(this.route('user.index', {'email': this.form.email}), {
                errorBag: 'submit',
                preserveScroll: true
            });
        }
    },
}
</script>
