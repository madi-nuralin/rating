<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('pages.forms.fields.list.title') }}
        </template>

        <template #description>
            Список полей формы
        </template>

        <template #form>
            <div class="col-span-6">
                <div class="max-w-xl text-sm text-gray-600">
                    {{ $t('pages.forms.fields.list.form.listInfo') }}
                </div>
            </div>
                
            <div class="relative z-0 mt-1 border border-gray-200 rounded-lg cursor-pointer col-span-6 sm:col-span-4">
                <button class="relative px-4 py-3 inline-flex w-full rounded-lg focus:z-10 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200" type="button" v-for="(field, i) in form.fields" :key="field.id" :class="{'border-t border-gray-200 rounded-t-none': i > 0, 'rounded-b-none': i != Object.keys(form.fields).length - 1}">

                    <div class="w-full">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-600 text-left">
                                {{ field.name }}
                            </div>

                            <Link 
                                class="w-4 mr-2 transform text-gray-400 hover:text-blue-400 hover:scale-110"
                                :href="route('form-field.show', {'id': field.id})">
                                <svg class="ml-2 h-5 w-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="M7 17l9.2-9.2M17 17V7H7"/>
                                </svg>
                            </Link>
                        </div>

                        <div class="mt-2 text-xs text-gray-600 text-left">
                            {{ field.type }}
                        </div>
                    </div>
                </button>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('form-field.create', {'form': form.id})">
                {{ $t('pages.forms.fields.list.actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            Link,
        },

        props: ['form'],
    }
</script>