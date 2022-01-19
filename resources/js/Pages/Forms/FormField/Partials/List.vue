<template>
    <BreezeFormSection>
        <template #title>
            {{ $t('Поля формы') }}
        </template>

        <template #description>
            {{ $t('Список полей текущей формы, создайте новые формы и поля для заполнения необходимых информации') }}
        </template>

        <template #form>
            <div class="col-span-6">
                <BreezeList :items="form.fields">
                    <template #item="{item}">
                        <div class="flex justify-between mt-4">
                            <div>
                                <div>{{item.label}}</div>
                                <div class="flex flex-col text-sm text-gray-400">
                                    <p class="line-clamp-3">
                                        {{item.type}}
                                    </p>
                                </div>
                            </div>
                            <Link class="ml-2 text-sm text-gray-400 underline" :href="route('form-field.show', {'id': item.id})">
                                Update
                            </Link>
                        </div>
                    </template>
                </BreezeList>
            </div>
        </template>

        <template #actions>
            <Link class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150" :href="route('form-field.create', {'form': form.id})">
                {{ $t('pages.management.positions.list.actions.createButton') }}
            </Link>
        </template>
    </BreezeFormSection>
</template>

<script>
    import BreezeButton from '@/Components/Button.vue'
    import BreezeFormSection from '@/Components/FormSection.vue'
    import BreezeList from '@/Components/ListScoped.vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            BreezeButton,
            BreezeFormSection,
            BreezeList,
            Link,
        },

        props: ['form'],
    }
</script>